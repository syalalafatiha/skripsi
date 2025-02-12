@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data Pengguna sistem hanya dapat dikelola oleh admin</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('users.index') }}">Kembali</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pengguna Sistem Seleksi</h6>
        </div>
        <div class="card-body">
            <p>Password optional untuk diubah.</p>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                </div>

                <div class="form-group">
                    <label for="password">Password (opsional)</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="">--Pilih--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ $user->role == $role ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        @endsection
