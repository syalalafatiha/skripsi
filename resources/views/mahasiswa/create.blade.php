@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data mahasiswa ini dapat dikelola oleh admin, dan dapat diisi oleh pengguna</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Kembali</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="bg-info card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Data Mahasiswa</h6>
                </div>
                <div class="card-body">
                    <p>Isi formulir data mahasiswa dengan benar, cek kembali sebelum menyimpan data!
                    </p>
                    <!-- // Form -->
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="nama" class="form-label">Nama</label></td>
                                <td><input class="form-control" type="text" name="nama" id="nama" required
                                        placeholder="Nama Mahasiswa"></td>
                            </tr>
                            <tr>
                                <td><label for="universitas" class="form-label">Universitas Asal</label></td>
                                <td><input class="form-control" type="text" name="universitas" id="universitas" required
                                        placeholder="Universitas Asal"></td>
                            </tr>
                            <tr>
                                <td><label for="prodi" class="form-label">Program Studi</label></td>
                                <td><input class="form-control" type="text" name="prodi" id="prodi" required
                                        placeholder="Program Studi"></td>
                            </tr>
                            <tr>
                                <td><label for="alamat" class="form-label">Alamat</label></td>
                                <td><input class="form-control" type="text" name="alamat" id="alamat" required
                                        placeholder="Alamat"></td>
                            </tr>
                            <tr>
                                <td><label for="ukt" class="form-label">Nominal UKT</label></td>
                                <td><input class="form-control" type="text" name="ukt" id="ukt" required
                                        placeholder="UKT"></td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                            <input class="btn btn-danger" type="reset" name="reset" value="Bersihkan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
