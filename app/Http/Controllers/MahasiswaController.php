<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswas' => $mahasiswas,
        ];
        return view('mahasiswa.index', $data);
    }

    /**
     * Menampilkan form untuk menambah data mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Mahasiswa'
        ];
        return view('mahasiswa.create', $data);
    }

    /**
     * Menyimpan data mahasiswa baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'ukt' => 'required|string',
        ]);

        try {
            // Simpan data ke database
            Mahasiswa::create($validatedData);
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.create')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail mahasiswa berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ];
        return view('mahasiswa.detail', $data);
    }

    /**
     * Menampilkan form untuk mengedit data mahasiswa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $data = [
            'title' => 'Ubah Data Mahasiswa',
            'mahasiswa' => $mahasiswa,
        ];
        return view('mahasiswa.edit', $data);
    }

    /**
     * Memperbarui data mahasiswa di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'ukt' => 'required|string',
        ]);

        try {
            // Cari mahasiswa berdasarkan ID dan update datanya
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->update($validatedData);

            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.edit', $id)->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data mahasiswa dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Cari mahasiswa berdasarkan ID dan hapus
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();

            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus mahasiswa: ' . $e->getMessage());
        }
    }
}
