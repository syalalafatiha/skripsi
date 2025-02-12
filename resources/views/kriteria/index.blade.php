@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Data pada tabel kriteria ini dikelola oleh admin</a></p>
    <div class="modal-footer">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('kriteria.create') }}" class="btn btn-success">Tambah data</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria Penilaian</h6>
        </div>
        <div class="card-body">
            <p>Data kriteria dikelompokkan pada beberapa aspek, sesuaikan kriteria dengan aspek, berikan factor
                Core/Secondary pada setiap kriteria dengan mempertimbangkan kriteria utama dan kriteria pendukung, tentukan
                nilai target yang diinginkan, nilai target bisa ditentukan berdasarkan sub-kriteria!</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>Aspek Penilaian</th>
                            <th>Kriteria Penilaian</th>
                            <th>Tipe Factor</th>
                            <th>Nilai Target</th>
                            @if (auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                            <tr>
                                <td>{{ $kriteria->id }}</td>
                                <td>{{ $kriteria->aspek->aspek }}</td>
                                <td>{{ $kriteria->kriteria }}</td>
                                <td>{{ $kriteria->factor }}</td>
                                <td>{{ $kriteria->nilai_target }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                            class="btn btn-warning btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm">
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
