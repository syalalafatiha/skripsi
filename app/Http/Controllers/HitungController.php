<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Gap;
use App\Models\Hitung;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Rangking;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::whereNotIn('id', Hitung::pluck('mahasiswa_id'))->get();
        $sub_kriterias = SubKriteria::with('kriteria')->get();
        $kriterias = Kriteria::all();
        $sub_kriteriasGrouped = SubKriteria::with('kriteria')->get()->groupBy('kriteria_id');
        $mahasiswaIdsSudahSeleksi = Hitung::pluck('mahasiswa_id')->toArray();
        $title = 'Seleksi Berkas Mahasiswa';

        return view('penilaian.index', compact('title', 'mahasiswas', 'sub_kriterias', 'kriterias', 'sub_kriteriasGrouped', 'mahasiswaIdsSudahSeleksi'));
    }

    /**
     * Store calculated data to the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
        ]);

        $mahasiswa_id = $request->input('mahasiswa_id');
        $nilai_kriterias = $request->except(['_token', 'mahasiswa_id']);

        foreach ($nilai_kriterias as $kriteria => $sub_kriteriaId) {
            $sub_kriteria = SubKriteria::findOrFail($sub_kriteriaId);
            $kriteria_id = $sub_kriteria->kriteria_id;
            $aspek_id = $sub_kriteria->kriteria->aspek_id;

            Hitung::create([
                'mahasiswa_id' => $mahasiswa_id,
                'aspek_id' => $aspek_id,
                'kriteria_id' => $kriteria_id,
                'sub_kriteria_id' => $sub_kriteriaId,
                'nilai' => $sub_kriteria->nilai,
            ]);
        }

        // Panggil metode hitungGap
        $this->hitungGap($mahasiswa_id);
        return redirect()->route('hitung.show')->with('success', 'Data berhasil dihitung dan disimpan.');
    }

    /**
     * Hitung nilai Gap.
     */
    public function hitungGap($mahasiswa_id)
    {
        $dataHitung = Hitung::with('kriteria', 'mahasiswa')
            ->where('mahasiswa_id', $mahasiswa_id) // Ambil hanya mahasiswa yang dipilih
            ->get();

        foreach ($dataHitung as $item) {
            if (!$item->mahasiswa) {
                continue; // Skip jika mahasiswa tidak ditemukan
            }

            $kriteria = $item->kriteria; // Ambil langsung dari relasi
            if (!$kriteria) {
                continue; // Skip jika tidak ada kriteria
            }

            $nilaiIdeal = $kriteria->nilai_target;
            if ($nilaiIdeal !== null) { // Cek apakah nilai target tersedia
                $nilaiAktual = $item->nilai;
                $gap = $nilaiAktual - $nilaiIdeal;
                $bobotGap = $this->getBobotGap($gap);

                // Simpan hasil perhitungan ke dalam tabel
                $item->update([
                    'nilai_target' => (float) $nilaiIdeal,
                    'gap' => $gap,
                    'bobot_gap' => $bobotGap,
                ]);

                // Hitung faktor tambahan
                $this->hitungCoreFactor($mahasiswa_id, $kriteria->aspek_id);
                $this->hitungSecondaryFactor($mahasiswa_id, $kriteria->aspek_id);
            }
        }

        return redirect()->route('hitung.show')->with('success', 'Perhitungan gap berhasil dilakukan.');
    }

    private function getBobotGap($gap)
    {
        $bobot = 0;
        // Sesuaikan dengan tabel pembobotan gap
        switch ($gap) {
            case 0:
                $bobot = 5.0;
                break;
            case 1:
                $bobot = 4.5;
                break;
            case -1:
                $bobot = 4.0;
                break;
            case 2:
                $bobot = 3.5;
                break;
            case -2:
                $bobot = 3.0;
                break;
            case 3:
                $bobot = 2.5;
                break;
            case -3:
                $bobot = 2.0;
                break;
            case 4:
                $bobot = 1.5;
                break;
            case -4:
                $bobot = 1.0;
                break;
            default:
                $bobot = 0.0;
                break;
        }
        return $bobot;
    }

    public function show()
    {
        $dataHitung = Hitung::with(['kriteria', 'mahasiswa'])->get()->groupBy('mahasiswa_id');
        $title = 'Seleksi Tahap 1 (Hitung Gap)';

        return view('penilaian.gap', compact('dataHitung', 'title'));
    }

    public function hitungCoreFactor($mahasiswa_id, $aspekId = null)
    {
        if ($aspekId) {
            $kriteriaCore = Kriteria::where('aspek_id', $aspekId)
                ->where('factor', 'core')
                ->get();
        } else {
            $kriteriaCore = Kriteria::where('factor', 'core')
                ->get();
        }

        $nilaiCore = 0;
        $jumlahCore = 0;

        foreach ($kriteriaCore as $kriteriaCoreValue) {
            $hitungCore = Hitung::where('mahasiswa_id', $mahasiswa_id)
                ->where('kriteria_id', $kriteriaCoreValue->id)
                ->first();

            if ($hitungCore) {
                $nilaiCore += $hitungCore->bobot_gap;
                $jumlahCore++;
            }
        }

        return $jumlahCore > 0 ? $nilaiCore / $jumlahCore : 0;
    }

    public function hitungSecondaryFactor($mahasiswa_id, $aspekId = null)
    {
        if ($aspekId) {
            $kriteriaSecondary = Kriteria::where('aspek_id', $aspekId)
                ->where('factor', 'secondary')
                ->get();
        } else {
            $kriteriaSecondary = Kriteria::where('factor', 'secondary')
                ->get();
        }

        $nilaiSecondary = 0;
        $jumlahSecondary = 0;

        foreach ($kriteriaSecondary as $kriteriaSecondaryValue) {
            $hitungSecondary = Hitung::where('mahasiswa_id', $mahasiswa_id)
                ->where('kriteria_id', $kriteriaSecondaryValue->id)
                ->first();

            if ($hitungSecondary) {
                $nilaiSecondary += $hitungSecondary->bobot_gap;
                $jumlahSecondary++;
            }
        }

        return $jumlahSecondary > 0 ? $nilaiSecondary / $jumlahSecondary : 0;
    }

    public function hitungNilaiTotal($mahasiswa_id)
    {
        $aspek_core = Aspek::where('factor', 'core')->get();
        $aspek_secondary = Aspek::where('factor', 'secondary')->get();

        $bobot_core = $aspek_core->sum('bobot');
        $bobot_secondary = $aspek_secondary->sum('bobot');

        $nilai_persen_core = ($bobot_core / ($bobot_core + $bobot_secondary)) * 100;
        $nilai_persen_secondary = ($bobot_secondary / ($bobot_core + $bobot_secondary)) * 100;

        $hasil = [];

        foreach ($aspek_core as $aspek) {
            $ncf = $this->hitungCoreFactor($mahasiswa_id, $aspek->id);
            $nsf = $this->hitungSecondaryFactor($mahasiswa_id, $aspek->id);
            $nilai_total = ($nilai_persen_core / 100) * $ncf + ($nilai_persen_secondary / 100) * $nsf;
            $hasil[] = [
                'aspek' => $aspek->aspek,
                'nilai_total' => $nilai_total
            ];
        }

        foreach ($aspek_secondary as $aspek) {
            $ncf = $this->hitungCoreFactor($mahasiswa_id, $aspek->id);
            $nsf = $this->hitungSecondaryFactor($mahasiswa_id, $aspek->id);
            $nilai_total = ($nilai_persen_core / 100) * $ncf + ($nilai_persen_secondary / 100) * $nsf;
            $hasil[] = [
                'aspek' => $aspek->aspek,
                'nilai_total' => $nilai_total
            ];
        }
        return $hasil;
    }

    public function hasil()
    {
        $title = 'Seleksi Tahap 2 (Menghitung Skor Kriteria Core dan Secondary)';
        $aspek = Aspek::all();
        $mahasiswa = Mahasiswa::orderBy('id')->get();
        $hasil = [];

        foreach ($mahasiswa as $mhs) {
            $hasilMahasiswa = [];
            $hitung = Hitung::where('mahasiswa_id', $mhs->id)->first();

            if ($hitung) {
                foreach ($aspek as $aspekValue) {
                    $nilaiCore = $this->hitungCoreFactor($mhs->id, $aspekValue->id);
                    $nilaiSecondary = $this->hitungSecondaryFactor($mhs->id, $aspekValue->id);
                    $hitungAspek = Hitung::where('mahasiswa_id', $mhs->id)
                        ->where('aspek_id', $aspekValue->id)
                        ->first();

                    if (!$hitungAspek) {
                        $hitungAspek = new Hitung();
                        $hitungAspek->mahasiswa_id = $mhs->id;
                        $hitungAspek->aspek_id = $aspekValue->id;
                    }

                    $hitungAspek->core_factor = $nilaiCore;
                    $hitungAspek->secondary_factor = $nilaiSecondary;
                    $hitungAspek->save();

                    $nilaiTotal = $this->hitungNilaiTotal($mhs->id);

                    foreach ($nilaiTotal as $nilai) {
                        if ($nilai['aspek'] == $aspekValue->aspek) {
                            $hasilMahasiswa[] = [
                                'aspek' => $aspekValue->aspek,
                                'core_factor' => $nilaiCore,
                                'secondary_factor' => $nilaiSecondary,
                                'nilai_total' => $nilai['nilai_total'],
                            ];

                            // Perbarui nilai total dalam table hitung
                            $hitungAspek->nilai_total = $nilai['nilai_total'];
                            $hitungAspek->save();
                        }
                    }
                }

                $hasil[] = [
                    'mahasiswa' => $mhs,
                    'hasil' => $hasilMahasiswa,
                ];
            }
        }

        return view('penilaian.hasil', compact('title', 'hasil'));
    }

    public function rangking()
    {
        $title = 'Data Penerima Beasiswa Scientist';
        $aspek = Aspek::all();
        $hitung = Hitung::all();
        $ranking = [];
        $mahasiswaIds = $hitung->pluck('mahasiswa_id')->unique();

        foreach ($mahasiswaIds as $mahasiswaId) {
            $nilaiTotal = 0;

            foreach ($aspek as $aspekValue) {
                $bobotAspek = $aspekValue->bobot;
                $hitungData = $hitung->where('mahasiswa_id', $mahasiswaId)->where('aspek_id', $aspekValue->id)->first();

                // Pastikan data hitung tidak null sebelum mengakses nilai_total
                if (!$hitungData) {
                    continue;
                }

                $nilaiAspek = $hitungData->nilai_total;
                $nilaiTotal += ($bobotAspek / 100) * $nilaiAspek;
            }

            $mahasiswa = Mahasiswa::find($mahasiswaId);
            if (!$mahasiswa) {
                continue; // Skip jika mahasiswa tidak ditemukan
            }

            $ranking[] = [
                'mahasiswa_id' => $mahasiswa->id,
                'nama_mahasiswa' => $mahasiswa->nama,
                'universitas_mahasiswa' => $mahasiswa->universitas,
                'prodi_mahasiswa' => $mahasiswa->prodi,
                'alamat_mahasiswa' => $mahasiswa->alamat,
                'ukt_mahasiswa' => $mahasiswa->ukt,
                'ranking' => $nilaiTotal,
                'status_mahasiswa' => $mahasiswa->status,
            ];

            // Simpan nilai ranking ke tabel `hitung`
            Hitung::where('mahasiswa_id', $mahasiswa->id)->update([
                'rangking' => $nilaiTotal
            ]);
        }

        // Urutkan ranking dari tertinggi ke terendah
        usort($ranking, function ($a, $b) {
            return $b['ranking'] <=> $a['ranking'];
        });

        // Tambahkan urutan mulai dari 1
        foreach ($ranking as $key => $value) {
            $ranking[$key]['urutan'] = $key + 1;
        }

        return view('rangking.index', compact('title', 'ranking'));
    }

    public function destroy($mahasiswa_id)
    {
        try {
            // Hapus semua data pada tabel hitung berdasarkan mahasiswa_id
            Hitung::where('mahasiswa_id', $mahasiswa_id)->delete();

            return redirect()->route('hitung.show')->with('success', 'Data perhitungan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('hitung.show')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
