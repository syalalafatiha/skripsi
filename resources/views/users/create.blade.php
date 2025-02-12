@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data pengguna ini hanya dapat dikelola oleh admin</p>

    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('users.index') }}">Kembali</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna Sistem</h6>
                </div>
                <div class="card-body">
                    <p>Pastikan data sudah benar!</p>
                    <!-- // Form -->
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="nama" class="form-label">Nama</label></td>
                                <td><input class="form-control" type="text" name="nama" id="nama" required
                                        placeholder="Nama Pengguna"></td>
                            </tr>
                            <tr>
                                <td><label for="email" class="form-label">Email</label></td>
                                <td><input class="form-control" type="text" name="email" id="email" required
                                        placeholder="Email Pengguna"></td>
                            </tr>
                            <tr>
                                <td><label for="username" class="form-label">Username</label></td>
                                <td><input class="form-control" type="text" name="username" id="username" required
                                        placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td><label for="password" class="form-label">Password</label></td>
                                <td><input class="form-control" type="text" name="password" id="password" required
                                        placeholder="Password"></td>
                            </tr>
                            <tr>
                                <td><label for="role" class="form-label">Role</label></td>
                                <td>
                                    <select class="form-control" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}
                                        @endforeach
                                    </select>
                                </td>
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
