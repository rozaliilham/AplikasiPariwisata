<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Login Member</li>
                </ol>
                <h2>Login Member</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <center>
                    <div class="col-lg-6 justify-content-center">
                        <div class="card rounded-3">
                            <div class="card-header bg-transparent border-none">
                                <center>
                                    <img src="{{ asset('storage/' . $setting[0]->logo) }}" class="img img-fluid"
                                        width="80" alt="">
                                </center>
                            </div>
                            <div class="card-body table-responsive">
                                <form action="{{ route('authloginmember') }}" method="post">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" name="email" id=""
                                                    placeholder="Masukan email dengan benar..." class="form-control"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input type="password" name="password" id=""
                                                    placeholder="Masukan password anda..." class="form-control"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"
                                                        aria-hidden="true"></i> Login</button>
                                            </td>
                                        </tr>
                                        <tr align="right">
                                            <td colspan="2">Belum punya akun? <a
                                                    href="{{ route('register-member') }}" class="text-info">Registrasi
                                                    disini!</a></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </center>

            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->
    @if (session()->has('success'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('success') }}",
                "success"
            );
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('error') }}",
                "warning"
            );
        </script>
    @endif

</div>
