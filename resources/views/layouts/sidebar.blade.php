<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar dengan Dropdown Pengguna</title>
    <style>
        #dropdown-user {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            z-index: 10;
        }

        /* Tambahan CSS agar tetap terlihat */
        #dropdown-user.hidden {
            display: none;
        }

        /* Tambahan CSS untuk dropdown riwayat */
        #riwayat-list.hidden {
            display: none;
        }
    </style>
</head>
<body>
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between relative">
            <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" id="sidebar-toggle">
               <span class="sr-only">Buka sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
                <a href="/dashboard" class="flex ms-2 md:me-24">
                    <img src="/image/logo_sambeng.png" class="h-8 me-3" alt="Logo Sambeng" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SURAT SAMBENG</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                    @php
                        $userFoto = Auth::user()->foto;
                    @endphp
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" id="user-menu-button">
                        <span class="sr-only">Buka menu pengguna</span>
                        @if($userFoto)
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $userFoto) }}" alt="Foto pengguna">
                        @else
                            <!-- Avatar default menggunakan SVG -->
                            <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profil</a>
                            </li>
                            <li>
                                <!-- Form Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <!-- Menu utama -->
            <li>
                <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Tombol Pengajuan -->
            <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="riwayat-list" id="riwayat-button">
                <!-- Ikon Baru untuk Riwayat Pengajuan -->
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 0 1 5 5v12a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5h5zm0 2H7a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h5a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3zm7 0h3a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-3v-2h2V6h-2V4zm-8 6a1 1 0 0 1 .117 1.993L11 12H7a1 1 0 0 1-.117-1.993L7 10h4zm0 4a1 1 0 0 1 .117 1.993L11 16H7a1 1 0 0 1-.117-1.993L7 14h4z"/>
                </svg>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pengajuan</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
                <ul id="riwayat-list" class="hidden py-2 space-y-2">
                    <li>
                        <a href="/kematian/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Kematian</a>
                    </li>
                    <li>
                        <a href="/usaha/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Usaha</a>
                    </li>
                    <li>
                        <a href="/domisili/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Domisili</a>
                    </li>
                    <li>
                        <a href="/kelahiran/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Kelahiran</a>
                    </li>
                    <li>
                        <a href="/nikah/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Pengantar Nikah</a>
                    </li>
                    <li>
                        <a href="/pindah/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Pindah</a>
                    </li>
                    <li>
                        <a href="/sktm/index" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Surat Keterangan Tidak Mampu</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const dropdownUser = document.getElementById('dropdown-user');

        userMenuButton.addEventListener('click', function() {
            dropdownUser.classList.toggle('hidden');
        });

        const sidebarToggle = document.getElementById('sidebar-toggle');
        const logoSidebar = document.getElementById('logo-sidebar');
        const overlay = document.getElementById('overlay');

        // Fungsi untuk membuka dan menutup sidebar
        function toggleSidebar() {
            logoSidebar.classList.toggle('translate-x-0'); // Toggle class untuk menampilkan/menyembunyikan sidebar
            overlay.classList.toggle('hidden'); // Toggle class untuk menampilkan/menyembunyikan overlay
        }

        // Event listener untuk toggle sidebar saat tombol diklik
        sidebarToggle.addEventListener('click', function() {
            toggleSidebar();
        });
        const riwayatButton = document.getElementById('riwayat-button');
        const riwayatList = document.getElementById('riwayat-list');

        // Fungsi untuk menampilkan atau menyembunyikan submenu "Riwayat"
        function toggleRiwayatMenu() {
            riwayatList.classList.toggle('hidden');
        }

        // Event listener untuk tombol "Riwayat"
        riwayatButton.addEventListener('click', function() {
            toggleRiwayatMenu();
        });

        // Event listener untuk menutup submenu saat salah satu opsi dalam submenu diklik
        riwayatList.querySelectorAll('a').forEach(function(item) {
            item.addEventListener('click', function() {
                toggleRiwayatMenu();
            });
        });
    });
</script>
</body>
</html>
