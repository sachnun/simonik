<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <a class="sidebar-brand" href="{{ route('home') }}">
                                <span class="sidebar-brand-text align-middle">
                                    Simonik
                                </span>
                                <svg class="sidebar-brand-icon align-middle" width="32px" height="32px"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
                                    stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                                    style="margin-left: -3px">
                                    <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                                    <path d="M20 12L12 16L4 12"></path>
                                    <path d="M20 16L12 20L4 16"></path>
                                </svg>
                            </a>

                            <div class="sidebar-user mb-4">
                                <div class="d-flex justify-content-center">
                                    <div class="flex-grow-1">
                                        <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ auth()->user()->nama }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-start">
                                            <a class="dropdown-item" href="#">Detail Akun</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                                        </div>

                                        @if (auth()->user()->role == 'admin')
                                            <div class="sidebar-user-subtitle">Admin</div>
                                        @else
                                            <div class="sidebar-user-subtitle">User</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <ul class="sidebar-nav">
                                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{ route('home') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-sliders align-middle">
                                            <line x1="4" y1="21" x2="4" y2="14"></line>
                                            <line x1="4" y1="10" x2="4" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="3"></line>
                                            <line x1="20" y1="21" x2="20" y2="16"></line>
                                            <line x1="20" y1="12" x2="20" y2="3"></line>
                                            <line x1="1" y1="14" x2="7" y2="14"></line>
                                            <line x1="9" y1="8" x2="15" y2="8"></line>
                                            <line x1="17" y1="16" x2="23" y2="16"></line>
                                        </svg>
                                        <span class="align-middle">Dashboard</span>
                                    </a>
                                </li>

                                @php
                                    $active = Request::is('dashboard/pemeriksaan/*') ? true : false;
                                @endphp
                                <li class="sidebar-item {{ $active ? 'active' : '' }}">
                                    <a data-bs-target="#dashboards" data-bs-toggle="collapse"
                                        class="sidebar-link {{ $active ? '' : 'collapsed' }}"
                                        aria-expanded="{{ $active ? '' : 'false' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-check-circle align-middle">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <span class="align-middle">Pemeriksaan</span>
                                    </a>
                                    <ul id="dashboards"
                                        class="sidebar-dropdown list-unstyled collapse {{ $active ? 'show' : '' }}"
                                        data-bs-parent="#sidebar" style="">
                                        <li
                                            class="sidebar-item {{ Request::is('dashboard/pemeriksaan/rutin*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('pemeriksaan.rutin') }}">
                                                Pemeriksaan Rutin
                                            </a>
                                        </li>
                                        <li
                                            class="sidebar-item {{ Request::is('dashboard/pemeriksaan/khusus*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('pemeriksaan.khusus') }}">
                                                Pemeriksaan Khusus
                                            </a>
                                        </li>
                                        <li
                                            class="sidebar-item {{ Request::is('dashboard/pemeriksaan/tujuan-lain*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('pemeriksaan.tujuan-lain') }}">
                                                Pemeriksaan Tujuan Lain
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li
                                    class="sidebar-item {{ Request::is('dashboard/surat-ketetapan-pajak*') ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{ route('surat-ketetapan-pajak.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-list align-middle">
                                            <line x1="8" y1="6" x2="21" y2="6"></line>
                                            <line x1="8" y1="12" x2="21" y2="12"></line>
                                            <line x1="8" y1="18" x2="21" y2="18"></line>
                                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                        </svg> <span class="align-middle">Surat Ketetapan Pajak</span>
                                    </a>
                                </li>

                                <li class="sidebar-item {{ Request::is('dashboard/daftar-user*') ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{ route('daftar-user.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-users align-middle">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                        <span class="align-middle">Daftar User</span>
                                    </a>
                                </li>

                                <li
                                    class="sidebar-item {{ Request::is('dashboard/riwayat-login*') ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{ route('riwayat-login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user align-middle">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="align-middle">Riwayat Login</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1331px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 122px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>
