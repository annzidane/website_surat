<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('domisili.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                        <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama') }}">
                        @error('nama')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="mb-4">
                        <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="mb-4">
                        <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                        <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik') }}" maxlength="16" pattern="\d{16}" required>
                        <span id="nikError" class="text-red-600"></span>
                        @error('nik')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Jenis Kelamin *</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- PILIH JENIS KELAMIN --</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Kewarganegaraan -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Kewarganegaraan *</label>
                        <select id="kewarganegaraan" name="kewarganegaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- PILIH KEWARGANEGARAAN --</option>
                            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                        @error('kewarganegaraan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Status Pernikahan *</label>
                        <select id="status_pernikahan" name="status_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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

                    <!-- Alamat KTP -->
                    <div class="mb-4">
                        <label for="alamat_ktp" class="block font-medium text-gray-700">Alamat KTP *</label>
                        <textarea id="alamat_ktp" name="alamat_ktp" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_ktp') }}</textarea>
                        @error('alamat_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas KTP -->
                    <div class="mb-4">
                        <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas KTP *</label>
                        <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('berkas_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas Pengantar RT -->
                    <div class="mb-4">
                        <label for="berkas_pengantar_RT" class="block font-medium text-gray-700">Berkas Pengantar RT *</label>
                        <input type="file" id="berkas_pengantar_RT" name="berkas_pengantar_RT" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('berkas_pengantar_RT')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    </div> <!-- End grid-cols-2 -->

                    <!-- Submit Button -->
                    <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

