<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="/images" href="/image/logo_sambeng.png">
    <title>Surat Desa</title>
    @vite('resources/css/app.css')
    <style>
        /* CSS untuk #desa-sambeng dan #background-video */
        #desa-sambeng {
            position: relative;
        }

        #background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.9; /* Optional: adjust the opacity of the video */
        }

        /* CSS untuk modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 5px;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* General styling */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 5px 0;
        }

        /* CSS untuk Navbar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb; /* Tailwind's gray-200 */
            position: fixed;
            width: 100%;
            z-index: 20;
            top: 0;
            left: 0;
        }

        .navbar .container {
            max-width: 1280px; /* Tailwind's max-w-screen-xl */
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin: 0 auto;
            padding: 1rem;
        }

        .navbar .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem; /* Replacing space-x-3 */
        }

        .navbar .brand img {
            height: 2rem;
        }

        .navbar .brand span {
            font-size: 1.5rem; /* 2xl */
            font-weight: 600; /* semibold */
            white-space: nowrap;
            color: #000000; /* Default text color */
        }

        .navbar .menu {
            display: none;
            flex-direction: column;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e5e7eb; /* Tailwind's gray-100 */
            border-radius: 0.375rem; /* rounded-lg */
            background-color: #f9fafb; /* Tailwind's gray-50 */
        }

        .navbar .menu.show {
            display: flex;
        }

        .navbar .menu ul {
            display: flex;
            flex-direction: column;
            gap: 1rem; /* Replacing space-y-4 */
        }

        .navbar .menu ul li a {
            padding: 0.5rem 1rem;
            color: #000000; /* Default text color */
            text-decoration: none;
            border-radius: 0.375rem; /* rounded */
            background-color: #f9fafb; /* Tailwind's gray-50 */
        }

        .navbar .menu ul li a:hover {
            background-color: #e5e7eb; /* Tailwind's gray-100 */
            color: #1d4ed8; /* Tailwind's blue-700 */
        }

        .navbar .toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border: none;
            background: none;
            color: #6b7280; /* Tailwind's gray-500 */
        }

        .navbar .toggle-btn:hover {
            background-color: #f3f4f6; /* Tailwind's gray-100 */
            border-radius: 0.375rem; /* rounded */
        }

        @media (min-width: 768px) {
            .navbar .menu {
                display: flex;
                flex-direction: row;
                gap: 2rem; /* Replacing space-x-8 */
                background: none;
                border: none;
                padding: 0;
                margin-top: 0;
            }

            .navbar .menu ul {
                flex-direction: row;
                gap: 0; /* Resetting gap */
            }

            .navbar .menu ul li a {
                background: none;
                padding: 0;
                color: #1d4ed8; /* Tailwind's blue-700 */
            }

            .navbar .toggle-btn {
                display: none;
            }
        }
    </style>

</head>

