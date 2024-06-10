<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-white shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Keterangan Kematian</h2>
            <form id="kematianForm" method="POST" action="{{ route('kematian.store') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <h2 class="text-lg font-bold mb-4 text-center">Informasi Orang yang Meninggal</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block font-medium text-gray-700">Nama *</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Bin / Binti -->
                        <div>
                            <label for="bin_binti" class="block font-medium text-gray-700">Bin / Binti *</label>
                            <input type="text" id="bin_binti" name="bin_binti" value="{{ old('bin_binti') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('bin_binti')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block font-medium text-gray-700">NIK *</label>
                            <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" maxlength="16" required pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
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

                        <!-- Tempat Lahir -->
                        <div>
                            <label for="tempat_lahir" class="block font-medium text-gray-700">Tempat Lahir *</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tempat_lahir')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_lahir')
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

                        <!-- Pekerjaan -->
                        <div>
                            <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan *</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('pekerjaan')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block font-medium text-gray-700">Alamat *</label>
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Meninggal -->
                        <div>
                            <label for="tanggal_meninggal" class="block font-medium text-gray-700">Tanggal Meninggal *</label>
                            <input type="date" id="tanggal_meninggal" name="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jam Meninggal -->
                        <div>
                            <label for="jam_meninggal" class="block font-medium text-gray-700">Jam *</label>
                            <input type="time" id="jam_meninggal" name="jam_meninggal" value="{{ old('jam_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('jam_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tempat Meninggal -->
                        <div>
                            <label for="tempat_meninggal" class="block font-medium text-gray-700">Tempat Meninggal *</label>
                            <input type="text" id="tempat_meninggal" name="tempat_meninggal" value="{{ old('tempat_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tempat_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sebab Meninggal -->
                        <div>
                            <label for="sebab_meninggal" class="block font-medium text-gray-700">Sebab Meninggal *</label>
                            <input type="text" id="sebab_meninggal" name="sebab_meninggal" value="{{ old('sebab_meninggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('sebab_meninggal')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Umur -->
                        <div>
                            <label for="umur" class="block font-medium text-gray-700">Umur *</label>
                            <input type="number" id="umur" name="umur" value="{{ old('umur') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('umur')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Agama -->
                        <div>
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

                        <!-- Berkas Persyaratan KTP -->
                        <div>
                            <label for="berkas_ktp" class="block font-medium text-gray-700">Berkas Persyaratan KTP *</label>
                            <input type="file" id="berkas_ktp" name="berkas_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('berkas_ktp')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Berkas Persyaratan KK -->
                        <div>
                            <label for="berkas_kk" class="block font-medium text-gray-700">Berkas Persyaratan KK *</label>
                            <input type="file" id="berkas_kk" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('berkas_kk')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Berkas Persyaratan Surat Kematian -->
                        <div>
                            <label for="berkas_surat_kematian" class="block font-medium text-gray-700">Berkas Persyaratan (Surat Keterangan RT/RW atau Surat Keterangan Dokter)</label>
                            <input type="file" id="berkas_surat_kematian" name="berkas_surat_kematian" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_surat_kematian')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-lg font-bold mb-4 text-center">Informasi Pelapor</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap Pelapor -->
                        <div>
                            <label for="nama_pelapor" class="block font-medium text-gray-700">Nama Lengkap Pelapor *</label>
                            <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('nama_pelapor')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIK Pelapor -->
                        <div>
                            <label for="nik_pelapor" class="block font-medium text-gray-700">NIK Pelapor *</label>
                            <input type="text" id="nik_pelapor" name="nik_pelapor" value="{{ old('nik_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required maxlength="16" pattern="\d{16}">
                            @error('nik_pelapor')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir Pelapor -->
                        <div>
                            <label for="tanggal_lahir_pelapor" class="block font-medium text-gray-700">Tanggal Lahir Pelapor *</label>
                            <input type="date" id="tanggal_lahir_pelapor" name="tanggal_lahir_pelapor" value="{{ old('tanggal_lahir_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tanggal_lahir_pelapor')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Pekerjaan Pelapor -->
                        <div>
                            <label for="pekerjaan_pelapor" class="block font-medium text-gray-700">Pekerjaan Pelapor *</label>
                            <input type="text" id="pekerjaan_pelapor" name="pekerjaan_pelapor" value="{{ old('pekerjaan_pelapor') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('pekerjaan_pelapor')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat Pelapor -->
                        <div>
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
                    </div> <!-- End grid-cols-2 -->
                </div>
                <!-- Submit Button -->
                <div class="mt-6 flex justify-center">
                    <button type="button" onclick="verifyData()" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-600 focus:outline-none focus:shadow-outline transition duration-300">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div id="verificationModal" class="fixed z-10 inset-0 overflow-y-auto hidden ">
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
                        <ul class="mt-2 list-disc list-inside text-gray-700 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li id="modalNama"></li>
                            <li id="modalBinBinti"></li>
                            <li id="modalNIK"></li>
                            <li id="modalJenisKelamin"></li>
                            <li id="modalTempatLahir"></li>
                            <li id="modalTanggalLahir"></li>
                            <li id="modalStatusPernikahan"></li>
                            <li id="modalPekerjaan"></li>
                            <li id="modalAlamat"></li>
                            <li id="modalTanggalMeninggal"></li>
                            <li id="modalJamMeninggal"></li>
                            <li id="modalTempatMeninggal"></li>
                            <li id="modalSebabMeninggal"></li>
                            <li id="modalUmur"></li>
                            <li id="modalAgama"></li>
                            <li id="modalNamaPelapor"></li>
                            <li id="modalNIKPelapor"></li>
                            <li id="modalTanggalLahirPelapor"></li>
                            <li id="modalPekerjaanPelapor"></li>
                            <li id="modalAlamatPelapor"></li>
                            <li id="modalHubunganPelapor"></li>
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
            const formData = {
                nama: document.getElementById('nama').value,
                bin_binti: document.getElementById('bin_binti').value,
                nik: document.getElementById('nik').value,
                jenis_kelamin: document.getElementById('jenis_kelamin').value,
                tempat_lahir: document.getElementById('tempat_lahir').value,
                tanggal_lahir: document.getElementById('tanggal_lahir').value,
                status_pernikahan: document.getElementById('status_pernikahan').value,
                pekerjaan: document.getElementById('pekerjaan').value,
                alamat: document.getElementById('alamat').value,
                tanggal_meninggal: document.getElementById('tanggal_meninggal').value,
                jam_meninggal: document.getElementById('jam_meninggal').value,
                tempat_meninggal: document.getElementById('tempat_meninggal').value,
                sebab_meninggal: document.getElementById('sebab_meninggal').value,
                umur: document.getElementById('umur').value,
                agama: document.getElementById('agama').value,
                nama_pelapor: document.getElementById('nama_pelapor').value,
                nik_pelapor: document.getElementById('nik_pelapor').value,
                tanggal_lahir_pelapor: document.getElementById('tanggal_lahir_pelapor').value,
                pekerjaan_pelapor: document.getElementById('pekerjaan_pelapor').value,
                alamat_pelapor: document.getElementById('alamat_pelapor').value,
                hubungan_pelapor: document.getElementById('hubungan_pelapor').value,
            };

            // Display data in modal
            document.getElementById('modalNama').textContent = 'Nama: ' + formData.nama;
            document.getElementById('modalBinBinti').textContent = 'Bin/Binti: ' + formData.bin_binti;
            document.getElementById('modalNIK').textContent = 'NIK: ' + formData.nik;
            document.getElementById('modalJenisKelamin').textContent = 'Jenis Kelamin: ' + formData.jenis_kelamin;
            document.getElementById('modalTempatLahir').textContent = 'Tempat Lahir: ' + formData.tempat_lahir;
            document.getElementById('modalTanggalLahir').textContent = 'Tanggal Lahir: ' + formData.tanggal_lahir;
            document.getElementById('modalStatusPernikahan').textContent = 'Status Pernikahan: ' + formData.status_pernikahan;
            document.getElementById('modalPekerjaan').textContent = 'Pekerjaan: ' + formData.pekerjaan;
            document.getElementById('modalAlamat').textContent = 'Alamat: ' + formData.alamat;
            document.getElementById('modalTanggalMeninggal').textContent = 'Tanggal Meninggal: ' + formData.tanggal_meninggal;
            document.getElementById('modalJamMeninggal').textContent = 'Jam: ' + formData.jam_meninggal;
            document.getElementById('modalTempatMeninggal').textContent = 'Tempat Meninggal: ' + formData.tempat_meninggal;
            document.getElementById('modalSebabMeninggal').textContent = 'Sebab Meninggal: ' + formData.sebab_meninggal;
            document.getElementById('modalUmur').textContent = 'Umur: ' + formData.umur;
            document.getElementById('modalAgama').textContent = 'Agama: ' + formData.agama;
            document.getElementById('modalNamaPelapor').textContent = 'Nama Pelapor: ' + formData.nama_pelapor;
            document.getElementById('modalNIKPelapor').textContent = 'NIK Pelapor: ' + formData.nik_pelapor;
            document.getElementById('modalTanggalLahirPelapor').textContent = 'Tanggal Lahir Pelapor: ' + formData.tanggal_lahir_pelapor;
            document.getElementById('modalPekerjaanPelapor').textContent = 'Pekerjaan Pelapor: ' + formData.pekerjaan_pelapor;
            document.getElementById('modalAlamatPelapor').textContent = 'Alamat Pelapor: ' + formData.alamat_pelapor;
            document.getElementById('modalHubunganPelapor').textContent = 'Hubungan Pelapor: ' + formData.hubungan_pelapor;

            // Show modal
            document.getElementById('verificationModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('verificationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('kematianForm').submit();
        }
    </script>
</x-app-layout>

