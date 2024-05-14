<div class="mainnav__categoriy py-2">
    <ul class="mainnav__menu nav flex-column" id="myMenu">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="mininav-toggle nav-link {{ Route::is('dashboard') ? 'active' : ''  }}" id="menuDashboard"><i class="demo-pli-home fs-5 me-2"></i>
                <span class="nav-label ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('user-index')}}" class="mininav-toggle nav-link {{ Route::is('user-index') ? 'active' : ''  }}" id="menuUser"><i class="bi bi-people-fill fs-5 me-2"></i>
                <span class="nav-label ms-1">User</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('artikel')}}" class="mininav-toggle nav-link {{ Route::is('artikel') ? 'active' : ''  }}" id="menuArtikel"><i class="bi bi-newspaper fs-5 me-2"></i>
                <span class="nav-label ms-1">Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('galeri')}}" class="mininav-toggle nav-link {{ Route::is('galeri') ? 'active' : ''  }}" id="menuGaleri"><i class="bi bi-images fs-5 me-2"></i>
                <span class="nav-label ms-1">Galeri</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('role-index') }}" class="mininav-toggle nav-link {{ Route::is('role-index') ? 'active' : ''  }}" id="menuRole"><i class="bi bi-screwdriver fs-5 me-2"></i>
                <span class="nav-label ms-1">Role Permission</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tim') }}" class="mininav-toggle nav-link {{ Route::is('tim') ? 'active' : ''  }}" id="menuTim"><i class="bi bi-person-vcard fs-5 me-2"></i>
                <span class="nav-label ms-1">Tim Kerja</span>
            </a>
        </li>
    </ul>
</div>
