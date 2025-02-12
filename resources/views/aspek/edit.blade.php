@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Ubah Data Aspek hanya dapat dikelola oleh admin</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('aspek.index') }}">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="bg-info card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Ubah Data Aspek</h6>
                </div>
                <div class="card-body">
                    <p>Pastikan data yang diubah sudah benar!</p>
                    <form action="{{ route('aspek.update', $aspek->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="aspek" class="form-label">Aspek Penilaian</label></td>
                                <td>
                                    <input class="form-control" type="text" name="aspek" id="aspek"
                                        value="{{ $aspek->aspek }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="bobot" class="form-label">Bobot</label></td>
                                <td>
                                    <select class="form-control" name="bobot" id="bobot">
                                        @foreach ($bobotOptions as $option)
                                            <option value="{{ $option }}"
                                                {{ $aspek->bobot == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="factor" class="form-label">Factor</label></td>
                                <td>
                                    <select class="form-control" name="factor" id="factor">
                                        @foreach ($factors as $option)
                                            <option value="{{ $option }}"
                                                {{ $aspek->factor == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
