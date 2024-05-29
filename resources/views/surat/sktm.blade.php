<x-app-layout>
    <!-- Form Pengajuan SKTM -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
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
                                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
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
                                <input type="text" id="nik_orang_tua" name="nik_orang_tua" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
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

                <!-- Submit Button -->
                <div class="mt-8 flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

