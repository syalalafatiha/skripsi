@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Data pada tabel kriteria ini dikelola oleh admin</a></p>
    <div class="modal-footer">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('sub-kriteria.create') }}" class="btn btn-success">Tambah data</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif

    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub-Kriteria Penilaian</h6>
        </div>
        <div class="card-body">
            <p>Sub-Kriteria merupakan detail dari kriteria seleksi, sub-kriteria dikelompokkan sesuai dengan kriteria yang
                relevan, dalam menginputkan sub-kriteria pilihlah kriteria yang relevan dengan sub-kriteria. Berikan nilai
                untuk setiap sub-kriteria, nilai sub-kriteria yang diharapkan akan menjadi nilai target kriteria pada tabel
                kriteria.</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>ID</th>
                            <th>Kriteria Penilaian</th>
                            <th>Sub-kriteria</th>
                            <th>Nilai</th>
                            @if (auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_kriterias as $sub_kriteria)
                            <tr>
                                <td>{{ $sub_kriteria->id }}</td>
                                <td>{{ $sub_kriteria->kriteria->kriteria }}</td>
                                <td>{{ $sub_kriteria->sub_kriteria }}</td>
                                <td>{{ $sub_kriteria->nilai }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('sub-kriteria.edit', $sub_kriteria->id) }}"
                                            class="btn btn-warning btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('sub-kriteria.destroy', $sub_kriteria->id) }}" method="POST"
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
