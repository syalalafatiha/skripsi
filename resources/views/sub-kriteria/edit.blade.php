@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data Sub-Kriteria Penilaian ini dikelola oleh admin</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('sub-kriteria.index') }}">Kembali</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="bg-info card-header">
                    <div class="d-flex align-items-center">
                        <h6 class="m-0 font-weight-bold text-white">Ubah Data Sub-Kriteria Penilaian</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p>Pastikan data yang diubah sudah benar!</p>
                    <!-- // Form -->
                    <form action="{{ route('sub-kriteria.update', $subkriteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="kriteria_id" class="form-label">Kriteria Penilaian</label></td>
                                <td>
                                    <select class="form-control" name="kriteria_id" id="kriteria_id" required>
                                        @foreach ($kriteriaOptions as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{ $kriteria->kriteria }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="sub_kriteria" class="form-label">Sub-Kriteria Penilaian</label></td>
                                <td><input class="form-control" type="text" name="sub_kriteria" id="sub_kriteria"
                                        value="{{ $subkriteria->sub_kriteria }}" required></td>
                            </tr>
                            <tr>
                                <td><label for="nilai" class="form-label">Nilai</label></td>
                                <td><input class="form-control" type="number" name="nilai" id="nilai"
                                        value="{{ $subkriteria->nilai }}" required></td>
                            </tr>
                        </table>
                        <div class="text-center mt-4"> <input class="btn btn-success" type="submit" name="edit_kriteria"
                                value="Simpan">
                            <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
