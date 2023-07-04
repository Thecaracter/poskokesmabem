<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"> <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Quisioner</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li
                class="dropdown {{ Request::path() === 'pengurus' || Request::path() === 'angkatan' || Request::path() === 'jurusan' || Request::path() === 'mitra' || Request::path() === 'prodi' || Request::path() === 'beasiswa' || Request::path() === 'layanan' || Request::path() === 'infokos' ? 'active' : '' }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown {{ Request::path() === 'pengurus' ? 'active' : '' }}"><a class="nav-link"
                            href="/pengurus"><i data-feather="user"></i><span>Pengurus</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'angkatan' ? 'active' : '' }}"><a class="nav-link"
                            href="/angkatan"><i data-feather="bookmark"></i><span>Angkatan</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'jurusan' ? 'active' : '' }}"><a class="nav-link"
                            href="/jurusan"><i data-feather="archive"></i><span>Jurusan</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'prodi' ? 'active' : '' }}"><a class="nav-link"
                            href="/prodi"><i data-feather="database"></i><span>Prodi</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'layanan' ? 'active' : '' }}"><a class="nav-link"
                            href="/layanan"><i data-feather="smartphone"></i><span>Layanan</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'beasiswa' ? 'active' : '' }}"><a class="nav-link"
                            href="/beasiswa"><i data-feather="gift"></i><span>Beasiswa</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'infokos' ? 'active' : '' }}"><a class="nav-link"
                            href="/infokos"><i data-feather="home"></i><span>Info Kos</span></a>
                    </li>
                    <li class="dropdown {{ Request::path() === 'mitra' ? 'active' : '' }}"><a class="nav-link"
                            href="/mitra"><i data-feather="dollar-sign"></i><span>Mitra</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown {{ Request::path() === 'advokasi' ? 'active' : '' }}">
                <a href="/advokasi" class="nav-link"><i data-feather="file-text"></i><span>Advokasi</span></a>
            </li>
        </ul>
    </aside>
</div>
