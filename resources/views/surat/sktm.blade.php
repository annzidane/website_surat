<x-app-layout>
    <!-- Form Pengajuan SKTM -->
    <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white mt-14">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Keterangan Tidak Mampu</h2>
            <form method="POST" action="{{ route('sktm.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Susunan Kolom Kanan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Kolom Kiri -->
                    <div>

                        <!-- Data Pemohon -->
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Data Pemohon</h2>
                            <!-- Nama -->
                            <div class="mb-4">
                                <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                                <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- NIK -->
                            <div class="mb-4">
                                <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
                                <!-- Pattern attribute ensures only 16 digits are entered -->
                            </div>
                            <!-- Tempat Lahir -->
                            <div class="mb-4">
                                <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Tanggal Lahir -->
                            <div class="mb-4">
                                <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Jenis Kelamin -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Jenis Kelamin *</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <!-- Pekerjaan -->
                            <div class="mb-4">
                                <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Alamat -->
                            <div class="mb-4">
                                <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                                <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div>

                        <!-- Data Orang Tua -->
                        <div>
                            <h2 class="text-lg font-semibold mb-4">Data Orang Tua</h2>
                            <!-- Nama Orang Tua -->
                            <div class="mb-4">
                                <label for="nama_orang_tua" class="block font-medium text-gray-700">Nama Orang Tua *</label>
                                <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- NIK Orang Tua -->
                            <div class="mb-4">
                                <label for="nik_orang_tua" class="block font-medium text-gray-700">NIK Orang Tua *</label>
                                <input type="text" id="nik_orang_tua" name="nik_orang_tua" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
                                <!-- Pattern attribute ensures only 16 digits are entered -->
                            </div>
                            <!-- Pekerjaan Orang Tua -->
                            <div class="mb-4">
                                <label for="pekerjaan_orang_tua" class="block font-medium text-gray-700">Pekerjaan Orang Tua *</label>
                                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Umur Orang Tua -->
                            <div class="mb-4">
                                <label for="umur_orang_tua" class="block font-medium text-gray-700">Umur Orang Tua *</label>
                                <input type="number" id="umur_orang_tua" name="umur_orang_tua" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Alamat Orang Tua -->
                            <div class="mb-4">
                                <label for="alamat_orang_tua" class="block font-medium text-gray-700">Alamat Orang Tua *</label>
                                <textarea id="alamat_orang_tua" name="alamat_orang_tua" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Keperluan -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4">Keperluan</h2>
                    <!-- Keperluan -->
                    <div class="mb-4">
                        <label for="keperluan" class="block font-medium text-gray-700">Keperluan *</label>
                        <input type="text" id="keperluan" name="keperluan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>
                </div>

                <!-- Berkas KTP -->
                <div class="mb-4">
                    <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas KTP *</label>
                    <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('berkas_ktp')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Berkas KK -->
                <div class="mb-4">
                    <label for="berkas_kk" class="block font-medium text-gray-700">Berkas KK *</label>
                    <input type="file" id="berkas_kk" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('berkas_kk')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Berkas Pengantar RT -->
                <div class="mb-4">
                    <label for="berkas_pengantar_rt" class="block font-medium text-gray-700">Berkas Pengantar RT *</label>
                    <input type="file" id="berkas_pengantar_rt" name="berkas_pengantar_rt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('berkas_pengantar_rt')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Verifikasi -->
                <div class="mt-8 flex justify-center">
                    <button type="button" onclick="verifyData()" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>

        <!-- Modal -->
        <div id="verificationModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">
                            Verifikasi Data
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Periksa kembali data yang telah Anda masukkan:</p>
                            <ul class="mt-2 list-disc list-inside text-gray-700">
                                <!-- Tambahkan ID untuk setiap elemen untuk mengisi data saat modal dibuka -->
                                <li id="modalNama"></li>
                                <li id="modalNIK"></li>
                                <li id="modalTempatLahir"></li>
                                <li id="modalTanggalLahir"></li>
                                <li id="modalJenisKelamin"></li>
                                <li id="modalPekerjaan"></li>
                                <li id="modalAlamat"></li>
                                <li id="modalNamaOrangTua"></li>
                                <li id="modalNIKOrangTua"></li>
                                <li id="modalPekerjaanOrangTua"></li>
                                <li id="modalUmurOrangTua"></li>
                                <li id="modalAlamatOrangTua"></li>
                                <li id="modalKeperluan"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <!-- Ganti fungsi tombol "Submit" untuk mengirimkan formulir setelah verifikasi -->
                        <button type="submit" onclick="submitForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Submit
                        </button>
                        <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function verifyData() {
                // Ambil data dari formulir SKTM
                const nama = document.getElementById('nama').value;
                const nik = document.getElementById('nik').value;
                const tempat_lahir = document.getElementById('tempat_lahir').value;
                const tanggal_lahir = document.getElementById('tanggal_lahir').value;
                const jenis_kelamin = document.getElementById('jenis_kelamin').value;
                const pekerjaan = document.getElementById('pekerjaan').value;
                const alamat = document.getElementById('alamat').value;
                const nama_orang_tua = document.getElementById('nama_orang_tua').value;
                const nik_orang_tua = document.getElementById('nik_orang_tua').value;
                const pekerjaan_orang_tua = document.getElementById('pekerjaan_orang_tua').value;
                const umur_orang_tua = document.getElementById('umur_orang_tua').value;
                const alamat_orang_tua = document.getElementById('alamat_orang_tua').value;
                const keperluan = document.getElementById('keperluan').value;

                // Tampilkan data dalam modal
                document.getElementById('modalNama').textContent = 'Nama: ' + nama;
                document.getElementById('modalNIK').textContent = 'NIK: ' + nik;
                document.getElementById('modalTempatLahir').textContent = 'Tempat Lahir: ' + tempat_lahir;
                document.getElementById('modalTanggalLahir').textContent = 'Tanggal Lahir: ' + tanggal_lahir;
                document.getElementById('modalJenisKelamin').textContent = 'Jenis Kelamin: ' + jenis_kelamin;
                document.getElementById('modalPekerjaan').textContent = 'Pekerjaan: ' + pekerjaan;
                document.getElementById('modalAlamat').textContent = 'Alamat: ' + alamat;
                document.getElementById('modalNamaOrangTua').textContent = 'Nama Orang Tua: ' + nama_orang_tua;
                document.getElementById('modalNIKOrangTua').textContent = 'NIK Orang Tua: ' + nik_orang_tua;
                document.getElementById('modalPekerjaanOrangTua').textContent = 'Pekerjaan Orang Tua: ' + pekerjaan_orang_tua;
                document.getElementById('modalUmurOrangTua').textContent = 'Umur Orang Tua: ' + umur_orang_tua;
                document.getElementById('modalAlamatOrangTua').textContent = 'Alamat Orang Tua: ' + alamat_orang_tua;
                document.getElementById('modalKeperluan').textContent = 'Keperluan: ' + keperluan;

                // Tampilkan modal
                document.getElementById('verificationModal').classList.remove('hidden');
            }

            function closeModal() {
                // Sembunyikan modal
                document.getElementById('verificationModal').classList.add('hidden');
            }

            function submitForm() {
                // Tambahkan fungsi untuk mengirimkan formulir SKTM
                document.getElementById('sktmForm').submit();
            }
        </script>
</x-app-layout>

