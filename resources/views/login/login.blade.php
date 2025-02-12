<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK Beasiswa Scientist - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12 col-sm-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-8 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('assets/logo_dinas.png') }}" alt="Logo" width="100">
                                    </div>
                                    <div class="text-center">
                                        <h4 class="h4 text-gray-900 mb-2"><strong>Sistem Pendukung Keputusan Penerima
                                                Beasiswa
                                                Scientist</strong>
                                        </h4>
                                        <h6 class="h5 text-gray-900 mb-6">Dinas Pendidikan Kabupaten Bojonegoro</h6>
                                    </div>
                                    <form id="formAuthentication" class="mt-4 mb-3" method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Enter your username" required />
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    name="password" placeholder="Masukkan Password" required />
                                            </div>
                                        </div>
                                        <div class="mb-3">

                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-info d-grid w-100" href="/index"
                                                type="submit">Login</button>
                                        </div>
                                        @if (session('error'))
                                            <div>{{ session('error') }}</div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
