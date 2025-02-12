@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Pada seleksi tahap 2, akan dihitung kriteria yang memiliki factor core dan factor secondary. Hasil
        bobot gap akan dihitung dalam proses ini, kriteria dikelompokkan berdasarkan jenis factornya, dan dihitung nilai
        rata-rata core dan secondary untuk setiap mahasiswa.<br>Nilai total dihitung berdasarkan hasil nilai core dan
        secondary dari masing-masing mahasiswa dikalikan dengan total bobot aspek yang memiliki factor core dan secondary.
    </p>
    <div class="btn">
        <a href="{{ route('hitung.index') }}" type="button" class="btn btn-outline-info">Isi Kriteria</a>
        <a href="{{ route('hitung.show') }}" type="button" class="btn btn-outline-info">Hitung Gap</a>
        <a href="{{ route('hitung.hasil') }}" type="button" class="btn btn-outline-info">Hitung Factor dan Nilai Total</a>
        <a href="{{ route('rangking.index') }}" type="button" class="btn btn-outline-info">Hitung Rangking</a>
    </div>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('hitung.show') }}">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Hasil Perhitungan</h6>
                </div>
                <div class="card-body">
                    @foreach ($hasil as $nilai)
                        <table class="table table-bordered">
                            <thead class="bg-info table mb-1 text-white">
                                <th class="m-0 font-weight-bold text-white">ID Pengaju: {{ $nilai['mahasiswa']->id }}</th>
                                <th class="m-0 font-weight-bold text-white"> Nama Pengaju:
                                    {{ $nilai['mahasiswa']->nama }}</th>
                                <th class="m-0 font-weight-bold text-white" colspan="2"> Alamat:
                                    {{ $nilai['mahasiswa']->alamat }}</th>
                                <tr>
                                    <th>Aspek</th>
                                    <th>Core Factor</th>
                                    <th>Secondary Factor</th>
                                    <th>Nilai Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai['hasil'] as $hasilMahasiswa)
                                    <tr>
                                        <td>{{ $hasilMahasiswa['aspek'] }}</td>
                                        <td>{{ $hasilMahasiswa['core_factor'] }}</td>
                                        <td>{{ $hasilMahasiswa['secondary_factor'] }}</td>
                                        <td>{{ $hasilMahasiswa['nilai_total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                    <div class="text-center mt-4">
                        <a class="btn btn-primary" href="{{ route('rangking.index') }}">Hitung Rangking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
