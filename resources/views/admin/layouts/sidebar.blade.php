<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Home</span>
                </li>
                <li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class=""><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Master Data</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('category') }}">Data kategori</a></li>
                        <li><a href="{{ route('kecamatan') }}">Data kecamatan</a></li>
                        <li><a href="{{ route('kabupaten') }}">Data kabupaten</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-image"></i> <span> Galeri</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('gallery') }}">Data Galeri Foto</a></li>
                        <li><a href="{{ route('form-gallery') }}">Form Galeri Foto</a></li>
                        <li><a href="{{ route('video') }}">Data Galleri Video</a></li>
                        <li><a href="{{ route('form-video') }}" class="">Form Galleri Video</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-newspaper"></i> <span> Berita</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('news') }}">Data berita</a></li>
                        <li><a href="{{ route('form-news') }}">Form berita</a></li>
                        <li><a href="{{ route('komentar-berita') }}">Komentar Berita</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-book"></i> <span> Agenda</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('event') }}">Data agenda</a></li>
                        <li><a href="{{ route('form-event') }}">Form agenda</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-map"></i> <span> Wisata</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('wisata') }}">Data wisata</a></li>
                        <li><a href="{{ route('form-wisata') }}">Form wisata</a></li>
                        <li><a href="{{ route('komentar-wisata') }}">Komentar Pengunjung wisata</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-hotel"></i> <span> HomeStay</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('fasilitas-homestay') }}">Data Fasilitas HomeStay</a></li>
                        <li><a href="{{ route('homestay') }}">Data HomeStay</a></li>
                        <li><a href="{{ route('form-homestay') }}">Form HomeStay</a></li>
                        <li><a href="{{ route('data-reservasi') }}">Data Reservasi</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-book"></i> <span> Produk</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('product') }}">Data Produk</a></li>
                        <li><a href="{{ route('form-product') }}">Form Produk</a></li>
                        <li><a href="{{ route('penjualan') }}">Data Penjualan</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Setting</span>
                </li>
                <li class="{{ (request()->segment(1) == 'kata-sambutan') ? 'active' : '' }}">
                    <a href="{{ route('kata-sambutan') }}"><i class="fas fa-volume-up"></i> <span>Kata Sambutan</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'visi-misi') ? 'active' : '' }}">
                    <a href="{{ route('visi-misi') }}"><i class="fas fa-book"></i> <span>Visi Misi</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'struktur-organisasi') ? 'active' : '' }}">
                    <a href="{{ route('struktur-organisasi') }}"><i class="fas fa-image"></i> <span>Struktur Organisasi</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'slider') ? 'active' : '' }}">
                    <a href="{{ route('slider') }}"><i class="fas fa-images"></i> <span>Image Slider</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}"><i class="fas fa-phone"></i> <span>Contact</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'my-profile') ? 'active' : '' }}">
                    <a href="{{ route('my-profile') }}"><i class="fas fa-user-circle"></i> <span>Profil</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'user') ? 'active' : '' }}">
                    <a href="{{ route('user') }}"><i class="fas fa-users"></i> <span>Management User</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'norek') ? 'active' : '' }}">
                    <a href="{{ route('norek') }}"><i class="fas fa-money-bill-alt"></i> <span>Norek Pedagang</span></a>
                </li>
                <li class="{{ (request()->segment(1) == 'setting-website') ? 'active' : '' }}">
                    <a href="{{ route('setting-website') }}"><i class="fas fa-cogs"></i> <span>Konfigurasi Website</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
