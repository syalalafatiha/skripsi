@extends('layouts.main')

@section('main_content')
    <p class="mb-4">Formulir Data aspek ini hanya dapat dikelola oleh admin.</p>
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('aspek.index') }}">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="bg-info card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Data Aspek</h6>
                </div>
                <div class="card-body">
                    <p>Isi formulir aspek dengan benar, pertimbangkan bobot dan factor aspek, isi ID aspek sesuai dengan
                        format!</p>
                    <!-- // Form -->
                    <form action="{{ route('aspek.store') }}" method="POST">
                        @csrf
                        <table cellpadding="8" class="w-100">
                            <tr>
                                <td><label for="aspek_id" class="form-label">ID</label></td>
                                <td><input class="form-control" type="numeric" name="id" id="id" required></td>
                            </tr>
                            <tr>
                                <td><label for="aspek" class="form-label">Aspek Penilaian</label></td>
                                <td><input class="form-control" type="text" name="aspek" id="aspek" required></td>
                            </tr>
                            <tr>
                                <td><label for="bobot" class="form-label">Bobot</label></td>
                                <td>
                                    <select class="form-control" name="bobot">
                                        @foreach ($bobotOptions as $option)
                                            <option value="{{ $option }}">{{ $option }}
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="factor" class="form-label">Factor</label></td>
                                <td>
                                    <select class="form-control" name="factor">
                                        @foreach ($factors as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                            <input class="btn btn-danger" type="reset" name="reset" value="Bersihkan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
