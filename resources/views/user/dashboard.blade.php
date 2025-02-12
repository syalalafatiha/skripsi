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
                                Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataUser }}</div>
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
                                Data Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataMahasiswa }}</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Aspek
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dataAspek }}</div>
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
                                Data Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataKriteria }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sistem Pendukung Keputusan</h6>
        </div>
        <div class="card-body">
            <strong class="m-0 font-weight-bold text-primary">Sistem Pendukung Keputusan Calon Penerima Beasiswa Scientist
                Kabupaten Bojonegoro </strong>adalah sebuah
            sistem yang
            dirancang untuk mempermudah proses seleksi penerima beasiswa Scientist di Kabupaten Bojonegoro. Sistem ini
            menggunakan metode Profile Matching untuk membandingkan profil calon penerima beasiswa dengan profil ideal yang
            telah ditentukan oleh pihak Dinas Pendidikan Kabupaten Bojonegoro. Dengan menggunakan sistem ini, pihak Dinas
            Pendidikan dapat melakukan proses seleksi yang lebih objektif, transparan, dan efisien. Sistem ini juga dapat
            membantu meningkatkan akurasi dan keandalan dalam proses seleksi penerima beasiswa Scientist, sehingga dapat
            memastikan bahwa beasiswa diberikan kepada calon yang paling berhak dan berpotensi.
        </div>
    </div>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman Kriteria Seleksi Berkas Pengaju Beasiswa Scientist</h6>
        </div>
        <div class="card-body">
            <ul>
                <li class="m-0 font-weight-bold text-primary" style="font-weight: bold;">Tujuan</li>
                <p>Tujuan beasiswa Scientist ini adalah untuk mengurangi jumlah mahasiswa putus kuliah karena kurangnya
                    biaya pendidikan, mewujudkan pemerataan suatu ilmu pengetahuan dan keterampilan terhadap masing-masing
                    orang yang memerlukan, dan memberikan penghargaan dan apresiasi bagi mahasiswa berasal dari Bojonegoro
                    untuk lebih berprestasi.</p>
                <li class="m-0 font-weight-bold text-primary" style="font-weight: bold;">Kriteria Seleksi Penerima Beasiswa
                    Scientist</li>
                <p>Proses seleksi penerima beasiswa scientist dilakukan dengan mempertimbangkan kriteria berikut ini:</p>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Warga dengan KTP Bojonegoro</td>
                                <td>Penerima beasiswa merupakan warga Bojonegoro yang menempuh pendidikan di PTS di
                                    Bojonegoro atau PTN di luar Bojonegoro.</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pemilik kartu bantuan (Seperti KPM, KPP, dan lainnya)</td>
                                <td>Mahasiswa yang memiliki orang tua berprofesi petani atau pedagang, dan memiliki jenis
                                    kartu bantuan lain dari pemerintah lebih diprioritaskan.</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Program Studi</td>
                                <td>Penerima beasiswa Scientist merupakan mahasiswa yang menempuh pendidikan di bidang
                                    sains. Penerima beasiswa Scientist adalah mahasiswa dari:<br>
                                    Fakultas Teknik dengan prodi: Teknik Sipil, Teknik Arsitektur, Teknik Planologi, Teknik
                                    Geologi/Geodesi, Teknik Limbah, Teknik Lingkungan, Teknik Industri, Teknik Mesin, Teknik
                                    Kimia, Teknik Informatika/Teknik Komputer, Teknik Elektro, Teknik Perminyakan, Teknik
                                    Pengairan, dan Teknologi Pangan.<br>
                                    Fakultas Pertanian, Peternakan dan Perikanan.<br>
                                    Fakultas Kedokteran (Program Studi Kedokteran Umum).
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jenjang Pendidikan S1/D4 PTN Non-Kedinasan</td>
                                <td>Mahasiswa penerima beasiswa Scientist merupakan mahasiswa dari S1/D4 PTN di luar
                                    Bojonegoro, atau S1 PTS di Bojonegoro, dan Non-Kedinasan.</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jalur Masuk</td>
                                <td>Mahasiswa penerima beasiswa Scientist merupakan mahasiswa yang bukan diterima melalui
                                    jalur mandiri.</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Nilai IPS</td>
                                <td>Penerima beasiswa Scientist memiliki nilai IPS minimal 3.00 sejak semester awal
                                    perkuliahan.</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Prestasi Akademik</td>
                                <td>Mahasiswa yang memiliki prestasi akademik yang relevan dengan bidang studi dan minimal
                                    tingkat kejuaraan Provinsi lebih diprioritaskan.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <li class="m-0 font-weight-bold text-primary" style="font-weight: bold;">Penerima Beasiswa Scientist</li>
                <p>Penerima Beasiswa Scientist ditentukan melalui seleksi berkas menggunakan Sitem Pendukung Keputusan,
                    sistem akan memilih mahasiswa yang layak dan memenuhi kriteria yang telah ditetapkan.</p>
            </ul>
        </div>
    </div>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman Seleksi Berkas Pengaju Beasiswa Scientist</h6>
        </div>
        <div class="card-body">
            <ul>
                <li style="font-weight: bold;">Pilih Menu Seleksi pada bagian Seleksi Penerima</li>
                <li style="font-weight: bold;">Isi formulir seleksi sesuai dengan berkas yang diajukan oleh mahasiswa
                </li>
                <li style="font-weight: bold;">Klik tombol lanjutkan seleksi untuk melihat skor kesesuaian kriteria yang
                    dimiliki mahasiswa dengan kriteria yang telah ditetapkan</li>
                <li style="font-weight: bold;">Lanjutkan untuk melihat skor total kesesuaian kriteria yang dimiliki
                    mahasiswa dengan kriteria yang telah ditetapkan</li>
                <li style="font-weight: bold;">Validasi data mahasiswa yang menerima beasiswa Scientist sebelum dilakukan
                    cetak data seleksi untuk memastikan mahasiswa yang menerima beasiswa Scientist telah memenuhi kriteria,
                    proses validasi dilakukan oleh admin saja</li>
                <li style="font-weight: bold;">Cetak data hasil seleksi penerima beasiswa Scientist</li>
            </ul>
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
                <strong class="m-0 font-weight-bold text-primary">Pedoman Admin</strong>
                <ul>
                    <li style="font-weight: bold;">Pengelolaan akun</li>
                    <p>Admin bertanggung jawab untuk mengelola akun pengguna, admin dapat membuat akun, mengedit akun, dan
                        menghapus akun pengguna.</p>
                    <li style="font-weight: bold;">Pengelolaan data mahasiswa</li>
                    <p>Admin bertanggung jawab untuk mengelola data mahasiswa pengaju beasiswa Scientist, admin dapat
                        membuat/menambah data baru, mengedit data, melihat detail data, dan menghapus data mahasiswa.</p>
                    <li style="font-weight: bold;">Pengelolaan data aspek</li>
                    <p>Admin bertanggung jawab untuk mengelola data aspek penilaian, admin dapat
                        membuat/menambah data baru, mengedit data, melihat detail data, dan menghapus data aspek penilaian.
                    </p>
                    <li style="font-weight: bold;">Pengelolaan data kriteria</li>
                    <p>Admin bertanggung jawab untuk mengelola data kriteria penilaian, admin dapat
                        membuat/menambah data baru, mengedit data, melihat detail data, dan menghapus data kriteria
                        penilaian.</p>
                    <li style="font-weight: bold;">Pengelolaan data sub-kriteria</li>
                    <p>Admin bertanggung jawab untuk mengelola data sub-kriteria penilaian, admin dapat
                        membuat/menambah data baru, mengedit data, melihat detail data, dan menghapus data sub-kriteria
                        penilaian.</p>
                    <li style="font-weight: bold;">Melakukan seleksi berkas</li>
                    <p>Admin dapat melakukan seleksi berkas penerima beasiswa Scientist, admin bertanggung jawab untuk
                        memvalidasi data penerima sebelum dilakukan cetak data. Data penerima bisa dicetak apabila sudah
                        dilakukan validasi/persetujuan. Sebelum melakukan validasi cek kembali data mahasiswa yang tercantum
                        dalam sistem dengan berkas yang diajukan oleh mahasiswa.</p>
                </ul>
                <strong class="m-0 font-weight-bold text-primary">Tugas Admin</strong>
                <ul>
                    <li style="font-weight: bold;">Menginput data calon penerima beasiswa Scientist</li>
                    <p>Admin dapat menginput data calon penerima beasiswa ke dalam sistem, termasuk data pribadi, data
                        akademik, dan data lainnya yang relevan.
                    </p>
                    <li style="font-weight: bold;">Mengelola aspek seleksi</li>
                    <p>Admin harus mengelola aspek seleksi calon penerima beasiswa, termasuk menginput, mengedit, dan
                        menghapus aspek.
                    </p>
                    <li style="font-weight: bold;">Mengelola kriteria seleksi</li>
                    <p>Admin harus mengelola kriteria seleksi calon penerima beasiswa, termasuk menginput, mengedit, dan
                        menghapus kriteria.
                    </p>
                    <li style="font-weight: bold;">Mengelola sub-kriteria seleksi</li>
                    <p>Admin harus mengelola sub-kriteria seleksi calon penerima beasiswa, termasuk menginput, mengedit, dan
                        menghapus sub-kriteria.
                    </p>
                    <li style="font-weight: bold;">Mengelola laporan hasil seleksi</li>
                    <p>Admin harus mengelola laporan hasil seleksi calon penerima beasiswa, termasuk memvalidasi hasil
                        seleksi.
                    </p>
                </ul>
            </div>
        </div>
    </div>

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Pedoman dan Tugas Pengguna</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <strong class="m-0 font-weight-bold text-primary">Pedoman Pengguna</strong>
                <ul>
                    <li style="font-weight: bold;">Penginputan data mahasiswa</li>
                    <p>Pengguna dapat melakukan input data mahasiswa pengaju beasiswa Scientist, Pengguna dapat
                        membuat/menambah data baru, mengedit data, melihat detail data, dan menghapus data mahasiswa.</p>
                    <li style="font-weight: bold;">Melakukan seleksi berkas</li>
                    <p>Pengguna dapat melakukan seleksi berkas penerima beasiswa Scientist, Pengguna bertanggung jawab untuk
                        memvalidasi data penerima sebelum dilakukan cetak data. Data penerima bisa dicetak apabila sudah
                        dilakukan validasi/persetujuan. Sebelum melakukan validasi cek kembali data mahasiswa yang tercantum
                        dalam sistem dengan berkas yang diajukan oleh mahasiswa.</p>
                    <li style="font-weight: bold;">Melakukan cetak data hasil seleksi</li>
                    <p>Pengguna juga dapat melakukan cetak data hasil seleksi penerima beasiswa Scientist, data hanya bisa
                        dicetak setelah dilakukan validasi/persetujuan oleh admin.</p>
                </ul>
                <strong class="m-0 font-weight-bold text-primary">Tugas Pengguna</strong>
                <ul>
                    <li style="font-weight: bold;">Menginput data calon penerima beasiswa Scientist</li>
                    <p>Pengguna dapat menginput data calon penerima beasiswa ke dalam sistem, termasuk data pribadi, data
                        akademik, dan data lainnya yang relevan.
                    </p>
                    <li style="font-weight: bold;">Melakukan seleksi penerima beasiswa Scientist</li>
                    <p>Pengguna dapat melakukan proses seleksi penerima beasiswa pada menu <strong>Seleksi
                            penerima->Seleksi</strong>,
                        apabila ingin melihat hasil seleksi pilih menu Seleksi <strong>Penerima->Hasil Seleksi</strong>.
                    </p>
                </ul>
                <strong class="m-0 font-weight-bold text-success">Keterangan</strong>
                <p>Untuk menu aspek, kriteria, dan sub-kriteria hanya dapat dikelola oleh adamin. Pengguna dalam sistem ini
                    adalah staff yang bertugas untuk melakukan proses seleksi penerima Beasiswa Scientist Kabupaten
                    Bojonegoro.
                </p>
            </div>
        </div>
    </div>
@endsection
