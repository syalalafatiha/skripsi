@extends('layouts.main')

@section('main_content')
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">166</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Hitung Nilai
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">20</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Validasi Data</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman Penilaian Berkas Mahasiswa Pengaju Beasiswa Scientist</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                Proses Seleksi Beasiswa Scientist Kabupaten Bojonegoro ini menggunakan Sistem Pendukung Keputusan dengan
                metode Profile Matching<br> Adapun beberapa aturan dalam Profile Matching dalam proses seleksinya<br><br>
                <strong>Pedoman Seleksi Penerima Beasiswa Scientist Kabupaten Bojonegoro</strong><br>1. Tentukan nama
                mahasiswa yang akan diseleksi<br>2. Sesuaikan nilai kriteria yang dimiliki mahasiswa dengan berkas
                persyaratan<br>3. Proses seleksi nilai berkas mahasiswa akan dilakukan secara otomatos menggunakan
                sistem<br>4. Hasil proses seleksi akan muncul pada tabel hasil seleksi<br>5. Pimpinan Dinas Pendidikan
                Kabupaten Bojonegoro atau yang berwenang dapat melakukan validasi hasil proses seleksi penerima Beasiswa
                Scientist pada halaman <strong>validasi</strong><br>6. Hasil validasi akan muncul dengan status
                <strong>Valid atau Memenuhi</strong>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman kriteria seleksi penerima Beasiswa Scientist</h6>
        </div>
        <div class="card-body">
            Kriteria dalam proses seleksi penerima Beasiswa Scientist ini dikategorikan dalam 2 tipe, yaitu <strong>Core
                Factor</strong> yang memiliki bobot 60% dan <strong>Secondary Factor</strong> yang memiliki bobot 40%
            <br>Penentuan tipe kriteria ini berdasarkan kriteria mana yang paling dipertimbangkan dalam proses seleksi
            penerima Beasiswa Scientist<br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aspek Penilaian</th>
                            <th>Kriteria</th>
                            <th>Nilai Kriteria</th>
                            <th>Nilai Target</th>
                            <th>Tipe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kependudukan</td>
                            <td>Bojonegoro + KPM</td>
                            <td>6</td>
                            <td>6</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>Kependudukan</td>
                            <td>Bojonegoro Non-KPM</td>
                            <td>4</td>
                            <td>6</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>3</td>
                            <td>Jenjang Pendidikan</td>
                            <td>S1 PTN</td>
                            <td>6</td>
                            <td>6</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>4</td>
                            <td>Jenjang Pendidikan</td>
                            <td>D4 PTN</td>
                            <td>4</td>
                            <td>6</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>Prestasi Akademik</td>
                            <td>Internasional</td>
                            <td>5</td>
                            <td>5</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>6</td>
                            <td>Prestasi Akademik</td>
                            <td>Nasional</td>
                            <td>3</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>7</td>
                            <td>Prestasi Akademik</td>
                            <td>Provinsi</td>
                            <td>2</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>8</td>
                            <td>Nilai IP</td>
                            <td>>3.75</td>
                            <td>5</td>
                            <td>5</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>9</td>
                            <td>Nilai IP</td>
                            <td>3.26-3.75</td>
                            <td>3</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>10</td>
                            <td>Nilai IP</td>
                            <td>3.00-3.25</td>
                            <td>2</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>11</td>
                            <td>Program Studi</td>
                            <td>Prodi Fakultas Teknik</td>
                            <td>5</td>
                            <td>5</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>12</td>
                            <td>Program Studi</td>
                            <td>Prodi Fakultas Pertanian, Perkebunan dan Perikanan</td>
                            <td>3</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>13</td>
                            <td>Program Studi</td>
                            <td>Prodi Kedokteran Umum</td>
                            <td>2</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>14</td>
                            <td>Jalur Masuk Universitas</td>
                            <td>SNBP</td>
                            <td>5</td>
                            <td>5</td>
                            <td>Core Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>15</td>
                            <td>Jalur Masuk Universitas</td>
                            <td>SNBT</td>
                            <td>3</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>16</td>
                            <td>Jalur Masuk Universitas</td>
                            <td>TES</td>
                            <td>2</td>
                            <td>5</td>
                            <td>Secondary Factor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman dan Tugas Admin</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                Tugas admin pada Sistem Pendukung Keputusan ini diantaranya adalah<br><br>1. Admin dapat menambah, mengubah,
                dan menghapus data pengguna sistem pendukung keputusan<br>2. Admin dapat menambah, mengubah, dan menghapus
                data mahasiswa dalam sistem pendukung keputusan<br>3. Admin dapat menambah, mengubah, dan menghapus data
                aspek dan kriteria<br>4. Admin dapat menambah, mengubah, dan menghapus data perhitungan profile
                matching<br>5. Admin dapat menyesuaikan berkas kriteria yang dimiliki mahasiswa dengan kriteria target yang
                telah ditetapkan oleh Dinas Pendidikan Kabupaten Bojonegoro<br>6. Admin dapat mencetak laporan validasi yang
                telah dilakukan oleh Kepala Dinas Pendidikan atau yang berwenang
            </div>
        </div>
    </div>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman Pengguna</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                Pedoman Pengguna pada Sistem Pendukung Keputusan ini diantaranya adalah<br><br>1. Pengguna dapat menambah
                data mahasiswa pada sistem pendukung keputusan<br>2. Pengguna dapat melakukan proses seleksi penerima
                beasiswa<br>3. Pengguna dapat melakukan validasi hasil proses seleksi <strong>(Proses validasi dilakukan
                    oleh pengguna yang berwenang)</strong><br>4. Pengguna dapat melihat aspek dan kriteria<br>5. Pengguna
                dapat melihat hasil proses seleksi<br>6. Pengguna dapat mencetak hasil seleksi (Apabila hasil telah
                divalidasi oleh yang berwenang)
            </div>
        </div>
    </div>
@endsection
