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
                        <h6 class="m-0 font-weight-bold text-white">Ubah Data Kriteria Penilaian</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p>Pastikan data yang diubah sudah benar!</p>
                    <!-- // Form -->
                    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="aspek_id" class="form-label">Aspek Penilaian</label></td>
                                <td>
                                    <select class="form-control" name="aspek_id" id="aspek_id" required>
                                        @foreach ($aspekOptions as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('aspek_id', $kriteria->aspek_id) == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="kriteria" class="form-label">Kriteria Penilaian</label></td>
                                <td>
                                    <input class="form-control" type="text" name="kriteria" id="kriteria"
                                        value="{{ $kriteria->kriteria }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="factor" class="form-label">Factor</label></td>
                                <td>
                                    <select class="form-control" name="factor" id="factor" required>
                                        @foreach ($factors as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ $kriteria->factor == $value ? 'selected' : '' }}>{{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="nilai_target" class="form-label">Nilai Target</label></td>
                                <td><input class="form-control" type="integer" name="nilai_target" id="nilai_target"
                                        value="{{ $kriteria->nilai_target }}" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-success" type="submit" name="edit_kriteria" value="Simpan">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
