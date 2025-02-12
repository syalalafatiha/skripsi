@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data Kriteria Penilaian ini dikelola oleh admin</p>

    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('kriteria.index') }}">Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="bg-info card-header">
                    <div class="d-flex align-items-center">
                        <h6 class="m-0 font-weight-bold text-white">Tambah Data Kriteria Penilaian</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p>Isi formulir kriteria dengan benar, pertimbangkan nilai target dan factor kriteria, isi ID kriteria
                        sesuai dengan
                        format!</p>
                    <!-- // Form -->
                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf
                        <table cellpadding="5" class="w-100">
                            <tr>
                                <td><label for="id" class="form-label">ID</label></td>
                                <td><input class="form-control" type="numeric" name="id" id="id" required></td>
                            </tr>
                            <tr>
                                <td><label for="aspek_id" class="form-label">Aspek</label></td>
                                <td>
                                    <select class="form-control" name="aspek_id" id="aspek_id" required>
                                        @foreach ($aspekOptions as $aspek)
                                            <option value="{{ $aspek->id }}">{{ $aspek->aspek }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kriteria" class="form-label">Kriteria Penilaian</label></td>
                                <td><input class="form-control" type="text" name="kriteria" id="kriteria" required></td>
                            </tr>
                            <tr>
                                <td><label for="factor" class="form-label">Factor</label></td>
                                <td>
                                    <select class="form-control" name="factor" id="factor" required>
                                        <option value="">--Pilih--</option>
                                        @foreach ($factors as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="nilai_target" class="form-label">Nilai Target</label></td>
                                <td><input class="form-control" type="integer" name="nilai_target" id="nilai_target"
                                        required></td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <input class="btn btn-success" type="submit" name="tambah_kriteria" value="Simpan">
                            <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
