@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir seleksi berkas mahasiswa ini dikelola oleh admin, dan dapat diisi oleh admin maupun pengguna.
    </p>
    <p>Sebelum mengisi formulir seleksi, pastikan data mahasiswa sudah diinputkan melalui menu <strong>.
            Data
            Mahasiswa->Tambah Data</strong>. Isi formulir seleksi sesuai dengan berkas pengajuan mahasiswa,
        pilih nama
        mahasiswa yang akan diseleksi berkas,
        kemudian pastikan seluruh data kriteria yang diinputkan
        benar, untuk menghindari kesalahan dalam proses seleksi! Jika ingin melihat proses seleksi saja
        (tidak melakukan seleksi data tertentu), klik
        button tahapan seleksi dibawah ini, atau <strong>Hasil Seleksi</strong> pada menu <strong>Seleksi Penerima->Hasil
            Seleksi</strong>.
    </p>
    <div class="btn">
        <a href="{{ route('hitung.index') }}" type="button" class="btn btn-outline-info">Isi Kriteria</a>
        <a href="{{ route('hitung.show') }}" type="button" class="btn btn-outline-info">Hitung Gap</a>
        <a href="{{ route('hitung.hasil') }}" type="button" class="btn btn-outline-info">Hitung Factor dan Nilai Total</a>
        <a href="{{ route('rangking.index') }}" type="button" class="btn btn-outline-info">Hitung Rangking</a>
    </div>
    <div class="modal-footer">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="bg-info card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Form Seleksi Berkas Mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('hitung.store') }}" method="POST">
                        @csrf
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="mahasiswa_id" class="form-label">Nama Mahasiswa</label></td>
                                <td>
                                    <select class="form-control" name="mahasiswa_id" id="mahasiswa_id" required>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            @if (!in_array($mahasiswa->id, $mahasiswaIdsSudahSeleksi))
                                                <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>
                                        <label for="kriteria_{{ $kriteria->kriteria }}"
                                            class="form-label">{{ $kriteria->kriteria }}</label>
                                    </td>
                                    <td>
                                        <select name="kriteria_{{ $kriteria->kriteria }}"
                                            id="kriteria_{{ $kriteria->kriteria }}" class="form-control" required>
                                            <optgroup label="{{ $kriteria->kriteria }}">
                                                @foreach ($sub_kriterias->where('kriteria_id', $kriteria->id) as $sub_kriteria)
                                                    <option value="{{ $sub_kriteria->id }}">
                                                        {{ $sub_kriteria->sub_kriteria }} (Nilai:
                                                        {{ $sub_kriteria->nilai }})</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Hitung Gap</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
