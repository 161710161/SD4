<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="/assets/admin/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Artikel</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('artikel.index') }}">Artikel</a>
                                </li>
                                <li>
                                    <a href="{{ route('kategoriartikel.index') }}">Kategori Artikel</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Galeri</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('galeri.index') }}">Galeri</a>
                            </li>
                            <li>
                                <a href="{{ route('kategorigaleri.index') }}">Kategori Galeri</a>
                            </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow"  href="#">
                                <i class="fas fa-table"></i>Kurikulum</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('kurikulum.index') }}">Kurikulum</a>
                            </li>
                            <li>
                                <a href="{{ route('guru.index') }}">Guru</a>
                            </li>
                            <li>
                                <a href="{{ route('staf.index') }}">Staf</a>
                            </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('eskul.index') }}">
                                <i class="far fa-check-square"></i>Eskul</a>
                        </li>
                        <li>
                            <a href="{{ route('fasilitas.index') }}">
                                <i class="fas fa-calendar-alt"></i>Fasilitas</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.index') }}">
                                <i class="fas fa-map-marker-alt"></i>Profile</a>
                        </li>             
                        <li class="has-sub">
                            <a href="{{ route('prestasi.index') }}">
                                <i class="fas fa-desktop"></i>Prestasi</a>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>