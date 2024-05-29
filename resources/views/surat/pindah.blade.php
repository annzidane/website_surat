<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('pindah.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Data Daerah Asal -->
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Data Daerah Asal</h2>
                        <div class="mb-4">
                            <!-- Nomor Kartu Keluarga -->
                            <label for="nomor_kk" class="block font-medium text-gray-700">Nomor Kartu Keluarga *</label>
                            <input type="text" id="nomor_kk" name="nomor_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            <input type="text" id="nik_pemohon" name="nik_pemohon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            <input type="text" id="nomor_kk_tujuan" name="nomor_kk_tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nomor_kk_tujuan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- NIK Kepala Keluarga -->
                        <div class="mb-4">
                            <label for="nik_kepala_keluarga_tujuan" class="block font-medium text-gray-700">NIK Kepala Keluarga *</label>
                            <input type="text" id="nik_kepala_keluarga_tujuan" name="nik_kepala_keluarga_tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            <input type="text" id="nik_keluarga_datang" name="nik_keluarga_datang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            <label for="masa_berlaku_ktp" class="block font-medium text-gray-700">Masa Berlaku KTP</label>
                            <input type="date" id="masa_berlaku_ktp" name="masa_berlaku_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                            <input type="text" id="nik_keluarga_datang2" name="nik_keluarga_datang2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
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
                            <input type="text" id="nik_keluarga_datang3" name="nik_keluarga_datang3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
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
                            <input type="text" id="nik_keluarga_datang4" name="nik_keluarga_datang4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
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
                            <input type="text" id="nik_keluarga_datang5" name="nik_keluarga_datang5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
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
                            <input type="text" id="nik_keluarga_datang6" name="nik_keluarga_datang6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
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

                <!-- Submit Button -->
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
