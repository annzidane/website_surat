<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('kematian.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Bin / Binti -->
                <div class="mb-4">
                    <label for="bin_binti" class="block font-medium text-gray-700">Bin / Binti *</label>
                    <input type="text" id="bin_binti" name="bin_binti" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- NIK -->
                <div class="mb-4">
                    <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                    <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Jenis Kelamin *</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" disabled selected>-- PILIH JENIS KELAMIN --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-4">
                    <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Status Pernikahan -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Status Pernikahan *</label>
                    <select id="status_pernikahan" name="status_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" disabled selected>-- PILIH STATUS PERNIKAHAN --</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Duda">Duda</option>
                        <option value="Janda">Janda</option>
                    </select>
                </div>

                <!-- Pekerjaan -->
                <div class="mb-4">
                    <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                    <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <!-- Tanggal Meninggal -->
                <div class="mb-4">
                    <label for="tanggal_meninggal" class="block font-medium text-gray-700">Tanggal Meninggal *</label>
                    <input type="date" id="tanggal_meninggal" name="tanggal_meninggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Jam Meninggal -->
                <div class="mb-4">
                    <label for="jam_meninggal" class="block font-medium text-gray-700">Jam *</label>
                    <input type="time" id="jam_meninggal" name="jam_meninggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Tempat Meninggal -->
                <div class="mb-4">
                    <label for="tempat_meninggal" class="block font-medium text-gray-700">Tempat Meninggal *</label>
                    <input type="text" id="tempat_meninggal" name="tempat_meninggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Sebab Meninggal -->
                <div class="mb-4">
                    <label for="sebab_meninggal" class="block font-medium text-gray-700">Sebab Meninggal *</label>
                    <input type="text" id="sebab_meninggal" name="sebab_meninggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Berkas Persyaratan -->
                <div class="mb-4">
                    <label for="berkas_persyaratan" class="block font-medium text-gray-700">Berkas Persyaratan *</label>
                    <input type="file" id="berkas_persyaratan" name="berkas_persyaratan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- Submit Button -->
                <div class="mt-4 flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
