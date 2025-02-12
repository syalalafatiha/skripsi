@extends('layouts.main')

@section('main_content')
    <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">Kembali</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Seleksi Penerima Beasiswa Scientist</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-info text-white">
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Universitas / Program Studi</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Nominal UKT</th>
                            <th style="text-align: center;">Nilai Rangking</th>
                            <th style="text-align: center;">Urutan Penerima</th>
                            @if (auth()->user()->role === 'admin')
                                <th style="text-align: center;">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ranking as $rank)
                            <tr>
                                <td align="center">{{ $rank['mahasiswa_id'] }}</td>
                                <td>{{ $rank['nama_mahasiswa'] }}</td>
                                <td align="center">{{ $rank['universitas_mahasiswa'] }} / {{ $rank['prodi_mahasiswa'] }}
                                </td>
                                <td>{{ $rank['alamat_mahasiswa'] }}</td>
                                <td align="center">{{ $rank['ukt_mahasiswa'] }}</td>
                                <td align="center">{{ $rank['ranking'] }}</td>
                                <td align="center">{{ $rank['urutan'] }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>
                                        <form action="{{ route('hitung.destroy', $rank['mahasiswa_id']) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-circle btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-4 mb-2">
                    <a class="btn btn-primary" href="{{ route('export.index') }}">Halaman cetak</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js">
    $(document).ready(function() {
        // Event klik tombol validasi
        $('.btn-validasi').on('click', function(e) {
            e.preventDefault();
            let button = $(this);
            let mahasiswaId = button.data('id');
            let form = button.closest('form');
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        // Update tombol menjadi hijau
                        button.removeClass('btn-danger').addClass('btn-success');
                        button.find('i').removeClass('fas fa-times').addClass(
                            'fas fa-check');
                        button.find('span.text').text('Sudah Validasi');
                        // Update status mahasiswa
                        $('#status-' + mahasiswaId).text('Valid');
                        // Hilangkan form validasi
                        form.remove();
                    } else {
                        alert('Gagal memvalidasi, coba lagi.');
                    }
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });
    });
</script>
