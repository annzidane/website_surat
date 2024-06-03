<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('usaha.store') }}" enctype="multipart/form-data">
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

                    <!-- NIK -->
                    <div class="mb-4">
                        <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                        <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik') }}">
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

                    <!-- Status Pernikahan -->
                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Status Pernikahan *</label>
                        <select id="status_pernikahan" name="status_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- PILIH STATUS PERNIKAHAN --</option>
                            <option value="Belum Menikah" {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Menikah" {{ old('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Duda" {{ old('status_pernikahan') == 'Duda' ? 'selected' : '' }}>Duda</option>
                            <option value="Janda" {{ old('status_pernikahan') == 'Janda' ? 'selected' : '' }}>Janda</option>
                        </select>
                        @error('status_pernikahan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                        <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Usaha -->
                    <div class="mb-4">
                        <label for="usaha" class="block font-medium text-gray-700">Usaha *</label>
                        <input type="text" id="usaha" name="usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('usaha') }}">
                        @error('usaha')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <label for="lokasi" class="block font-medium text-gray-700">Lokasi *</label>
                        <input type="text" id="lokasi" name="lokasi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('lokasi') }}">
                        @error('lokasi')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lama Usaha -->
                    <div class="mb-4">
                        <label for="lama_usaha" class="block font-medium text-gray-700">Lama Usaha *</label>
                        <input type="text" id="lama_usaha" name="lama_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('lama_usaha') }}">
                        @error('lama_usaha')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas Persyaratan -->
                    <div class="mb-4">
                        <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas KTP *</label>
                        <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('berkas_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas Persyaratan -->
                    <div class="mb-4">
                        <label for="berkas_kk" class="block font-medium text-gray-700">Berkas KK *</label>
                        <input type="file" id="berkas_persyaratan" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('berkas_kk')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas Persyaratan -->
                    <div class="mb-4">
                        <label for="bukti_usaha" class="block font-medium text-gray-700">Berkas Bukti Usaha</label>
                        <input type="file" id="bukti_usaha" name="bukti_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('bukti_usaha')
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