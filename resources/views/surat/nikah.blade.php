<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('nikah.store') }}" enctype="multipart/form-data">
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

                    <!-- Agama -->
                    <div class="mb-4">
                        <label for="agama" class="block font-medium text-gray-700">Agama *</label>
                        <input type="text" id="agama" name="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('agama') }}">
                        @error('agama')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pekerjaan -->
                    <div class="mb-4">
                        <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan') }}">
                        @error('pekerjaan')
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

                    <!-- Nomor KK -->
                    <div class="mb-4">
                        <label for="nomor_kk" class="block font-medium text-gray-700">Nomor KK *</label>
                        <input type="text" id="nomor_kk" name="nomor_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nomor_kk') }}">
                        @error('nomor_kk')
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

                    <!-- Foto KTP -->
                    <div class="mb-4">
                        <label for="foto_ktp" class="block font-medium text-gray-700">Foto KTP *</label>
                        <input type="file" id="foto_ktp" name="foto_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('foto_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Surat Pernyataan -->
                    <div class="mb-4">
                        <label for="surat_pernyataan" class="block font-medium text-gray-700">Surat Pernyataan Belum Pernah Menikah *</label>
                        <input type="file" id="surat_pernyataan" name="surat_pernyataan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('surat_pernyataan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Download Template -->
                    <div class="mb-4">
                        <a href="{{ route('download.template.surat.pernyataan') }}" class="block bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md text-center">Download Template Surat Pernyataan</a>
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
