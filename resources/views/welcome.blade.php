<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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
        <div id="desa-sambeng" class="background min-h-[70vh] grid place-items-center text-gray-900 bg-blue-500 ">
            <section>
                <h2 class="text-3xl mb-4">KANTOR KELURAHAN DESA SAMBENG</h2>
                <p class="text-lg">Selamat Datang di KANTOR KELURAHAN DESA SAMBENG</p>
                <a href="/login" class="text-black-500">Masuk</a> <!-- Mengganti "Login" menjadi "Masuk" -->
            </section>
        </div>

        <!-- Container untuk layanan surat -->
        <div id="layanan-surat" class="background min-h-[70vh] grid place-items-center bg-gray-100">
            <h3 class="text-xl font-bold mb-4">Layanan Surat</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">
                    <svg class="w-10 h-10 text-blue-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4M8 12H4m6 4h8m-8 0a4 4 0 010-8h8a4 4 0 110 8h-8zM16 12H8M8 12a4 4 0 100-8h8a4 4 0 100-8H8a4 4 0 000 8h8z" />
                    </svg>
                    <h4 class="text-lg font-bold mb-2">Surat Keterangan Kelahiran</h4>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mb-2">Lihat Persyaratan</button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Buat Surat</button>
                </div>
                <!-- Add more containers for other types of documents -->
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">
                    <svg class="w-10 h-10 text-blue-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h4 class="text-lg font-bold mb-2">Surat Keterangan Kematian</h4>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mb-2">Lihat Persyaratan</button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Buat Surat</button>
                </div>
            </div>
        </div>

        <!-- Prosedur pengajuan surat -->
        <div id="prosedur-pengajuan-surat" class="background min-h-[70vh] grid place-items-center bg-gray-200">
            <h3 class="text-xl font-bold mb-4">Prosedur Pengajuan Surat</h3>
            <div class="max-w-screen-md mx-auto p-4 bg-white dark:bg-white rounded-lg shadow-md">
                <ol class="list-decimal list-inside space-y-4 text-left">
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
            <h3 class="text-xl font-bold mb-4">Jadwal Pelayanan</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Senin</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Selasa</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25A8.259 8.259 0 0 1 12 20.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Rabu</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Kamis</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1.75A10.25 10.25 0 1 0 22.25 12 10.262 10.262 0 0 0 12 1.75zm0 18.5a8.25 8.25 0 1 1 8.25-8.25 8.26 8.26 0 0 1-8.25 8.25zm0-12.5a.75.75 0 0 1 .75.75v4.75h3.5a.75.75 0 0 1 0 1.5h-4.25a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 .75-.75z"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Jumat</h4>
                    <p>07:00 - 12:00</p>
                </div>
                <div class="p-4 bg-white dark:bg-white rounded-lg shadow-md">
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
            <div class="max-w-screen-md mx-auto p-4 bg-white dark:bg-gray-000 rounded-lg shadow-md mb-6 mt-6">
            <h3 class="text-xl font-bold mb-4 text-center">Kontak Kami</h3>
            <ul>
                <li>Email: example@example.com</li>
                <li>No. WhatsApp: 123456789</li>
                <li>Alamat: Jl. Contoh No. 123, Desa Sambeng</li>
            </ul>
            <!-- Tampilkan peta di sini -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.477569451014!2d109.3516551!3d-7.049691599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe948842ece57%3A0x26ea05417e1aaf60!2sBalai%20Desa%20Sambeng!5e0!3m2!1sen!2sid!4v1648921927380!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>
        </div>
    </main>

    <footer class="bg-white shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
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
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
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
    </script>
</body>

</html>
