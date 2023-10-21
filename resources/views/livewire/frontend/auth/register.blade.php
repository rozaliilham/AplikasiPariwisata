<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Registrasi Member</li>
                </ol>
                <h2>Registrasi Member</h2>

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
                                <form action="{{ route('authregistermember') }}" method="post">
                                    @csrf
                                    <table class="table table-hover">
                                        <tr>
                                            <td>Nama</td>
                                            <td><input type="text" name="name" id=""
                                                    placeholder="Masukan nama lengkap anda..." class="form-control"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td>No.HP</td>
                                            <td><input type="tel" name="telp" id=""
                                                    placeholder="Masukan No.HP aktif..." class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="email" name="email" id=""
                                                    placeholder="Masukan email dengan benar..." class="form-control"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input type="password" minlength="8" name="password" id=""
                                                    placeholder="Masukan password anda..." class="form-control"
                                                    required></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><input type="text" name="alamat" id=""
                                                    placeholder="Masukan alamat  anda..." class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hak Akses</td>
                                            <td>
                                                <select name="level" required class="form-control">
                                                    <option value="">Pilih Hak Akses anda</option>
                                                    <option value="Member">Member</option>
                                                    <option value="Pedagang">Pedagang</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('login-member') }}" class="btn btn-warning"><i
                                                        class="fa fa-sync-alt" aria-hidden="true"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"
                                                        aria-hidden="true"></i> Registrasi</button>
                                            </td>
                                        </tr>
                                        <tr align="right">
                                            <td colspan="2">Sudah punya akun? <a href="{{ route('login-member') }}"
                                                    class="text-info">Login
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
</div>
@if (session()->has('error'))
<script>
    Swal.fire(
        "Informasi",
        "{{ session('error') }}",
        "warning"
    );
</script>
@endif
