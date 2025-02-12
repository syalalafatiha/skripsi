@extends('layouts.main')

@section('main_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $mahasiswa->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <th>Universitas Asal</th>
                    <td>{{ $mahasiswa->universitas }}</td>
                </tr>
                <tr>
                    <th>Program Studi</th>
                    <td>{{ $mahasiswa->prodi }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $mahasiswa->alamat }}</td>
                </tr>
                <tr>
                    <th>Nominal UKT</th>
                    <td>{{ $mahasiswa->ukt }}</td>
                </tr>
                <tr>
                    <th>Tanggal Data Dibuat</th>
                    <td>{{ $mahasiswa->created_at }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-center">
            <a class="btn btn-danger" href="{{ route('mahasiswa.index') }}">Kembali</a>
        </div>
    </div>
@endsection
