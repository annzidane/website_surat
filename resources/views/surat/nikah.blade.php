<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-white shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Pengantar Nikah</h2>
            <form id="nikahForm" method="POST" action="{{ route('nikah.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                        <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama') }}" required>
                        @error('nama')
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

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block font-medium text-gray-700">Agama *</label>
                        <input type="text" id="agama" name="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('agama') }}" required>
                        @error('agama')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan') }}" required>
                        @error('pekerjaan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                        <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nomor KK -->
                    <div>
                        <label for="nomor_kk" class="block font-medium text-gray-700">Nomor KK *</label>
                        <input type="text" id="nomor_kk" name="nomor_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nomor_kk') }}" maxlength="16" pattern="\d{16}" required>
                        @error('nomor_kk')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                        <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik') }}" maxlength="16" pattern="\d{16}" required>
                        @error('nik')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto KTP -->
                    <div>
                        <label for="foto_ktp" class="block font-medium text-gray-700">Foto KTP *</label>
                        <input type="file" id="foto_ktp" name="foto_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('foto_ktp')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Surat Pernyataan -->
                    <div>
                        <label for="surat_pernyataan" class="block font-medium text-gray-700">Surat Pernyataan Belum Pernah Menikah *</label>
                        <input type="file" id="surat_pernyataan" name="surat_pernyataan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('surat_pernyataan')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Download Template -->
                    <div class="md:col-span-2">
                        <a href="{{ route('download.template.surat.pernyataan') }}" class="block bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md text-center">Download Template Surat Pernyataan</a>
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
                            <li id="modalJenisKelamin"></li>
                            <li id="modalTempatLahir"></li>
                            <li id="modalTanggalLahir"></li>
                            <li id="modalKewarganegaraan"></li>
                            <li id="modalAgama"></li>
                            <li id="modalPekerjaan"></li>
                            <li id="modalAlamat"></li>
                            <li id="modalNomorKK"></li>
                            <li id="modalNIK"></li>
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
            const jenis_kelamin = document.getElementById('jenis_kelamin').value;
            const tempat_lahir = document.getElementById('tempat_lahir').value;
            const tanggal_lahir = document.getElementById('tanggal_lahir').value;
            const kewarganegaraan = document.getElementById('kewarganegaraan').value;
            const agama = document.getElementById('agama').value;
            const pekerjaan = document.getElementById('pekerjaan').value;
            const alamat = document.getElementById('alamat').value;
            const nomor_kk = document.getElementById('nomor_kk').value;
            const nik = document.getElementById('nik').value;

            // Display data in modal
            document.getElementById('modalNama').textContent = 'Nama: ' + nama;
            document.getElementById('modalJenisKelamin').textContent = 'Jenis Kelamin: ' + jenis_kelamin;
            document.getElementById('modalTempatLahir').textContent = 'Tempat Lahir: ' + tempat_lahir;
            document.getElementById('modalTanggalLahir').textContent = 'Tanggal Lahir: ' + tanggal_lahir;
            document.getElementById('modalKewarganegaraan').textContent = 'Kewarganegaraan: ' + kewarganegaraan;
            document.getElementById('modalAgama').textContent = 'Agama: ' + agama;
            document.getElementById('modalPekerjaan').textContent = 'Pekerjaan: ' + pekerjaan;
            document.getElementById('modalAlamat').textContent = 'Alamat: ' + alamat;
            document.getElementById('modalNomorKK').textContent = 'Nomor KK: ' + nomor_kk;
            document.getElementById('modalNIK').textContent = 'NIK: ' + nik;

            // Show modal
            document.getElementById('verificationModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('verificationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('nikahForm').submit();
        }
    </script>
</x-app-layout>