<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/image/pemalang.png" class="h-8" alt="logo-sidebar">
                <img src="/image/logo_sambeng.png" class="h-8" alt="logo-sidebar">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SURAT SAMBENG</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="/login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#desa-sambeng" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#layanan-surat" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Layanan Surat</a>
                    </li>
                    <li>
                        <a href="#prosedur-pengajuan-surat" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Prosedur Pengajuan</a>
                    </li>
                    <li>
                        <a href="#jadwal-pelayanan" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Waktu Pelayanan</a>
                    </li>
                    <li>
                        <a href="#kontak-kami" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <!-- Foto background dengan tulisan "Desa Sambeng" -->
        <div id="desa-sambeng" class="background min-h-[80vh] grid place-items-center text-white relative">
            <video autoplay muted loop id="background-video" class="absolute inset-0 w-full h-full object-cover">
                <source src="/videos/background_angkasa.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <section class="relative z-10 text-center">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">KANTOR KELURAHAN DESA SAMBENG</h2>
                <p class="text-lg md:text-xl lg:text-2xl">Selamat Datang di KANTOR KELURAHAN DESA SAMBENG</p>
                <p class="text-lg md:text-xl lg:text-2xl">Kecamatan Bantarbolang Kabupaten Pemalang</p>
                <a href="/login" class="text-black bg-white py-2 px-4 rounded-lg mt-4 inline-block">Buat Surat</a> <!-- Mengganti "Login" menjadi "Masuk" -->
            </section>
        </div>



        <!-- Container untuk layanan surat -->
        <div id="layanan-surat" class="min-h-screen flex flex-col items-center justify-center py-10 px-6">
        <h3 class="text-3xl font-bold mb-10 text-gray-800">Layanan Surat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            
            <!-- Surat Keterangan Kelahiran -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-baby text-green-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Keterangan Kelahiran</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalKelahiran')">Lihat Persyaratan</button>
                <button data-url="/kelahiran" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Keterangan Kematian -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-skull text-red-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Keterangan Kematian</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalKematian')">Lihat Persyaratan</button>
                <button data-url="/kematian" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Keterangan Usaha -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-briefcase text-yellow-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Keterangan Usaha</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalUsaha')">Lihat Persyaratan</button>
                <button data-url="/usaha" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Pengantar Nikah -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-ring text-indigo-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Pengantar Nikah</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalNikah')">Lihat Persyaratan</button>
                <button data-url="/nikah" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Keterangan Domisili -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-home text-purple-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Keterangan Domisili</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalDomisili')">Lihat Persyaratan</button>
                <button data-url="/domisili" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Permohonan Pindah Datang WNI -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-plane-departure text-pink-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Permohonan Pindah Datang WNI</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalPindah')">Lihat Persyaratan</button>
                <button data-url="/pindah" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Pembuatan Kartu Keluarga -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-id-card text-blue-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Pembuatan Kartu Keluarga</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalKK')">Lihat Persyaratan</button>
                <button data-url="/" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>

            <!-- Surat Keterangan Tidak Mampu -->
            <div class="p-8 bg-white dark:bg-gray-200 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 text-center">
                <i class="fas fa-hand-holding-usd text-orange-500 text-6xl mb-4"></i>
                <h4 class="text-xl font-bold mb-4">Surat Keterangan Tidak Mampu</h4>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-2" onclick="openModal('modalTidakMampu')">Lihat Persyaratan</button>
                <button data-url="/sktm" class="page-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Buat Surat</button>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modalKelahiran" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalKelahiran')">&times;</span>
            <h2>Persyaratan Surat Keterangan Kelahiran</h2>
            <ul>
                <li>KTP orang tua</li>
                <li>Kartu Keluarga</li>
                <li>Surat keterangan lahir dari rumah sakit (jika ada)</li>
                
            </ul>
        </div>
    </div>

    <div id="modalKematian" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalKematian')">&times;</span>
            <h2>Persyaratan Surat Keterangan Kematian</h2>
            <ul>
                <li>KTP orang yang meninggal</li>
                <li>Kartu Keluarga</li>
                <li>Surat keterangan kematian dari rumah sakit (jika ada)</li>
            </ul>
        </div>
    </div>

    <div id="modalUsaha" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalUsaha')">&times;</span>
            <h2>Persyaratan Surat Keterangan Usaha</h2>
            <ul>
                <li>KTP pemilik usaha</li>
                <li>Kartu Keluarga</li>
                <li>Surat atau Berkas Bukti Usaha (jika ada)</li>
            </ul>
        </div>
    </div>

    <div id="modalNikah" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalNikah')">&times;</span>
            <h2>Persyaratan Surat Pengantar Nikah</h2>
            <ul>
                <li>KTP</li>
                <li>KK</li>
                <li>Surat pengantar dari RT/RW atau Surat Pernyataan Belum Pernah Menikah</li>
            </ul>
        </div>
    </div>

    <div id="modalDomisili" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalDomisili')">&times;</span>
            <h2>Persyaratan Surat Keterangan Domisili</h2>
            <ul>
                <li>KTP</li>
                <li>Surat pengantar dari RT/RW (jika ada)</li>
            </ul>
        </div>
    </div>

    <div id="modalPindah" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalPindah')">&times;</span>
            <h2>Persyaratan Surat Permohonan Pindah</h2>
            <ul>
                <li>KTP</li>
                <li>Kartu Keluarga</li>
                <li>Surat pengantar dari RT/RW (jika ada)</li>
                <li>Bukti Pelunasa PBB</li>
            </ul>
        </div>
    </div>

    <div id="modalKK" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalKK')">&times;</span>
            <h2>Persyaratan Surat Pembuatan Kartu Keluarga</h2>
            <ul>
                <li>Fotokopi KTP suami dan istri</li>
                <li>Fotokopi akta nikah</li>
                <li>Surat pengantar dari RT/RW</li>
            </ul>
        </div>
    </div>

    <div id="modalTidakMampu" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalTidakMampu')">&times;</span>
            <h2>Persyaratan Surat Keterangan Tidak Mampu</h2>
            <ul>
                <li>KTP</li>
                <li>Kartu Keluarga</li>
                <li>Surat pengantar dari RT/RW (jika ada)</li>
            </ul>
        </div>
    </div>



        <!-- Prosedur pengajuan surat -->
        <div id="prosedur-pengajuan-surat" class="min-h-[70vh] flex flex-col items-center justify-center py-10 bg-gray-200">
            <h3 class="text-3xl font-bold mb-6 text-gray-800">Prosedur Pengajuan Surat</h3>
            <div class="max-w-screen-md mx-auto p-6 bg-white rounded-lg shadow-lg">
                <ol class="list-decimal list-inside space-y-4 text-left text-lg leading-relaxed">
                    <li>
                        <strong>Login atau Daftar:</strong> Jika Anda sudah memiliki akun, silakan login. Jika belum, lakukan pendaftaran terlebih dahulu.
                    </li>
                    <li>
                        <strong>Pilih Layanan Surat:</strong> Pilih jenis surat yang Anda butuhkan dari daftar layanan yang tersedia.
                    </li>
                    <li>
                        <strong>Isi Formulir:</strong> Isi formulir pengajuan surat dengan data yang diperlukan.
                    </li>
                    <li>
                        <strong>Unggah Dokumen:</strong> Unggah dokumen pendukung yang diperlukan untuk pengajuan surat.
                    </li>
                    <li>
                        <strong>Submit:</strong> Periksa kembali data yang telah diisi, kemudian klik tombol submit untuk mengajukan surat.
                    </li>
                    <li>
                        <strong>Proses Verifikasi:</strong> Pengajuan Anda akan diverifikasi oleh petugas. Tunggu konfirmasi lebih lanjut.
                    </li>
                    <li>
                        <strong>Ambil Surat:</strong> Setelah pengajuan disetujui, Anda dapat mengambil surat di kantor kelurahan atau mengunduhnya secara online jika tersedia.
                    </li>
                </ol>
            </div>
        </div>

        <!-- Jadwal layanan -->
        <div id="jadwal-pelayanan" class="background min-h-[70vh] grid place-items-center bg-gray-300">
            <h3 class="text-3xl font-bold mb-4">Jadwal Pelayanan</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center mx-10"> <!-- Perubahan pada bagian margin horizontal -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Senin</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <!-- Hari Selasa -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Selasa</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <!-- Hari Rabu -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Rabu</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <!-- Hari Kamis -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Kamis</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <!-- Hari Jumat -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Jumat</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <!-- Hari Sabtu -->
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Sabtu</h4>
                    <p>07:00 - 12:00</p>
                </div>
            </div>
        </div>

        <!-- Kontak Kami -->
        <div id="kontak-kami" class="background bg-gray-100 min-h-[70vh] grid place-items-center">
            <div class="bg-white shadow-lg rounded-lg px-6 py-8 border-t-4 border-b-8 border-blue-500 m-6 w-full max-w-4xl">
                <h3 class="text-3xl font-bold mb-4 text-center">Kontak Kami</h3>
                <ul class="space-y-4 text-lg">
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-blue-500 mr-2"></i>
                        Email: <a href="mailto:example@example.com" class="ml-2 text-blue-500 hover:underline">example@example.com</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fab fa-whatsapp text-blue-500 mr-2"></i>
                        No. WhatsApp: <a href="tel:123456789" class="ml-2 text-blue-500 hover:underline">123456789</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                        Alamat: <span class="ml-2">Jl.sambeng dk.lumpang Desa Sambeng, Kec. Bantarbolang, Kabupaten Pemalang, Jawa Tengah</span>
                    </li>
                </ul>
                <!-- Tampilkan peta di sini -->
                <div class="mt-6 flex justify-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.477569451014!2d109.3516551!3d-7.049691599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe948842ece57%3A0x26ea05417e1aaf60!2sBalai%20Desa%20Sambeng!5e0!3m2!1sen!2sid!4v1648921927380!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

