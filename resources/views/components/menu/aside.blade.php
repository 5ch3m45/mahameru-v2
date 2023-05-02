<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @php
                $explodeRouteName = explode('.', \Route::currentRouteName());
                $current = $explodeRouteName ? $explodeRouteName[0] : '';
                @endphp
                <li class="sidebar-item mt-4">
                    <span>MENU</span>
                </li>
                <li class="sidebar-item @if($current == 'dashboard') selected @endif">
                    <a class="@if($current == 'dashboard') active @endif sidebar-link waves-effect waves-dark sidebar-link" href="{{ getenv('APP_URL') }}/dashboard" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->handle_semua_arsip || auth()->user()->handle_arsip_publik)
                <li class="sidebar-item @if($current == 'arsip') selected @endif">
                    <a class="@if($current == 'arsip') active @endif sidebar-link waves-effect waves-dark sidebar-link" href="{{ getenv('APP_URL') }}/dashboard/arsip" aria-expanded="false">
                        <i class="mdi mdi-archive"></i>
                        <span class="hide-menu">Arsip</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->handle_klasifikasi)
                <li class="sidebar-item @if($current == 'klasifikasi') selected @endif">
                    <a class="@if($current == 'klasifikasi') active @endif sidebar-link waves-effect waves-dark sidebar-link active" href="{{ getenv('APP_URL') }}/dashboard/klasifikasi" aria-expanded="false">
                        <i class="mdi mdi-folder"></i>
                        <span class="hide-menu">Kode Klasifikasi</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->handle_aduan)
                <li class="sidebar-item @if($current == 'aduan') selected @endif">
                    <a class="@if($current == 'aduan') active @endif sidebar-link waves-effect waves-dark sidebar-link" href="{{ getenv('APP_URL') }}/dashboard/aduan" aria-expanded="false">
                        <i class="mdi mdi-email-alert"></i>
                        <span class="hide-menu">Aduan</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->handle_admin)
                <li class="sidebar-item @if($current == 'pengelola') selected @endif">
                    <a class="@if($current == 'pengelola') active @endif sidebar-link waves-effect waves-dark sidebar-link" href="{{ getenv('APP_URL') }}/dashboard/pengelola" aria-expanded="false">
                        <i class="bi bi-diagram-3-fill"></i>
                        <span class="hide-menu">Pengelola</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-item @if($current == 'profile') selected @endif">
                    <a class="@if($current == 'profile') active @endif sidebar-link waves-effect waves-dark sidebar-link" href="{{ getenv('APP_URL') }}/dashboard/profile" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Profile Anda</span>
                    </a>
                </li>
                <li class="sidebar-item mt-4">
                    <a class="sidebar-link bg-danger text-white waves-effect waves-dark sidebar-link logout" href="{{ route('logout') }}" aria-expanded="false">
                        <i class="bi bi-power" style="color: white"></i>
                        <span class="hide-menu">Keluar</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

