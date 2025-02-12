@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Ubah Data Mahasiswa dapat diubah oleh admin dan pengguna</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="bg-info card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Ubah Data Mahasiswa</h6>
                </div>
                <div class="card-body">
                    <p>Ubah data mahasiswa sesuai dengan berkas yang diajukan oleh mahasiswa, pastikan data pribadi dan data
                        akademik benar!</p>
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="nama" class="form-label">Nama Mahasiswa</label></td>
                                <td>
                                    <input class="form-control" type="text" name="nama" id="nama"
                                        value="{{ old('nama', $mahasiswa->nama) }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="universitas" class="form-label">Universitas Asal</label></td>
                                <td>
                                    <input class="form-control" type="text" name="universitas" id="universitas"
                                        value="{{ old('universitas', $mahasiswa->universitas) }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="prodi" class="form-label">Program Studi</label></td>
                                <td>
                                    <input class="form-control" type="text" name="prodi" id="prodi"
                                        value="{{ old('prodi', $mahasiswa->prodi) }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="alamat" class="form-label">Alamat</label></td>
                                <td>
                                    <input class="form-control" type="text" name="alamat" id="alamat"
                                        value="{{ old('alamat', $mahasiswa->alamat) }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ukt" class="form-label">Nominal UKT</label></td>
                                <td>
                                    <input class="form-control" type="text" name="ukt" id="ukt"
                                        value="{{ old('ukt', $mahasiswa->ukt) }}" required>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
