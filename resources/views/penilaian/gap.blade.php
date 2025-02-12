@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Proses perhitungan gap kompetensi berdasarkan pada kriteria yang diinputkan pada formulir seleksi
        sebelumnya. Menghitung gap kompetensi dengan cara mencari selisih dari nilai kriteria yang diinputkan pada formulir
        dengan nilai kriteria yang ada pada daftar kriteria yang telah ditetapkan. Hasil selisih gap akan dilakukan
        pembobotan sesuai dengan ketentuan dari metode Profile Matching</p>
    <div class="btn">
        <a href="{{ route('hitung.index') }}" type="button" class="btn btn-outline-info">Isi Kriteria</a>
        <a href="{{ route('hitung.show') }}" type="button" class="btn btn-outline-info">Hitung Gap</a>
        <a href="{{ route('hitung.hasil') }}" type="button" class="btn btn-outline-info">Hitung Factor dan Nilai Total</a>
        <a href="{{ route('rangking.index') }}" type="button" class="btn btn-outline-info">Hitung Rangking</a>
    </div>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('hitung.index') }}">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Hasil Hitung Gap</h6>
                </div>
                <div class="card-body">
                    <p>Pada tabel ini hasil hitung gap, ditampilkan untuk setiap kriteria yang dimiliki mahasiswa. Kolom
                        nilai merupakan nilai dari kriteria yang diinputkan pada formulir seleksi, kolom nilai target adalah
                        nilai kriteria yang telah ditentukan.</p>
                    @foreach ($dataHitung as $mahasiswaId => $hitung)
                        @if ($hitung->isNotEmpty() && optional($hitung->first()->mahasiswa)->id)
                            <table class="table table-bordered">
                                <thead class="bg-info table mb-1 text-white">
                                    <tr>
                                        <th class="m-0 font-weight-bold text-white">ID Pengaju:
                                            {{ $hitung->first()->mahasiswa->id }}</th>
                                        <th class="m-0 font-weight-bold text-white" colspan="2">Nama Pengaju:
                                            {{ $hitung->first()->mahasiswa->nama }}</th>
                                        <th class="m-0 font-weight-bold text-white" colspan="2">Alamat:
                                            {{ $hitung->first()->mahasiswa->alamat }}</th>
                                    </tr>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                        <th>Nilai Target</th>
                                        <th>Gap</th>
                                        <th>Bobot Gap</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hitung as $item)
                                        <tr>
                                            <td>{{ optional($item->kriteria)->kriteria ?? 'N/A' }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>{{ $item->nilai_target }}</td>
                                            <td>{{ $item->gap }}</td>
                                            <td>{{ $item->bobot_gap }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                    <div class="text-center mt-4">
                        <a class="btn btn-primary" href="{{ route('hitung.hasil') }}">Hitung Factor dan Nilai Total</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
