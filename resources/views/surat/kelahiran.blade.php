<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-white">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Formulir Pengajuan Surat Keterangan Kelahiran</h2>
            <form id="kelahiranForm" method="POST" action="{{ route('kelahiran.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Isian Anak -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Anak</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Anak Kiri -->
                        <div>
                            <!-- Nama Anak -->
                            <div class="mb-4">
                                <label for="nama_anak" class="block font-medium text-gray-700">Nama Anak *</label>
                                <input type="text" id="nama_anak" name="nama_anak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_anak') }}" required>
                                @error('nama_anak')
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

                            <!-- Tempat Dilahirkan -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Tempat Dilahirkan *</label>
                                <select id="tempat_dilahirkan" name="tempat_dilahirkan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="" disabled selected>-- PILIH TEMPAT DILAHIRKAN --</option>
                                    <option value="RS" {{ old('tempat_dilahirkan') == 'RS' ? 'selected' : '' }}>RS</option>
                                    <option value="Puskesmas" {{ old('tempat_dilahirkan') == 'Puskesmas' ? 'selected' : '' }}>Puskesmas</option>
                                    <option value="Polindes" {{ old('tempat_dilahirkan') == 'Polindes' ? 'selected' : '' }}>Polindes</option>
                                    <option value="Rumah" {{ old('tempat_dilahirkan') == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                                    <option value="lainnya" {{ old('tempat_dilahirkan') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('tempat_dilahirkan')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tempat Kelahiran -->
                            <div class="mb-4">
                                <label for="tempat_kelahiran" class="block font-medium text-gray-700">Tempat Kelahiran *</label>
                                <input type="text" id="tempat_kelahiran" name="tempat_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tempat_kelahiran') }}" required>
                                @error('tempat_kelahiran')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Hari -->
                            <div class="mb-4">
                                <label for="hari" class="block font-medium text-gray-700">Hari *</label>
                                <input type="text" id="hari" name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('hari') }}" required>
                                @error('hari')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="mb-4">
                                <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir *</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Isian Anak Kanan -->
                        
                        <div>
                            <!-- Jam -->
                            <div class="mb-4">
                                    <label for="jam" class="block font-medium text-gray-700">Jam *</label>
                                    <input type="time" id="jam" name="jam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('jam') }}" required>
                                    @error('jam')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Jenis Kelahiran -->
                                <div class="mb-4">
                                    <label class="block font-medium text-gray-700">Jenis Kelahiran *</label>
                                    <select id="jenis_kelahiran" name="jenis_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                        <option value="" disabled selected>-- PILIH JENIS KELAHIRAN --</option>
                                        <option value="Tunggal" {{ old('jenis_kelahiran') == 'Tunggal' ? 'selected' : '' }}>Tunggal</option>
                                        <option value="Kembar 2" {{ old('jenis_kelahiran') == 'Kembar 2' ? 'selected' : '' }}>Kembar 2</option>
                                        <option value="Kembar 3" {{ old('jenis_kelahiran') == 'Kembar 3' ? 'selected' : '' }}>Kembar 3</option>
                                        <option value="Kembar 4" {{ old('jenis_kelahiran') == 'Kembar 4' ? 'selected' : '' }}>Kembar 4</option>
                                        <option value="lainnya" {{ old('jenis_kelahiran') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('jenis_kelahiran')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Isian Anak Kanan -->
                                <div>
                                    <label for="kelahiran" class="block font-medium text-gray-700">Kelahiran Ke *</label>
                                    <input type="text" id="kelahiran" name="kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kelahiran') }}" required>
                                    @error('kelahiran')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Penolong Kelahiran -->
                                <div class="mb-4">
                                    <label class="block font-medium text-gray-700">Penolong Kelahiran *</label>
                                    <select id="penolong_kelahiran" name="penolong_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                        <option value="" disabled selected>-- PILIH PENOLONG KELAHIRAN --</option>
                                        <option value="Dokter" {{ old('penolong_kelahiran') == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                                        <option value="Bidan/Perawat" {{ old('penolong_kelahiran') == 'Bidan/Perawat' ? 'selected' : '' }}>Bidan/Perawat</option>
                                        <option value="Dukun" {{ old('penolong_kelahiran') == 'Dukun' ? 'selected' : '' }}>Dukun</option>
                                        <option value="lainnya" {{ old('penolong_kelahiran') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('penolong_kelahiran')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Input untuk Berat Bayi -->
                                <div class="mb-4">
                                    <label for="berat_bayi" class="block font-medium text-gray-700">Berat Bayi (kg) *</label>
                                    <input type="number" id="berat_bayi" name="berat_bayi" step="0.01" min="0" max="9999999.99" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <p class="text-sm text-gray-500">Masukkan berat bayi dalam kilogram (kg) dengan menggunakan titik sebagai pemisah desimal. Misalnya: 3.25 kg.</p>
                                </div>

                                <!-- Input untuk Panjang Bayi -->
                                <div class="mb-4">
                                    <label for="panjang_bayi" class="block font-medium text-gray-700">Panjang Bayi (cm) *</label>
                                    <input type="number" id="panjang_bayi" name="panjang_bayi" step="0.01" min="0" max="9999999.99" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <p class="text-sm text-gray-500">Masukkan panjang bayi dalam centimeter (cm) dengan menggunakan titik sebagai pemisah desimal. Misalnya: 50.75 cm.</p>
                                </div>
                                <!-- Berkas Persyaratan Surat Kelahiran-->
                                <div class="mb-4">
                                    <label for="surat_keterangan_lahir" class="block font-medium text-gray-700">Surat Keterangan Kelahiran Dari Dokter</label>
                                    <input type="file" id="surat_keterangan_lahir" name="surat_keterangan_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('surat_keterangan_lahir')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Horizontal -->
                <hr class="my-8">

                <!-- Isian Ibu -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Ibu</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Ibu Kiri -->
                        <div>
                            <!-- NIK Ibu -->
                            <div class="mb-4">
                                <label for="nik_ibu" class="block font-medium text-gray-700">NIK Ibu *</label>
                                <input type="text" id="nik_ibu" name="nik_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_ibu') }}" maxlength="16" pattern="\d{16}"required>
                                @error('nik_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Ibu -->
                            <div class="mb-4">
                                <label for="nama_ibu" class="block font-medium text-gray-700">Nama Ibu *</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_ibu') }}"required>
                                @error('nama_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir Ibu -->
                            <div class="mb-4">
                                <label for="tanggal_lahir_ibu" class="block font-medium text-gray-700">Tanggal Lahir Ibu *</label>
                                <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir_ibu') }}"required>
                                @error('tanggal_lahir_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Ibu -->
                            <div class="mb-4">
                                <label for="umur_ibu" class="block font-medium text-gray-700">Umur Ibu *</label>
                                <input type="number" id="umur_ibu" name="umur_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_ibu') }}"required>
                                @error('umur_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div class="mb-4">
                                <label for="pekerjaan_ibu" class="block font-medium text-gray-700">Pekerjaan Ibu *</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_ibu') }}"required>
                                @error('pekerjaan_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Isian Ibu Kanan -->
                        <div>
                            <!-- Alamat Ibu -->
                            <div class="mb-4">
                                <label for="alamat_ibu" class="block font-medium text-gray-700">Alamat Ibu *</label>
                                <textarea id="alamat_ibu" name="alamat_ibu" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>{{ old('alamat_ibu') }}</textarea>
                                @error('alamat_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Kewarganegaraan Ibu -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Kewarganegaraan Ibu *</label>
                                <select id="kewarganegaraan_ibu" name="kewarganegaraan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                    <option value="" disabled selected>-- PILIH KEWARGANEGARAAN IBU --</option>
                                    <option value="WNI" {{ old('kewarganegaraan_ibu') == 'WNI' ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('kewarganegaraan_ibu') == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
                                @error('kewarganegaraan_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Kebangsaan Ibu -->
                            <div class="mb-4">
                                <label for="kebangsaan_ibu" class="block font-medium text-gray-700">Kebangsaan Ibu *</label>
                                <input type="text" id="kebangsaan_ibu" name="kebangsaan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kebangsaan_ibu') }}"required>
                                @error('kebangsaan_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Tanggal Pencatatan Pernikahan -->
                            <div>
                                <label for="tanggal_pernikahan" class="block font-medium text-gray-700">Tanggal Pencatatan Pernikahan *</label>
                                <input type="date" id="tanggal_pernikahan" name="tanggal_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_pernikahan') }}" required>
                                @error('tanggal_pernikahan')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Berkas Persyaratan KTP ibu-->
                            <div class="mb-4">
                                    <label for="berkas_ktp_ibu" class="block font-medium text-gray-700">KTP Ibu *</label>
                                    <input type="file" id="berkas_ktp_ibu" name="berkas_ktp_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                    @error('berkas_ktp_ibu')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Horizontal -->
                <hr class="my-8">

                <!-- Isian Ayah -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Ayah</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Ayah Kiri -->
                        <div>
                            <!-- NIK Ayah -->
                            <div class="mb-4">
                                <label for="nik_ayah" class="block font-medium text-gray-700">NIK Ayah *</label>
                                <input type="text" id="nik_ayah" name="nik_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_ayah') }}" maxlength="16" pattern="\d{16}"required>
                                @error('nik_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Ayah -->
                            <div class="mb-4">
                                <label for="nama_ayah" class="block font-medium text-gray-700">Nama Ayah *</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_ayah') }}"required>
                                @error('nama_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir Ayah -->
                            <div class="mb-4">
                                <label for="tanggal_lahir_ayah" class="block font-medium text-gray-700">Tanggal Lahir Ayah *</label>
                                <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir_ayah') }}"required>
                                @error('tanggal_lahir_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Ayah -->
                            <div class="mb-4">
                                <label for="umur_ayah" class="block font-medium text-gray-700">Umur Ayah *</label>
                                <input type="number" id="umur_ayah" name="umur_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_ayah') }}"required>
                                @error('umur_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div class="mb-4">
                                <label for="pekerjaan_ayah" class="block font-medium text-gray-700">Pekerjaan Ayah *</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_ayah') }}"required>
                                @error('pekerjaan_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>    
                        </div>
                        <!-- Isian Ayah Kanan -->
                        <div>
                            <!-- Alamat Ayah -->
                            <div class="mb-4">
                                <label for="alamat_ayah" class="block font-medium text-gray-700">Alamat Ayah *</label>
                                <textarea id="alamat_ayah" name="alamat_ayah" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>{{ old('alamat_ayah') }}</textarea>
                                @error('alamat_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Kewarganegaraan Ayah -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Kewarganegaraan Ayah *</label>
                                <select id="kewarganegaraan_ayah" name="kewarganegaraan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                    <option value="" disabled selected>-- PILIH KEWARGANEGARAAN AYAH --</option>
                                    <option value="WNI" {{ old('kewarganegaraan_ayah') == 'WNI' ? 'selected' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('kewarganegaraan_ayah') == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
                                @error('kewarganegaraan_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Kebangsaan Ayah -->
                            <div class="mb-4">
                                <label for="kebangsaan_ayah" class="block font-medium text-gray-700">Kebangsaan Ayah *</label>
                                <input type="text" id="kebangsaan_ayah" name="kebangsaan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kebangsaan_ayah') }}"required>
                                @error('kebangsaan_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Berkas Persyaratan KTP ayah-->
                            <div class="mb-4">
                                    <label for="berkas_ktp_ayah" class="block font-medium text-gray-700">KTP Ayah *</label>
                                    <input type="file" id="berkas_ktp_ayah" name="berkas_ktp_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                    @error('berkas_ktp_ayah')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Horizontal -->
                <hr class="my-8">

                <!-- Isian Pelapor -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Pelapor</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Pelapor Kiri -->
                        <div>
                            <!-- NIK Pelapor -->
                            <div class="mb-4">
                                <label for="nik_pelapor" class="block font-medium text-gray-700">NIK Pelapor *</label>
                                <input type="text" id="nik_pelapor" name="nik_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_pelapor') }}" maxlength="16" pattern="\d{16}"required>
                                @error('nik_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Pelapor -->
                            <div class="mb-4">
                                <label for="nama_pelapor" class="block font-medium text-gray-700">Nama Pelapor *</label>
                                <input type="text" id="nama_pelapor" name="nama_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_pelapor') }}"required>
                                @error('nama_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Pelapor -->
                            <div class="mb-4">
                                <label for="umur_pelapor" class="block font-medium text-gray-700">Umur Pelapor *</label>
                                <input type="number" id="umur_pelapor" name="umur_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_pelapor') }}"required>
                                @error('umur_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>                        
                        </div>
                        <!-- Isian Pelapor Kanan -->
                        <div>
                            <!-- Jenis Kelamin Pelapor -->
                            <div>
                                <label class="block font-medium text-gray-700">Jenis Kelamin Pelapor *</label>
                                <select id="jenis_kelamin_pelapor" name="jenis_kelamin_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin Pelapor --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin_pelapor') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin_pelapor') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pekerjaan Pelapor -->
                            <div class="mb-4">
                                <label for="pekerjaan_pelapor" class="block font-medium text-gray-700">Pekerjaan Pelapor *</label>
                                <input type="text" id="pekerjaan_pelapor" name="pekerjaan_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_pelapor') }}"required>
                                @error('pekerjaan_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Alamat Pelapor -->
                            <div class="mb-4">
                                <label for="alamat_pelapor" class="block font-medium text-gray-700">Alamat Pelapor *</label>
                                <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"required>{{ old('alamat_pelapor') }}</textarea>
                                @error('alamat_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Horizontal -->
                <hr class="my-8">

                <!-- Isian Saksi 1 -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Saksi 1</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Saksi 1 Kiri -->
                        <div>
                            <!-- NIK Saksi 1 -->
                            <div class="mb-4">
                                <label for="nik_saksi1" class="block font-medium text-gray-700">NIK Saksi 1</label>
                                <input type="text" id="nik_saksi1" name="nik_saksi1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_saksi1') }}" maxlength="16" pattern="\d{16}">
                                @error('nik_saksi1')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Saksi 1 -->
                            <div class="mb-4">
                                <label for="nama_saksi1" class="block font-medium text-gray-700">Nama Saksi 1</label>
                                <input type="text" id="nama_saksi1" name="nama_saksi1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_saksi1') }}">
                                @error('nama_saksi1')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Saksi 1 -->
                            <div class="mb-4">
                                <label for="umur_saksi1" class="block font-medium text-gray-700">Umur Saksi 1</label>
                                <input type="number" id="umur_saksi1" name="umur_saksi1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_saksi1') }}">
                                @error('umur_saksi1')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>            
                        </div>
                        <!-- Isian Saksi 1 Kanan -->
                        <div>
                            <!-- Pekerjaan Saksi 1 -->
                            <div class="mb-4">
                                <label for="pekerjaan_saksi1" class="block font-medium text-gray-700">Pekerjaan Saksi 1</label>
                                <input type="text" id="pekerjaan_saksi1" name="pekerjaan_saksi1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_saksi1') }}">
                                @error('pekerjaan_saksi1')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Alamat Saksi 1 -->
                            <div class="mb-4">
                                <label for="alamat_saksi1" class="block font-medium text-gray-700">Alamat Saksi 1</label>
                                <textarea id="alamat_saksi1" name="alamat_saksi1" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_saksi1') }}</textarea>
                                @error('alamat_saksi1')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Horizontal -->
                <hr class="my-8">

                <!-- Isian Saksi 2 -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-center text-gray-900 mb-4">Isian Saksi 2</h2>
                    <div class="grid grid-cols-2 gap-10">
                        <!-- Isian Saksi 2 Kiri -->
                        <div>
                            <!-- NIK Saksi 2 -->
                            <div class="mb-4">
                                <label for="nik_saksi2" class="block font-medium text-gray-700">NIK Saksi 2</label>
                                <input type="text" id="nik_saksi2" name="nik_saksi2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_saksi2') }}" maxlength="16" pattern="\d{16}">
                                @error('nik_saksi2')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Saksi 2 -->
                            <div class="mb-4">
                                <label for="nama_saksi2" class="block font-medium text-gray-700">Nama Saksi 2</label>
                                <input type="text" id="nama_saksi2" name="nama_saksi2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_saksi2') }}">
                                @error('nama_saksi2')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Saksi 2 -->
                            <div class="mb-4">
                                <label for="umur_saksi2" class="block font-medium text-gray-700">Umur Saksi 2</label>
                                <input type="number" id="umur_saksi2" name="umur_saksi2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_saksi2') }}">
                                @error('umur_saksi2')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Isian Saksi 2 Kanan -->
                        <div>
                            <!-- Pekerjaan Saksi 2 -->
                            <div class="mb-4">
                                <label for="pekerjaan_saksi2" class="block font-medium text-gray-700">Pekerjaan Saksi 2</label>
                                <input type="text" id="pekerjaan_saksi2" name="pekerjaan_saksi2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_saksi2') }}">
                                @error('pekerjaan_saksi2')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Alamat Saksi 2 -->
                            <div class="mb-4">
                                <label for="alamat_saksi2" class="block font-medium text-gray-700">Alamat Saksi 2</label>
                                <textarea id="alamat_saksi2" name="alamat_saksi2" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_saksi2') }}</textarea>
                                @error('alamat_saksi2')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Berkas Persyaratan -->
                        <div class="mb-4">
                            <label for="berkas_kk" class="block font-medium text-gray-700">Berkas Persyaratan KK*</label>
                            <input type="file" id="berkas_kk" name="berkas_kk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('berkas_kk')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

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

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">
                        Verifikasi Data
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Periksa kembali data yang telah Anda masukkan:</p>
                        <div class="grid grid-cols-2 gap-4 mt-2 text-gray-700">
                            <ul class="list-disc list-inside">
                                <li id="modalNamaAnak"></li>
                                <li id="modalJenisKelamin"></li>
                                <li id="modalTempatDilahirkan"></li>
                                <li id="modalTempatKelahiran"></li>
                                <li id="modalHari"></li>
                                <li id="modalTanggalLahir"></li>
                                <li id="modalJam"></li>
                                <li id="modalJenisKelahiran"></li>
                                <li id="modalKelahiran"></li>
                                <li id="modalPenolongKelahiran"></li>
                                <li id="modalBeratBayi"></li>
                                <li id="modalPanjangBayi"></li>
                                <!-- Ibu -->
                                <li id="modalNIKIbu"></li>
                                <li id="modalNamaIbu"></li>
                                <li id="modalTanggalLahirIbu"></li>
                                <li id="modalUmurIbu"></li>
                                <li id="modalPekerjaanIbu"></li>
                                <li id="modalAlamatIbu"></li>
                                <li id="modalKewarganegaraanIbu"></li>
                                <li id="modalKebangsaanIbu"></li>
                                <li id="modalTanggalPernikahan"></li>
                            </ul>
                            <ul class="list-disc list-inside">
                                <!-- Ayah -->
                                <li id="modalNIKAyah"></li>
                                <li id="modalNamaAyah"></li>
                                <li id="modalTanggalLahirAyah"></li>
                                <li id="modalUmurAyah"></li>
                                <li id="modalPekerjaanAyah"></li>
                                <li id="modalAlamatAyah"></li>
                                <li id="modalKewarganegaraanAyah"></li>
                                <li id="modalKebangsaanAyah"></li>
                                <!-- Pelapor -->
                                <li id="modalNIKPelapor"></li>
                                <li id="modalNamaPelapor"></li>
                                <li id="modalUmurPelapor"></li>
                                <li id="modalJenisKelaminPelapor"></li>
                                <li id="modalPekerjaanPelapor"></li>
                                <li id="modalAlamatPelapor"></li>
                                <!-- Saksi 1 -->
                                <li id="modalNIKSaksi1"></li>
                                <li id="modalNamaSaksi1"></li>
                                <li id="modalUmurSaksi1"></li>
                                <li id="modalPekerjaanSaksi1"></li>
                                <li id="modalAlamatSaksi1"></li>
                                <!-- Saksi 2 -->
                                <li id="modalNIKSaksi2"></li>
                                <li id="modalNamaSaksi2"></li>
                                <li id="modalUmurSaksi2"></li>
                                <li id="modalPekerjaanSaksi2"></li>
                                <li id="modalAlamatSaksi2"></li>
                            </ul>
                        </div>
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
            const nama_anak = document.getElementById('nama_anak').value;
            const jenis_kelamin = document.getElementById('jenis_kelamin').value;
            const tempat_dilahirkan = document.getElementById('tempat_dilahirkan').value;
            const tempat_kelahiran = document.getElementById('tempat_kelahiran').value;
            const hari = document.getElementById('hari').value;
            const tanggal_lahir = document.getElementById('tanggal_lahir').value;
            const jam = document.getElementById('jam').value;
            const jenis_kelahiran = document.getElementById('jenis_kelahiran').value;
            const kelahiran = document.getElementById('kelahiran').value;
            const penolong_kelahiran = document.getElementById('penolong_kelahiran').value;
            const berat_bayi = document.getElementById('berat_bayi').value;
            const panjang_bayi = document.getElementById('panjang_bayi').value;
            // Ibu
            const nik_ibu = document.getElementById('nik_ibu').value;
            const nama_ibu = document.getElementById('nama_ibu').value;
            const tanggal_lahir_ibu = document.getElementById('tanggal_lahir_ibu').value;
            const umur_ibu = document.getElementById('umur_ibu').value;
            const pekerjaan_ibu = document.getElementById('pekerjaan_ibu').value;
            const alamat_ibu = document.getElementById('alamat_ibu').value;
            const kewarganegaraan_ibu = document.getElementById('kewarganegaraan_ibu').value;
            const kebangsaan_ibu = document.getElementById('kebangsaan_ibu').value;
            const tanggal_pernikahan = document.getElementById('tanggal_pernikahan').value;
            // Ayah
            const nik_ayah = document.getElementById('nik_ayah').value;
            const nama_ayah = document.getElementById('nama_ayah').value;
            const tanggal_lahir_ayah = document.getElementById('tanggal_lahir_ayah').value;
            const umur_ayah = document.getElementById('umur_ayah').value;
            const pekerjaan_ayah = document.getElementById('pekerjaan_ayah').value;
            const alamat_ayah = document.getElementById('alamat_ayah').value;
            const kewarganegaraan_ayah = document.getElementById('kewarganegaraan_ayah').value;
            const kebangsaan_ayah = document.getElementById('kebangsaan_ayah').value;
            // Pelapor
            const nik_pelapor = document.getElementById('nik_pelapor').value;
            const nama_pelapor = document.getElementById('nama_pelapor').value;
            const umur_pelapor = document.getElementById('umur_pelapor').value;
            const jenis_kelamin_pelapor = document.getElementById('jenis_kelamin_pelapor').value;
            const pekerjaan_pelapor = document.getElementById('pekerjaan_pelapor').value;
            const alamat_pelapor = document.getElementById('alamat_pelapor').value;
            // Saksi 1
            const nik_saksi1 = document.getElementById('nik_saksi1').value;
            const nama_saksi1 = document.getElementById('nama_saksi1').value;
            const umur_saksi1 = document.getElementById('umur_saksi1').value;
            const pekerjaan_saksi1 = document.getElementById('pekerjaan_saksi1').value;
            const alamat_saksi1 = document.getElementById('alamat_saksi1').value;
            // Saksi 2
            const nik_saksi2 = document.getElementById('nik_saksi2').value;
            const nama_saksi2 = document.getElementById('nama_saksi2').value;
            const umur_saksi2 = document.getElementById('umur_saksi2').value;
            const pekerjaan_saksi2 = document.getElementById('pekerjaan_saksi2').value;
            const alamat_saksi2 = document.getElementById('alamat_saksi2').value;

            // Display data in modal
            document.getElementById('modalNamaAnak').textContent = 'Nama Anak: ' + nama_anak;
            document.getElementById('modalJenisKelamin').textContent = 'Jenis Kelamin: ' + jenis_kelamin;
            document.getElementById('modalTempatDilahirkan').textContent = 'Tempat Dilahirkan: ' + tempat_dilahirkan;
            document.getElementById('modalTempatKelahiran').textContent = 'Tempat Kelahiran: ' + tempat_kelahiran;
            document.getElementById('modalHari').textContent = 'Hari: ' + hari;
            document.getElementById('modalTanggalLahir').textContent = 'Tanggal Lahir: ' + tanggal_lahir;
            document.getElementById('modalJam').textContent = 'Jam: ' + jam;
            document.getElementById('modalJenisKelahiran').textContent = 'Jenis Kelahiran: ' + jenis_kelahiran;
            document.getElementById('modalKelahiran').textContent = 'Kelahiran: ' + kelahiran;
            document.getElementById('modalPenolongKelahiran').textContent = 'Penolong Kelahiran: ' + penolong_kelahiran;
            document.getElementById('modalBeratBayi').textContent = 'Berat Bayi: ' + berat_bayi;
            document.getElementById('modalPanjangBayi').textContent = 'Panjang Bayi: ' + panjang_bayi;
            // Ibu
            document.getElementById('modalNIKIbu').textContent = 'NIK Ibu: ' + nik_ibu;
            document.getElementById('modalNamaIbu').textContent = 'Nama Ibu: ' + nama_ibu;
            document.getElementById('modalTanggalLahirIbu').textContent = 'Tanggal Lahir Ibu: ' + tanggal_lahir_ibu;
            document.getElementById('modalUmurIbu').textContent = 'Umur Ibu: ' + umur_ibu;
            document.getElementById('modalPekerjaanIbu').textContent = 'Pekerjaan Ibu: ' + pekerjaan_ibu;
            document.getElementById('modalAlamatIbu').textContent = 'Alamat Ibu: ' + alamat_ibu;
            document.getElementById('modalKewarganegaraanIbu').textContent = 'Kewarganegaraan Ibu: ' + kewarganegaraan_ibu;
            document.getElementById('modalKebangsaanIbu').textContent = 'Kebangsaan Ibu: ' + kebangsaan_ibu;
            document.getElementById('modalTanggalPernikahan').textContent = 'Tanggal Pernikahan: ' + tanggal_pernikahan;
            // Ayah
            document.getElementById('modalNIKAyah').textContent = 'NIK Ayah: ' + nik_ayah;
            document.getElementById('modalNamaAyah').textContent = 'Nama Ayah: ' + nama_ayah;
            document.getElementById('modalTanggalLahirAyah').textContent = 'Tanggal Lahir Ayah: ' + tanggal_lahir_ayah;
            document.getElementById('modalUmurAyah').textContent = 'Umur Ayah: ' + umur_ayah;
            document.getElementById('modalPekerjaanAyah').textContent = 'Pekerjaan Ayah: ' + pekerjaan_ayah;
            document.getElementById('modalAlamatAyah').textContent = 'Alamat Ayah: ' + alamat_ayah;
            document.getElementById('modalKewarganegaraanAyah').textContent = 'Kewarganegaraan Ayah: ' + kewarganegaraan_ayah;
            document.getElementById('modalKebangsaanAyah').textContent = 'Kebangsaan Ayah: ' + kebangsaan_ayah;
            // Pelapor
            document.getElementById('modalNIKPelapor').textContent = 'NIK Pelapor: ' + nik_pelapor;
            document.getElementById('modalNamaPelapor').textContent = 'Nama Pelapor: ' + nama_pelapor;
            document.getElementById('modalUmurPelapor').textContent = 'Umur Pelapor: ' + umur_pelapor;
            document.getElementById('modalJenisKelaminPelapor').textContent = 'Jenis Kelamin Pelapor: ' + jenis_kelamin_pelapor;
            document.getElementById('modalPekerjaanPelapor').textContent = 'Pekerjaan Pelapor: ' + pekerjaan_pelapor;
            document.getElementById('modalAlamatPelapor').textContent = 'Alamat Pelapor: ' + alamat_pelapor;
            // Saksi 1
            document.getElementById('modalNIKSaksi1').textContent = 'NIK Saksi 1: ' + nik_saksi1;
            document.getElementById('modalNamaSaksi1').textContent = 'Nama Saksi 1: ' + nama_saksi1;
            document.getElementById('modalUmurSaksi1').textContent = 'Umur Saksi 1: ' + umur_saksi1;
            document.getElementById('modalPekerjaanSaksi1').textContent = 'Pekerjaan Saksi 1: ' + pekerjaan_saksi1;
            document.getElementById('modalAlamatSaksi1').textContent = 'Alamat Saksi 1: ' + alamat_saksi1;
            // Saksi 2
            document.getElementById('modalNIKSaksi2').textContent = 'NIK Saksi 2: ' + nik_saksi2;
            document.getElementById('modalNamaSaksi2').textContent = 'Nama Saksi 2: ' + nama_saksi2;
            document.getElementById('modalUmurSaksi2').textContent = 'Umur Saksi 2: ' + umur_saksi2;
            document.getElementById('modalPekerjaanSaksi2').textContent = 'Pekerjaan Saksi 2: ' + pekerjaan_saksi2;
            document.getElementById('modalAlamatSaksi2').textContent = 'Alamat Saksi 2: ' + alamat_saksi2;

            // Show modal
            document.getElementById('verificationModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('verificationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('kelahiranForm').submit();
        }
    </script>
</x-app-layout>

