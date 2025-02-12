@extends('layouts.main')

@section('main_content')
    <div class="modal-footer">
        <a href="{{ route('export.seleksi') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-file-excel"></i>
            </span>
            <span class="text">Cetak data (.xlsx)</span>
        </a>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
        @elseif(Auth::user()->role == 'user')
            <a href="{{ route('user.dashboard') }}" class="btn btn-danger">Kembali</a>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cetak Data Penerima Beasiswa Scientist</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Universitas / Program Studi</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Uang Kuliah Tunggal</th>
                            <th style="text-align: center;">Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $mahasiswa)
                            @php
                                $hitung = $mahasiswa->hitungs->first(); // Ambil ranking pertama jika ada
                            @endphp
                            @if ($hitung)
                                <!-- Pastikan ada ranking -->
                                <tr>
                                    <td>{{ $mahasiswa->id }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->universitas }} / {{ $mahasiswa->prodi }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td>{{ $mahasiswa->ukt }}</td>
                                    <td>{{ $hitung->rangking }}</td> <!-- Ranking diambil dari tabel Hitung -->
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
