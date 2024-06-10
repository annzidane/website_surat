<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-white shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Keterangan Domisili</h2>
            <form id="domisiliForm" method="POST" action="{{ route('domisili.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Form fields -->
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                        <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                        <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik') }}" maxlength="16" pattern="\d{16}" required>
                        <span id="nikError" class="text-red-600"></span>
                        @error('nik')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
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

                    <!-- Kewarganegaraan -->
                    <div>
                        <label class="block font-medium text-gray-700">Kewarganegaraan *</label>
                        <select id="kewarganegaraan" name="kewarganegaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="" disabled selected>-- PILIH KEWARGANEGARAAN --</option>
                            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                        @error('kewarganegaraan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Pernikahan -->
                    <div>
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

                    <!-- Alamat KTP -->
                    <div class="md:col-span-2">
                        <label for="alamat_ktp" class="block font-medium text-gray-700">Alamat KTP *</label>
                        <textarea id="alamat_ktp" name="alamat_ktp" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat_ktp') }}</textarea>
                        @error('alamat_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas KTP -->
                    <div>
                        <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas KTP *</label>
                        <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('berkas_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Berkas Pengantar RT -->
                    <div>
                        <label for="berkas_pengantar_RT" class="block font-medium text-gray-700">Berkas Pengantar RT *</label>
                        <input type="file" id="berkas_pengantar_RT" name="berkas_pengantar_RT" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('berkas_pengantar_RT')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                </div> <!-- End grid-cols-2 -->

                <!-- Submit Button -->
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
                        <ul class="mt-2 list-disc list-inside text-gray-700">
                            <li id="modalNama"></li>
                            <li id="modalTempatLahir"></li>
                            <li id="modalTanggalLahir"></li>
                            <li id="modalNIK"></li>
                            <li id="modalJenisKelamin"></li>
                            <li id="modalKewarganegaraan"></li>
                            <li id="modalStatusPernikahan"></li>
                            <li id="modalAlamatKTP"></li>
                        </ul>
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
            const nama = document.getElementById('nama').value;
            const tempat_lahir = document.getElementById('tempat_lahir').value;
            const tanggal_lahir = document.getElementById('tanggal_lahir').value;
            const nik = document.getElementById('nik').value;
            const jenis_kelamin = document.getElementById('jenis_kelamin').value;
            const kewarganegaraan = document.getElementById('kewarganegaraan').value;
            const status_pernikahan = document.getElementById('status_pernikahan').value;
            const alamat_ktp = document.getElementById('alamat_ktp').value;

            // Display data in modal
            document.getElementById('modalNama').textContent = 'Nama: ' + nama;
            document.getElementById('modalTempatLahir').textContent = 'Tempat Lahir: ' + tempat_lahir;
            document.getElementById('modalTanggalLahir').textContent = 'Tanggal Lahir: ' + tanggal_lahir;
            document.getElementById('modalNIK').textContent = 'NIK: ' + nik;
            document.getElementById('modalJenisKelamin').textContent = 'Jenis Kelamin: ' + jenis_kelamin;
            document.getElementById('modalKewarganegaraan').textContent = 'Kewarganegaraan: ' + kewarganegaraan;
            document.getElementById('modalStatusPernikahan').textContent = 'Status Pernikahan: ' + status_pernikahan;
            document.getElementById('modalAlamatKTP').textContent = 'Alamat KTP: ' + alamat_ktp;

            // Show modal
            document.getElementById('verificationModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('verificationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('domisiliForm').submit();
        }
    </script>
</x-app-layout>
