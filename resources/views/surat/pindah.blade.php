<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-white">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Permohonan Pindah</h2>
            <form id="pindahForm" method="POST" action="{{ route('pindah.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Data Daerah Asal -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Data Daerah Asal</h2>
                        <div class="mb-4">
                            <!-- Nomor Kartu Keluarga -->
                            <label for="nomor_kk" class="block font-medium text-gray-700">Nomor Kartu Keluarga *</label>
                            <input type="text" id="nomor_kk" name="nomor_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" required pattern="\d{16}" title="Nomor KK harus terdiri dari 16 angka">
                            @error('nomor_kk')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama Kepala Keluarga -->
                        <div class="mb-4">
                            <label for="nama_kepala_keluarga" class="block font-medium text-gray-700">Nama Kepala Keluarga *</label>
                            <input type="text" id="nama_kepala_keluarga" name="nama_kepala_keluarga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama_kepala_keluarga')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                            <p class="text-sm text-gray-500">Mohon diisi dengan alamat lengkap dari nama jalan, RT/RW, desa sampai provinsi.</p>
                            @error('alamat')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Kode Pos -->
                        <div class="mb-4">
                            <label for="kode_pos" class="block font-medium text-gray-700">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('kode_pos')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Telepon -->
                        <div class="mb-4">
                            <label for="telepon" class="block font-medium text-gray-700">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('telepon')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- NIK Pemohon -->
                        <div class="mb-4">
                            <label for="nik_pemohon" class="block font-medium text-gray-700">NIK Pemohon *</label>
                            <input type="text" id="nik_pemohon" name="nik_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}" required>
                            @error('nik_pemohon')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama Lengkap Pemohon -->
                        <div class="mb-4">
                            <label for="nama_lengkap_pemohon" class="block font-medium text-gray-700">Nama Lengkap Pemohon *</label>
                            <input type="text" id="nama_lengkap_pemohon" name="nama_lengkap_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama_lengkap_pemohon')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Data Daerah Tujuan -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Data Daerah Tujuan</h2>
                        <!-- Status KK -->
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Status KK *</label>
                            <select id="status_kk" name="status_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="" disabled selected>-- PILIH STATUS KK --</option>
                                <option value="Numpang KK">Numpang KK</option>
                                <option value="Membuat KK Baru">Membuat KK Baru</option>
                                <option value="Nomor KK Tetap">Nomor KK Tetap</option>
                            </select>
                            @error('status_kk')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nomor Kartu Keluarga -->
                        <div class="mb-4">
                            <label for="nomor_kk_tujuan" class="block font-medium text-gray-700">Nomor Kartu Keluarga *</label>
                            <input type="text" id="nomor_kk_tujuan" name="nomor_kk_tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}" required>
                            @error('nomor_kk_tujuan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- NIK Kepala Keluarga -->
                        <div class="mb-4">
                            <label for="nik_kepala_keluarga_tujuan" class="block font-medium text-gray-700">NIK Kepala Keluarga *</label>
                            <input type="text" id="nik_kepala_keluarga_tujuan" name="nik_kepala_keluarga_tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}" required>
                            @error('nik_kepala_keluarga_tujuan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama Kepala Keluarga -->
                        <div class="mb-4">
                            <label for="nama_kepala_keluarga_tujuan" class="block font-medium text-gray-700">Nama Kepala Keluarga *</label>
                            <input type="text" id="nama_kepala_keluarga_tujuan" name="nama_kepala_keluarga_tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama_kepala_keluarga_tujuan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Tanggal Kedatangan -->
                        <div class="mb-4">
                            <label for="tanggal_kedatangan" class="block font-medium text-gray-700">Tanggal Kedatangan *</label>
                            <input type="date" id="tanggal_kedatangan" name="tanggal_kedatangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_kedatangan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat_tujuan" class="block font-medium text-gray-700">Alamat *</label>
                            <textarea id="alamat_tujuan" name="alamat_tujuan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                            <p class="text-sm text-gray-500">Mohon diisi dengan alamat lengkap dari nama jalan, RT/RW, desa sampai provinsi.</p>
                            @error('alamat_tujuan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Keluarga yang Datang -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Anggota Keluarga 1 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 1</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang" class="block font-medium text-gray-700">NIK *</label>
                            <input type="text" id="nik_keluarga_datang" name="nik_keluarga_datang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}" required>
                            @error('nik_keluarga_datang')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang" class="block font-medium text-gray-700">Nama *</label>
                            <input type="text" id="nama_keluarga_datang" name="nama_keluarga_datang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama_keluarga_datang')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp" class="block font-medium text-gray-700">Masa Berlaku KTP *</label>
                            <input type="date" id="masa_berlaku_ktp" name="masa_berlaku_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('masa_berlaku_ktp')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">
                            <label for="shdk" class="block font-medium text-gray-700">SHDK *</label>
                            <select id="shdk" name="shdk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Menantu">Menantu</option>
                                <option value="Cucu">Cucu</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Mertua">Mertua</option>
                                <option value="Famili Lain">Famili Lain</option>
                                <option value="Pembantu">Pembantu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('shdk')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas KTP *</label>
                            <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('berkas_ktp')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Anggota Keluarga 2 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 2</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang2" class="block font-medium text-gray-700">NIK </label>
                            <input type="text" id="nik_keluarga_datang2" name="nik_keluarga_datang2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}">
                            @error('nik_keluarga_datang2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang2" class="block font-medium text-gray-700">Nama </label>
                            <input type="text" id="nama_keluarga_datang2" name="nama_keluarga_datang2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                            @error('nama_keluarga_datang2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp2" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp2" name="masa_berlaku_ktp2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('masa_berlaku_ktp2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">
                            <label for="shdk2" class="block font-medium text-gray-700">SHDK </label>
                            <select id="shdk2" name="shdk2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="kepala keluarga">1. Kepala Keluarga</option>
                                <option value="suami">2. Suami</option>
                                <option value="istri">3. Istri</option>
                                <option value="anak">4. Anak</option>
                                <option value="menantu">5. Menantu</option>
                                <option value="cucu">6. Cucu</option>
                                <option value="orang tua">7. Orang Tua</option>
                                <option value="mertua">8. Mertua</option>
                                <option value="famili lainnya">9. Famili Lainnya</option>
                                <option value="pembantu">10. Pembantu</option>
                                <option value="lainnya">11. Lainnya</option>
                            </select>
                            @error('shdk2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp2" class="block font-medium text-gray-700">Berkas KTP</label>
                            <input type="file" id="berkas_ktp2" name="berkas_ktp2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_ktp2')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Pemisah atau Penanda -->
                <hr class="my-8 border-gray-400">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Anggota Keluarga 3 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 3</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang3" class="block font-medium text-gray-700">NIK </label>
                            <input type="text" id="nik_keluarga_datang3" name="nik_keluarga_datang3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}">
                            @error('nik_keluarga_datang3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang3" class="block font-medium text-gray-700">Nama </label>
                            <input type="text" id="nama_keluarga_datang3" name="nama_keluarga_datang3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                            @error('nama_keluarga_datang3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp3" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp3" name="masa_berlaku_ktp3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('masa_berlaku_ktp3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">
                            <label for="shdk3" class="block font-medium text-gray-700">SHDK </label>
                            <select id="shdk3" name="shdk3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="kepala keluarga">1. Kepala Keluarga</option>
                                <option value="suami">2. Suami</option>
                                <option value="istri">3. Istri</option>
                                <option value="anak">4. Anak</option>
                                <option value="menantu">5. Menantu</option>
                                <option value="cucu">6. Cucu</option>
                                <option value="orang tua">7. Orang Tua</option>
                                <option value="mertua">8. Mertua</option>
                                <option value="famili lainnya">9. Famili Lainnya</option>
                                <option value="pembantu">10. Pembantu</option>
                                <option value="lainnya">11. Lainnya</option>
                            </select>
                            @error('shdk3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp3" class="block font-medium text-gray-700">Berkas KTP</label>
                            <input type="file" id="berkas_ktp3" name="berkas_ktp3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_ktp3')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Anggota Keluarga 4 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 4</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang4" class="block font-medium text-gray-700">NIK </label>
                            <input type="text" id="nik_keluarga_datang4" name="nik_keluarga_datang4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}">
                            @error('nik_keluarga_datang4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang4" class="block font-medium text-gray-700">Nama </label>
                            <input type="text" id="nama_keluarga_datang4" name="nama_keluarga_datang4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                            @error('nama_keluarga_datang4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp4" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp4" name="masa_berlaku_ktp4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('masa_berlaku_ktp4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">
                            <label for="shdk4" class="block font-medium text-gray-700">SHDK </label>
                            <select id="shdk4" name="shdk4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="kepala keluarga">1. Kepala Keluarga</option>
                                <option value="suami">2. Suami</option>
                                <option value="istri">3. Istri</option>
                                <option value="anak">4. Anak</option>
                                <option value="menantu">5. Menantu</option>
                                <option value="cucu">6. Cucu</option>
                                <option value="orang tua">7. Orang Tua</option>
                                <option value="mertua">8. Mertua</option>
                                <option value="famili lainnya">9. Famili Lainnya</option>
                                <option value="pembantu">10. Pembantu</option>
                                <option value="lainnya">11. Lainnya</option>
                            </select>
                            @error('shdk4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp4" class="block font-medium text-gray-700">Berkas KTP</label>
                            <input type="file" id="berkas_ktp4" name="berkas_ktp4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_ktp4')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Pemisah atau Penanda -->
                <hr class="my-8 border-gray-400">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Anggota Keluarga 5 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 5</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang5" class="block font-medium text-gray-700">NIK </label>
                            <input type="text" id="nik_keluarga_datang5" name="nik_keluarga_datang5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}">
                            @error('nik_keluarga_datang5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang5" class="block font-medium text-gray-700">Nama </label>
                            <input type="text" id="nama_keluarga_datang5" name="nama_keluarga_datang5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                            @error('nama_keluarga_datang5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp5" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp5" name="masa_berlaku_ktp5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('masa_berlaku_ktp5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">
                            <label for="shdk5" class="block font-medium text-gray-700">SHDK </label>
                            <select id="shdk5" name="shdk5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="kepala keluarga">1. Kepala Keluarga</option>
                                <option value="suami">2. Suami</option>
                                <option value="istri">3. Istri</option>
                                <option value="anak">4. Anak</option>
                                <option value="menantu">5. Menantu</option>
                                <option value="cucu">6. Cucu</option>
                                <option value="orang tua">7. Orang Tua</option>
                                <option value="mertua">8. Mertua</option>
                                <option value="famili lainnya">9. Famili Lainnya</option>
                                <option value="pembantu">10. Pembantu</option>
                                <option value="lainnya">11. Lainnya</option>
                            </select>
                            @error('shdk5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp5" class="block font-medium text-gray-700">Berkas KTP</label>
                            <input type="file" id="berkas_ktp5" name="berkas_ktp5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_ktp5')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Anggota Keluarga 6 -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Anggota Keluarga 6</h2>
                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik_keluarga_datang6" class="block font-medium text-gray-700">NIK </label>
                            <input type="text" id="nik_keluarga_datang6" name="nik_keluarga_datang6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" pattern="\d{16}">
                            @error('nik_keluarga_datang6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama_keluarga_datang6" class="block font-medium text-gray-700">Nama </label>
                            <input type="text" id="nama_keluarga_datang6" name="nama_keluarga_datang6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                            @error('nama_keluarga_datang6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Masa Berlaku KTP -->
                        <div class="mb-4">
                            <label for="masa_berlaku_ktp6" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp6" name="masa_berlaku_ktp6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('masa_berlaku_ktp6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- SHDK -->
                        <div class="mb-4">                        
                            <label for="shdk6" class="block font-medium text-gray-700">SHDK </label>
                            <select id="shdk6" name="shdk6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
                                <option value="" disabled selected>-- Pilih SHDK --</option>
                                <option value="kepala keluarga">1. Kepala Keluarga</option>
                                <option value="suami">2. Suami</option>
                                <option value="istri">3. Istri</option>
                                <option value="anak">4. Anak</option>
                                <option value="menantu">5. Menantu</option>
                                <option value="cucu">6. Cucu</option>
                                <option value="orang tua">7. Orang Tua</option>
                                <option value="mertua">8. Mertua</option>
                                <option value="famili lainnya">9. Famili Lainnya</option>
                                <option value="pembantu">10. Pembantu</option>
                                <option value="lainnya">11. Lainnya</option>
                            </select>
                            @error('shdk6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas KTP -->
                        <div class="mb-4">
                            <label for="berkas_ktp6" class="block font-medium text-gray-700">Berkas KTP </label>
                            <input type="file" id="berkas_ktp6" name="berkas_ktp6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_ktp6')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Berkas KK dan PBB -->
                <div class="mb-4">
                    <label for="berkas_kk" class="block font-medium text-gray-700">Berkas KK *</label>
                    <input type="file" id="berkas_kk" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('berkas_kk')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="berkas_pbb" class="block font-medium text-gray-700">Berkas PBB *</label>
                    <input type="file" id="berkas_pbb" name="berkas_pbb" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('berkas_pbb')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Verifikasi -->
                <div class="mt-6 flex justify-center">
                    <button type="button" onclick="verifyData()" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600 focus:outline-none focus:shadow-outline transition duration-300">Submit</button>
                </div>
            </form>
        </div>
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
                    <div class="grid grid-cols-2 gap-4 mt-6 text-gray-700">
                        <div>
                            <h4 class="font-semibold">Data Pemohon</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNomorKK"></li>
                                <li id="modalNamaKepalaKeluarga"></li>
                                <li id="modalAlamat"></li>
                                <li id="modalKodePos"></li>
                                <li id="modalTelepon"></li>
                                <li id="modalNIKPemohon"></li>
                                <li id="modalNamaLengkapPemohon"></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold">Data Daerah Tujuan</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalStatusKK"></li>
                                <li id="modalNomorKKTujuan"></li>
                                <li id="modalNIKKepalaKeluargaTujuan"></li>
                                <li id="modalNamaKepalaKeluargaTujuan"></li>
                                <li id="modalTanggalKedatangan"></li>
                                <li id="modalAlamatTujuan"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-6 text-gray-700">
                        <div>
                            <h4 class="font-semibold">Anggota Keluarga yang Datang</h4>
                            <ul class="list-disc list-inside">
                                <!-- Data Keluarga yang Datang -->
                                <li id="modalNIKKeluargaDatang"></li>
                                <li id="modalNamaKeluargaDatang"></li>
                                <li id="modalMasaBerlakuKTP"></li>
                                <li id="modalSHDK"></li>
                                
                            </ul>
                            <h4 class="font-semibold mt-4">Anggota Keluarga Kedua</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNIKKeluargaDatang2"></li>
                                <li id="modalNamaKeluargaDatang2"></li>
                                <li id="modalMasaBerlakuKTP2"></li>
                                <li id="modalSHDK2"></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold">Anggota Keluarga Ketiga</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNIKKeluargaDatang3"></li>
                                <li id="modalNamaKeluargaDatang3"></li>
                                <li id="modalMasaBerlakuKTP3"></li>
                                <li id="modalSHDK3"></li>
                            </ul>
                            <h4 class="font-semibold mt-4">Anggota Keluarga Keempat</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNIKKeluargaDatang4"></li>
                                <li id="modalNamaKeluargaDatang4"></li>
                                <li id="modalMasaBerlakuKTP4"></li>
                                <li id="modalSHDK4"></li>
                            </ul>
                            <h4 class="font-semibold mt-4">Anggota Keluarga Kelima</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNIKKeluargaDatang5"></li>
                                <li id="modalNamaKeluargaDatang5"></li>
                                <li id="modalMasaBerlakuKTP5"></li>
                                <li id="modalSHDK5"></li>
                            </ul>
                            <h4 class="font-semibold mt-4">Anggota Keluarga Keenam</h4>
                            <ul class="list-disc list-inside">
                                <li id="modalNIKKeluargaDatang6"></li>
                                <li id="modalNamaKeluargaDatang6"></li>
                                <li id="modalMasaBerlakuKTP6"></li>
                                <li id="modalSHDK6"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="submitForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
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
        // Get form data
        const nomor_kk = document.getElementById('nomor_kk').value;
        const nama_kepala_keluarga = document.getElementById('nama_kepala_keluarga').value;
        const alamat = document.getElementById('alamat').value;
        const kode_pos = document.getElementById('kode_pos').value;
        const telepon = document.getElementById('telepon').value;
        const nik_pemohon = document.getElementById('nik_pemohon').value;
        const nama_lengkap_pemohon = document.getElementById('nama_lengkap_pemohon').value;
        const status_kk = document.getElementById('status_kk').value;
        const nomor_kk_tujuan = document.getElementById('nomor_kk_tujuan').value;
        const nik_kepala_keluarga_tujuan = document.getElementById('nik_kepala_keluarga_tujuan').value;
        const nama_kepala_keluarga_tujuan = document.getElementById('nama_kepala_keluarga_tujuan').value;
        const tanggal_kedatangan = document.getElementById('tanggal_kedatangan').value;
        const alamat_tujuan = document.getElementById('alamat_tujuan').value;
        
        const nik_keluarga_datang = document.getElementById('nik_keluarga_datang').value;
        const nama_keluarga_datang = document.getElementById('nama_keluarga_datang').value;
        const masa_berlaku_ktp = document.getElementById('masa_berlaku_ktp').value;
        const shdk = document.getElementById('shdk').value;
       

        const nik_keluarga_datang2 = document.getElementById('nik_keluarga_datang2').value;
        const nama_keluarga_datang2 = document.getElementById('nama_keluarga_datang2').value;
        const masa_berlaku_ktp2 = document.getElementById('masa_berlaku_ktp2').value;
        const shdk2 = document.getElementById('shdk2').value;
        

        const nik_keluarga_datang3 = document.getElementById('nik_keluarga_datang3').value;
        const nama_keluarga_datang3 = document.getElementById('nama_keluarga_datang3').value;
        const masa_berlaku_ktp3 = document.getElementById('masa_berlaku_ktp3').value;
        const shdk3 = document.getElementById('shdk3').value;
        

        const nik_keluarga_datang4 = document.getElementById('nik_keluarga_datang4').value;
        const nama_keluarga_datang4 = document.getElementById('nama_keluarga_datang4').value;
        const masa_berlaku_ktp4 = document.getElementById('masa_berlaku_ktp4').value;
        const shdk4 = document.getElementById('shdk4').value;
        

        const nik_keluarga_datang5 = document.getElementById('nik_keluarga_datang5').value;
        const nama_keluarga_datang5 = document.getElementById('nama_keluarga_datang5').value;
        const masa_berlaku_ktp5 = document.getElementById('masa_berlaku_ktp5').value;
        const shdk5 = document.getElementById('shdk5').value;
        

        const nik_keluarga_datang6 = document.getElementById('nik_keluarga_datang6').value;
        const nama_keluarga_datang6 = document.getElementById('nama_keluarga_datang6').value;
        const masa_berlaku_ktp6 = document.getElementById('masa_berlaku_ktp6').value;
        const shdk6 = document.getElementById('shdk6').value;
        

        // Display data in modal
        document.getElementById('modalNomorKK').textContent = 'Nomor KK: ' + nomor_kk;
        document.getElementById('modalNamaKepalaKeluarga').textContent = 'Nama Kepala Keluarga: ' + nama_kepala_keluarga;
        document.getElementById('modalAlamat').textContent = 'Alamat: ' + alamat;
        document.getElementById('modalKodePos').textContent = 'Kode Pos: ' + kode_pos;
        document.getElementById('modalTelepon').textContent = 'Telepon: ' + telepon;
        document.getElementById('modalNIKPemohon').textContent = 'NIK Pemohon: ' + nik_pemohon;
        document.getElementById('modalNamaLengkapPemohon').textContent = 'Nama Lengkap Pemohon: ' + nama_lengkap_pemohon;
        document.getElementById('modalStatusKK').textContent = 'Status KK: ' + status_kk;
        document.getElementById('modalNomorKKTujuan').textContent = 'Nomor KK Tujuan: ' + nomor_kk_tujuan;
        document.getElementById('modalNIKKepalaKeluargaTujuan').textContent = 'NIK Kepala Keluarga Tujuan: ' + nik_kepala_keluarga_tujuan;
        document.getElementById('modalNamaKepalaKeluargaTujuan').textContent = 'Nama Kepala Keluarga Tujuan: ' + nama_kepala_keluarga_tujuan;
        document.getElementById('modalTanggalKedatangan').textContent = 'Tanggal Kedatangan: ' + tanggal_kedatangan;
        document.getElementById('modalAlamatTujuan').textContent = 'Alamat Tujuan: ' + alamat_tujuan;

        document.getElementById('modalNIKKeluargaDatang').textContent = 'NIK Keluarga Datang: ' + nik_keluarga_datang;
        document.getElementById('modalNamaKeluargaDatang').textContent = 'Nama Keluarga Datang: ' + nama_keluarga_datang;
        document.getElementById('modalMasaBerlakuKTP').textContent = 'Masa Berlaku KTP: ' + masa_berlaku_ktp;
        document.getElementById('modalSHDK').textContent = 'SHDK: ' + shdk;
        

        document.getElementById('modalNIKKeluargaDatang2').textContent = 'NIK Keluarga Datang 2: ' + nik_keluarga_datang2;
        document.getElementById('modalNamaKeluargaDatang2').textContent = 'Nama Keluarga Datang 2: ' + nama_keluarga_datang2;
        document.getElementById('modalMasaBerlakuKTP2').textContent = 'Masa Berlaku KTP 2: ' + masa_berlaku_ktp2;
        document.getElementById('modalSHDK2').textContent = 'SHDK 2: ' + shdk2;
        

        document.getElementById('modalNIKKeluargaDatang3').textContent = 'NIK Keluarga Datang 3: ' + nik_keluarga_datang3;
        document.getElementById('modalNamaKeluargaDatang3').textContent = 'Nama Keluarga Datang 3: ' + nama_keluarga_datang3;
        document.getElementById('modalMasaBerlakuKTP3').textContent = 'Masa Berlaku KTP 3: ' + masa_berlaku_ktp3;
        document.getElementById('modalSHDK3').textContent = 'SHDK 3: ' + shdk3;
        

        document.getElementById('modalNIKKeluargaDatang4').textContent = 'NIK Keluarga Datang 4: ' + nik_keluarga_datang4;
        document.getElementById('modalNamaKeluargaDatang4').textContent = 'Nama Keluarga Datang 4: ' + nama_keluarga_datang4;
        document.getElementById('modalMasaBerlakuKTP4').textContent = 'Masa Berlaku KTP 4: ' + masa_berlaku_ktp4;
        document.getElementById('modalSHDK4').textContent = 'SHDK 4: ' + shdk4;
        

        document.getElementById('modalNIKKeluargaDatang5').textContent = 'NIK Keluarga Datang 5: ' + nik_keluarga_datang5;
        document.getElementById('modalNamaKeluargaDatang5').textContent = 'Nama Keluarga Datang 5: ' + nama_keluarga_datang5;
        document.getElementById('modalMasaBerlakuKTP5').textContent = 'Masa Berlaku KTP 5: ' + masa_berlaku_ktp5;
        document.getElementById('modalSHDK5').textContent = 'SHDK 5: ' + shdk5;
        

        document.getElementById('modalNIKKeluargaDatang6').textContent = 'NIK Keluarga Datang 6: ' + nik_keluarga_datang6;
        document.getElementById('modalNamaKeluargaDatang6').textContent = 'Nama Keluarga Datang 6: ' + nama_keluarga_datang6;
        document.getElementById('modalMasaBerlakuKTP6').textContent = 'Masa Berlaku KTP 6: ' + masa_berlaku_ktp6;
        document.getElementById('modalSHDK6').textContent = 'SHDK 6: ' + shdk6;
        

        // Show modal
        document.getElementById('verificationModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('verificationModal').classList.add('hidden');
    }

    function submitForm() {
        document.getElementById('pindahForm').submit();
    }
</script>
</x-app-layout>
