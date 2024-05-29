<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('kematian.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Section for Deceased Information -->
                <div>
                    <h2 class="text-lg font-bold mb-4 text-center">Informasi Orang yang Meninggal</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama -->
                        <div class="mb-4">
                            <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Bin / Binti -->
                        <div class="mb-4">
                            <label for="bin_binti" class="block font-medium text-gray-700">Bin / Binti *</label>
                            <input type="text" id="bin_binti" name="bin_binti" value="{{ old('bin_binti') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('bin_binti')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIK -->
                        <div class="mb-4">
                            <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                            <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
                            @error('nik')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700">Jenis Kelamin *</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="" disabled selected>-- PILIH JENIS KELAMIN --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="mb-4">
                            <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tempat_lahir')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_lahir')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                         <!-- Status Pernikahan -->
                         <div class="mb-4">
                            <label class="block font-medium text-gray-700">Status Pernikahan *</label>
                            <select id="status_pernikahan" name="status_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="" disabled selected>-- PILIH STATUS PERNIKAHAN --</option>
                                <option value="Belum Menikah" {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                <option value="Menikah" {{ old('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Cerai Mati" {{ old('status_pernikahan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                <option value="Cerai Hidup" {{ old('status_pernikahan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            </select>
                            @error('status_pernikahan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pekerjaan -->
                        <div class="mb-4">
                            <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('pekerjaan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Meninggal -->
                        <div class="mb-4">
                            <label for="tanggal_meninggal" class="block font-medium text-gray-700">Tanggal Meninggal *</label>
                            <input type="date" id="tanggal_meninggal" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jam Meninggal -->
                        <div class="mb-4">
                            <label for="jam_meninggal" class="block font-medium text-gray-700">Jam *</label>
                            <input type="time" id="jam_meninggal" name="jam_meninggal" value="{{ old('jam_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('jam_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tempat Meninggal -->
                        <div class="mb-4">
                            <label for="tempat_meninggal" class="block font-medium text-gray-700">Tempat Meninggal *</label>
                            <input type="text" id="tempat_meninggal" name="tempat_meninggal" value="{{ old('tempat_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tempat_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sebab Meninggal -->
                        <div class="mb-4">
                            <label for="sebab_meninggal" class="block font-medium text-gray-700">Sebab Meninggal *</label>
                            <input type="text" id="sebab_meninggal" name="sebab_meninggal" value="{{ old('sebab_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('sebab_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Umur -->
                        <div class="mb-4">
                            <label for="umur" class="block font-medium text-gray-700">Umur *</label>
                            <input type="number" id="umur" name="umur" value="{{ old('umur') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('umur')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Agama -->
                        <div class="mb-4">
                            <label for="agama" class="block font-medium text-gray-700">Agama *</label>
                            <select id="agama" name="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="" disabled selected>-- PILIH AGAMA --</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('agama')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Berkas Persyaratan ktp-->
                        <div class="mb-4">
                            <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas Persyaratan KTP*</label>
                            <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('berkas_ktp')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas Persyaratan kk-->
                        <div class="mb-4">
                            <label for="berkas_kk" class="block font-medium text-gray-700">Berkas Persyaratan KK*</label>
                            <input type="file" id="berkas_kk" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('berkas_ktp')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Berkas Persyaratan Surat Kematian -->
                        <div class="mb-4">
                            <label for="berkas_surat_kematian" class="block font-medium text-gray-700">
                                Berkas Persyaratan (Surat Keterangan RT/RW atau Surat Keterangan Dokter)
                            </label>
                            <input type="file" id="berkas_surat_kematian" name="berkas_surat_kematian"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_surat_kematian')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold mb-4 text-center">Informasi Pelapor</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Lengkap Pelapor -->
                    <div class="mb-4">
                        <label for="nama_pelapor" class="block font-medium text-gray-700">Nama Lengkap Pelapor *</label>
                        <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('nama_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK Pelapor -->
                    <div class="mb-4">
                        <label for="nik_pelapor" class="block font-medium text-gray-700">NIK Pelapor *</label>
                        <input type="text" id="nik_pelapor" name="nik_pelapor" value="{{ old('nik_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('nik_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir Pelapor -->
                    <div class="mb-4">
                        <label for="tanggal_lahir_pelapor" class="block font-medium text-gray-700">Tanggal Lahir Pelapor *</label>
                        <input type="date" id="tanggal_lahir_pelapor" name="tanggal_lahir_pelapor" value="{{ old('tanggal_lahir_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('tanggal_lahir_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pekerjaan Pelapor -->
                    <div class="mb-4">
                        <label for="pekerjaan_pelapor" class="block font-medium text-gray-700">Pekerjaan Pelapor *</label>
                        <input type="text" id="pekerjaan_pelapor" name="pekerjaan_pelapor" value="{{ old('pekerjaan_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('pekerjaan_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat Pelapor -->
                    <div class="mb-4">
                        <label for="alamat_pelapor" class="block font-medium text-gray-700">Alamat Pelapor *</label>
                        <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat_pelapor') }}</textarea>
                        @error('alamat_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Hubungan Pelapor -->
                    <div class="mb-4">
                        <label for="hubungan_pelapor" class="block font-medium text-gray-700">Hubungan Pelapor *</label>
                        <input type="text" id="hubungan_pelapor" name="hubungan_pelapor" value="{{ old('hubungan_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('hubungan_pelapor')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