<!-- Tambahkan link ke Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    </main>

    <footer class="bg-white shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/image/logo_sambeng.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Surat Sambeng</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a class="hover:underline">Zidane Programmer™</a>. All Rights Reserved.</span>
        </div>
    </footer>

    <script>
        function smoothScroll(target, offset) {
            const targetElement = document.querySelector(target);
            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = targetPosition - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }

        // Tambahkan event listener untuk setiap tautan navigasi kecuali "Masuk"
        document.querySelectorAll('nav a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah tindakan default dari tautan
                const targetId = this.getAttribute('href'); // Ambil id target dari atribut href
                smoothScroll(targetId, 80); // Panggil fungsi smoothScroll dengan id target dan offset 80px
            });
        });
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }

        // Menambahkan listener khusus untuk button-modal
        document.querySelectorAll('button.modal-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal-id');
                openModal(modalId);
            });
        });

        // Menambahkan listener khusus untuk button-pindah-halaman
        document.querySelectorAll('button.page-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var url = this.getAttribute('data-url');
                window.location.href = url;
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
        const button = document.querySelector('[data-collapse-toggle="navbar-sticky"]');
        const menu = document.getElementById('navbar-sticky');

        button.addEventListener('click', function () {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !isExpanded);
            menu.classList.toggle('hidden');
        });
    });

    </script>
</body>

</html>
