@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Data pada tabel aspek ini hanya dapat dikelola oleh admin</a></p>
    <div class="modal-footer">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('aspek.create') }}" class="btn btn-success">Tambah data</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Aspek Penilaian</h6>
        </div>
        <div class="card-body">
            <p>Dalam menentukan aspek berikan bobot sesuai dengan aspek yang diprioritaskan, hitung ulang bobot aspek jika
                ingin menambahkan aspek baru, pastikan jumlah keseluruhan bobot aspek memiliki total 100. <br>Aspek yang
                memiliki factor Core merupakan aspek utama dalam proses seleksi, sementara aspek yang memiliki factor
                Secondary merupakan aspek pendukung dalam proses seleksi, jadi pastikan pemilihan factor dengan
                benar!</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>Aspek Penilaian</th>
                            <th>Bobot</th>
                            <th>Factor</th>
                            @if (auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aspeks as $aspek)
                            <tr>
                                <td>{{ $aspek->id }}</td>
                                <td>{{ $aspek->aspek }}</td>
                                <td>{{ $aspek->bobot }}</td>
                                <td>{{ $aspek->factor }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('aspek.edit', $aspek->id) }}"
                                            class="btn btn-warning btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('aspek.destroy', $aspek->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-circle btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
