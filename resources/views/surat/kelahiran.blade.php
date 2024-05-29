<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="POST" action="{{ route('kelahiran.store') }}" enctype="multipart/form-data">
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
                                <input type="text" id="nama_anak" name="nama_anak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_anak') }}">
                                @error('nama_anak')
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

                            <!-- Tempat Dilahirkan -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Tempat Dilahirkan *</label>
                                <select id="tempat_dilahirkan" name="tempat_dilahirkan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="tempat_kelahiran" name="tempat_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tempat_kelahiran') }}">
                                @error('tempat_kelahiran')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Hari -->
                            <div class="mb-4">
                                <label for="hari" class="block font-medium text-gray-700">Hari *</label>
                                <input type="text" id="hari" name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('hari') }}">
                                @error('hari')
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
                        </div>
                        <!-- Isian Anak Kanan -->
                        
                        <div>
                            <!-- Jam -->
                            <div class="mb-4">
                                    <label for="jam" class="block font-medium text-gray-700">Jam *</label>
                                    <input type="time" id="jam" name="jam" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('jam') }}">
                                    @error('jam')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Jenis Kelahiran -->
                                <div class="mb-4">
                                    <label class="block font-medium text-gray-700">Jenis Kelahiran *</label>
                                    <select id="jenis_kelahiran" name="jenis_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                    <label for="kelahiran" class="block font-medium text-gray-700">Kelahiran Ke</label>
                                    <input type="text" id="kelahiran" name="kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kelahiran') }}">
                                    @error('kelahiran')
                                        <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Penolong Kelahiran -->
                                <div class="mb-4">
                                    <label class="block font-medium text-gray-700">Penolong Kelahiran *</label>
                                    <select id="penolong_kelahiran" name="penolong_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                    <label for="berat_bayi" class="block font-medium text-gray-700">Berat Bayi (kg)</label>
                                    <input type="number" id="berat_bayi" name="berat_bayi" step="0.01" min="0" max="9999999.99" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <p class="text-sm text-gray-500">Masukkan berat bayi dalam kilogram (kg) dengan menggunakan titik sebagai pemisah desimal. Misalnya: 3.25 kg.</p>
                                </div>

                                <!-- Input untuk Panjang Bayi -->
                                <div class="mb-4">
                                    <label for="panjang_bayi" class="block font-medium text-gray-700">Panjang Bayi (cm)</label>
                                    <input type="number" id="panjang_bayi" name="panjang_bayi" step="0.01" min="0" max="9999999.99" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <p class="text-sm text-gray-500">Masukkan panjang bayi dalam centimeter (cm) dengan menggunakan titik sebagai pemisah desimal. Misalnya: 50.75 cm.</p>
                                </div>
                                <!-- Berkas Persyaratan Surat Kelahiran-->
                                <div class="mb-4">
                                    <label for="surat_keterangan_lahir" class="block font-medium text-gray-700">Surat Keterangan Kelahiran Dari Dokter *</label>
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
                                <input type="text" id="nik_ibu" name="nik_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_ibu') }}">
                                @error('nik_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Ibu -->
                            <div class="mb-4">
                                <label for="nama_ibu" class="block font-medium text-gray-700">Nama Ibu *</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_ibu') }}">
                                @error('nama_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir Ibu -->
                            <div class="mb-4">
                                <label for="tanggal_lahir_ibu" class="block font-medium text-gray-700">Tanggal Lahir Ibu *</label>
                                <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir_ibu') }}">
                                @error('tanggal_lahir_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Ibu -->
                            <div class="mb-4">
                                <label for="umur_ibu" class="block font-medium text-gray-700">Umur Ibu *</label>
                                <input type="number" id="umur_ibu" name="umur_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_ibu') }}">
                                @error('umur_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div class="mb-4">
                                <label for="pekerjaan_ibu" class="block font-medium text-gray-700">Pekerjaan Ibu *</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_ibu') }}">
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
                                <textarea id="alamat_ibu" name="alamat_ibu" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_ibu') }}</textarea>
                                @error('alamat_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Kewarganegaraan Ibu -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Kewarganegaraan Ibu *</label>
                                <select id="kewarganegaraan_ibu" name="kewarganegaraan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="kebangsaan_ibu" name="kebangsaan_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kebangsaan_ibu') }}">
                                @error('kebangsaan_ibu')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Tanggal Pencatatan Pernikahan -->
                            <div>
                                <label for="tanggal_pernikahan" class="block font-medium text-gray-700">Tanggal Pencatatan Pernikahan</label>
                                <input type="date" id="tanggal_pernikahan" name="tanggal_pernikahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_pernikahan') }}">
                                @error('tanggal_pernikahan')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Berkas Persyaratan KTP ibu-->
                            <div class="mb-4">
                                    <label for="berkas_ktp_ibu" class="block font-medium text-gray-700">KTP Ibu *</label>
                                    <input type="file" id="berkas_ktp_ibu" name="berkas_ktp_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="nik_ayah" name="nik_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_ayah') }}">
                                @error('nik_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Ayah -->
                            <div class="mb-4">
                                <label for="nama_ayah" class="block font-medium text-gray-700">Nama Ayah *</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_ayah') }}">
                                @error('nama_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir Ayah -->
                            <div class="mb-4">
                                <label for="tanggal_lahir_ayah" class="block font-medium text-gray-700">Tanggal Lahir Ayah *</label>
                                <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_lahir_ayah') }}">
                                @error('tanggal_lahir_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Ayah -->
                            <div class="mb-4">
                                <label for="umur_ayah" class="block font-medium text-gray-700">Umur Ayah *</label>
                                <input type="number" id="umur_ayah" name="umur_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_ayah') }}">
                                @error('umur_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div class="mb-4">
                                <label for="pekerjaan_ayah" class="block font-medium text-gray-700">Pekerjaan Ayah *</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_ayah') }}">
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
                                <textarea id="alamat_ayah" name="alamat_ayah" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_ayah') }}</textarea>
                                @error('alamat_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Kewarganegaraan Ayah -->
                            <div class="mb-4">
                                <label class="block font-medium text-gray-700">Kewarganegaraan Ayah *</label>
                                <select id="kewarganegaraan_ayah" name="kewarganegaraan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="kebangsaan_ayah" name="kebangsaan_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('kebangsaan_ayah') }}">
                                @error('kebangsaan_ayah')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Berkas Persyaratan KTP ayah-->
                            <div class="mb-4">
                                    <label for="berkas_ktp_ayah" class="block font-medium text-gray-700">KTP Ayah *</label>
                                    <input type="file" id="berkas_ktp_ayah" name="berkas_ktp_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="nik_pelapor" name="nik_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_pelapor') }}">
                                @error('nik_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama Pelapor -->
                            <div class="mb-4">
                                <label for="nama_pelapor" class="block font-medium text-gray-700">Nama Pelapor *</label>
                                <input type="text" id="nama_pelapor" name="nama_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_pelapor') }}">
                                @error('nama_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Umur Pelapor -->
                            <div class="mb-4">
                                <label for="umur_pelapor" class="block font-medium text-gray-700">Umur Pelapor *</label>
                                <input type="number" id="umur_pelapor" name="umur_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('umur_pelapor') }}">
                                @error('umur_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>                        
                        </div>
                        <!-- Isian Pelapor Kanan -->
                        <div>
                            <!-- Jenis Kelamin Pelapor -->
                            <div>
                                <label class="block font-medium text-gray-700">Jenis Kelamin Pelapor</label>
                                <select id="jenis_kelamin_pelapor" name="jenis_kelamin_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                                <input type="text" id="pekerjaan_pelapor" name="pekerjaan_pelapor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('pekerjaan_pelapor') }}">
                                @error('pekerjaan_pelapor')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Alamat Pelapor -->
                            <div class="mb-4">
                                <label for="alamat_pelapor" class="block font-medium text-gray-700">Alamat Pelapor *</label>
                                <textarea id="alamat_pelapor" name="alamat_pelapor" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('alamat_pelapor') }}</textarea>
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
                                <input type="text" id="nik_saksi1" name="nik_saksi1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_saksi1') }}">
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
                                <input type="text" id="nik_saksi2" name="nik_saksi2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nik_saksi2') }}">
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

                <div class="flex justify-center">
                    <button type="submit" class="bg-indigo-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

