<div class="mainnav__categoriy py-2">
    <ul class="mainnav__menu nav flex-column" id="myMenu">
        {{-- @if (Auth::user()->email_verified_at === null)
        <div class="card border">
            <p>Anda belum verifikasi email!</p>
            <a href="" class="text-decoration-none">Klik disini untuk memverifikasi</a>
        </div>
        <li class="nav-item mt-3">
            <a href="{{route('dashboard')}}" class="mininav-toggle nav-link active" id="menuDashboard"><i class="demo-pli-home fs-5 me-2"></i>
                <span class="nav-label ms-1">Dashboard</span>
            </a>
        </li>
        @else --}}
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="mininav-toggle nav-link {{ Route::is('dashboard') ? 'active' : ''  }}" id="menuHome"><i class="demo-pli-home fs-5 me-2"></i>
                <span class="nav-label ms-1">Dashboard</span>
            </a>
        </li>
        @can('user-index')
        <li class="nav-item">
            <a href="{{route('user-index')}}" class="mininav-toggle nav-link {{ Route::is('user-index') ? 'active' : ''  }}" id="menuUser"><i class="bi bi-people-fill fs-5 me-2"></i>
                <span class="nav-label ms-1">User</span>
            </a>
        </li>
        @endcan
        @can('artikel-index')
        <li class="nav-item">
            <a href="{{route('artikel')}}" class="mininav-toggle nav-link {{ Route::is('artikel') ? 'active' : ''  }}" id="menuArtikel"><i class="bi bi-newspaper fs-5 me-2"></i>
                <span class="nav-label ms-1">Artikel</span>
            </a>
        </li>
        @endcan
        @can('event-index')
        <li class="nav-item">
            <a href="{{route('event')}}" class="mininav-toggle nav-link {{ Route::is('event') ? 'active' : ''  }}" id="menuEvent"><i class="bi bi-calendar-event fs-5 me-2"></i>
                <span class="nav-label ms-1">Event</span>
            </a>
        </li>
        @endcan
        @can('galeri-index')
        <li class="nav-item">
            <a href="{{route('galeri')}}" class="mininav-toggle nav-link {{ Route::is('galeri') ? 'active' : ''  }}" id="menuGaleri"><i class="bi bi-images fs-5 me-2"></i>
                <span class="nav-label ms-1">Galeri</span>
            </a>
        </li>
        @endcan
        @can('role-index')
        <li class="nav-item">
            <a href="{{ route('role-index') }}" class="mininav-toggle nav-link {{ Route::is('role-index') ? 'active' : ''  }}" id="menuRole"><i class="bi bi-screwdriver fs-5 me-2"></i>
                <span class="nav-label ms-1">Role Permission</span>
            </a>
        </li>
        @endcan
        @can('tim-index')
        <li class="nav-item">
            <a href="{{ route('tim') }}" class="mininav-toggle nav-link {{ Route::is('tim') ? 'active' : ''  }}" id="menuTim"><i class="bi bi-person-vcard fs-5 me-2"></i>
                <span class="nav-label ms-1">Tim Kerja</span>
            </a>
        </li>
        @endcan
        @role('admin')
        <li class="nav-item my-1">
            <a href="{{ route('export-sql') }}" class="mininav-toggle nav-link active" id="menuBackup"> <i class="bi bi-database-down fs-5 me-2"></i>
                <span class="nav-label ms-1">Backup Database</span>
            </a>
        </li>
        @endrole
        {{-- @endif --}}
    </ul>
</div>
