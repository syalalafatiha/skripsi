@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Data pada tabel mahasiswa ini dapat dikelola oleh admin dan pengguna. Baik admin maupun pengguna, dapat
        menambah data baru, mengedit data, dan menghapus data mahasiswa.</p>
    <div class="modal-footer">
        <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Tambah Data</a>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Universitas</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->id }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->universitas }} / {{ $mahasiswa->prodi }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
