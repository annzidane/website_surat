@extends('admin.layouts.app')

@section('title', 'Surat Keterangan Kelahiran')

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="border-start border-primary shadow-lg p-4">
                <h1>Daftar Pengajuan Surat</h1>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pengaju</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuanSurat as $index => $pengajuan)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $pengajuan->user->name }}</td>
                                <td>{{ $pengajuan->nomor_surat }}</td>
                                <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($pengajuan->status == 'Selesai')
                                        <span class="badge bg-success">{{ $pengajuan->status }}</span>
                                    @elseif($pengajuan->status == 'Ditolak')
                                        <span class="badge bg-danger">{{ $pengajuan->status }}</span>
                                    @elseif($pengajuan->status == 'Penandatanganan')
                                        <span class="badge bg-warning">{{ $pengajuan->status }}</span>
                                    @else
                                        <span class="badge bg-info">{{ $pengajuan->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $pengajuan->keterangan }}</td>
                                <td>
                                    <div class="d-flex">
                                        <!-- Button trigger modal for Preview -->
                                        <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#previewModal{{ $pengajuan->id }}" title="Show">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <!-- Button trigger modal for Ubah Status -->
                                        <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pengajuan->id }}" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        
                                        <!-- Form Hapus -->
                                        <form action="{{ route('kelahiran.destroy', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <!-- Preview Modal -->
                                    <div class="modal fade" id="previewModal{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="previewModalLabel{{ $pengajuan->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="previewModalLabel{{ $pengajuan->id }}">Detail Pengajuan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 border-end">
                                                            <h6 class="fw-bold text-primary mb-3">Informasi Anak</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Anak</strong></label>
                                                                <p>{{ $pengajuan->nama_anak }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Jenis Kelamin</strong></label>
                                                                <p>{{ $pengajuan->jenis_kelamin }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tempat Dilahirkan</strong></label>
                                                                <p>{{ $pengajuan->tempat_dilahirkan }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tempat Kelahiran</strong></label>
                                                                <p>{{ $pengajuan->tempat_kelahiran }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Hari</strong></label>
                                                                <p>{{ $pengajuan->hari }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tanggal Lahir</strong></label>
                                                                <p>{{ $pengajuan->tanggal_lahir }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Jam</strong></label>
                                                                <p>{{ $pengajuan->jam }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Jenis Kelahiran</strong></label>
                                                                <p>{{ $pengajuan->jenis_kelahiran }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kelahiran Ke</strong></label>
                                                                <p>{{ $pengajuan->kelahiran }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Penolong Kelahiran</strong></label>
                                                                <p>{{ $pengajuan->penolong_kelahiran }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berat Bayi (gram)</strong></label>
                                                                <p>{{ $pengajuan->berat_bayi }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Panjang Bayi (cm)</strong></label>
                                                                <p>{{ $pengajuan->panjang_bayi }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="fw-bold text-primary mb-3">Informasi Orang Tua</h6>
                                                            <h6 class="fw-bold text-primary mb-2">Ibu</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK Ibu</strong></label>
                                                                <p>{{ $pengajuan->nik_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Ibu</strong></label>
                                                                <p>{{ $pengajuan->nama_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tanggal Lahir Ibu</strong></label>
                                                                <p>{{ $pengajuan->tanggal_lahir_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Umur Ibu</strong></label>
                                                                <p>{{ $pengajuan->umur_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan Ibu</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat Ibu</strong></label>
                                                                <p>{{ $pengajuan->alamat_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kewarganegaraan Ibu</strong></label>
                                                                <p>{{ $pengajuan->kewarganegaraan_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kebangsaan Ibu</strong></label>
                                                                <p>{{ $pengajuan->kebangsaan_ibu }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tanggal Pernikahan</strong></label>
                                                                <p>{{ $pengajuan->tanggal_pernikahan }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berkas KTP Ibu</strong></label>
                                                                <p><a href="{{ asset('storage/' . $pengajuan->berkas_ktp_ibu) }}" target="_blank">Lihat Berkas</a></p>
                                                            </div>

                                                            <hr>
                                                            <h6 class="fw-bold text-primary mb-2">Ayah</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK Ayah</strong></label>
                                                                <p>{{ $pengajuan->nik_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Ayah</strong></label>
                                                                <p>{{ $pengajuan->nama_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tanggal Lahir Ayah</strong></label>
                                                                <p>{{ $pengajuan->tanggal_lahir_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Umur Ayah</strong></label>
                                                                <p>{{ $pengajuan->umur_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan Ayah</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat Ayah</strong></label>
                                                                <p>{{ $pengajuan->alamat_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kewarganegaraan Ayah</strong></label>
                                                                <p>{{ $pengajuan->kewarganegaraan_ayah }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kebangsaan Ayah</strong></label>
                                                                <p>{{ $pengajuan->kebangsaan_ayah }}</p>
                                                            </div>

                                                            @if($pengajuan->nik_pelapor)
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK Pelapor</strong></label>
                                                                <p>{{ $pengajuan->nik_pelapor }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Pelapor</strong></label>
                                                                <p>{{ $pengajuan->nama_pelapor }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Umur Pelapor</strong></label>
                                                                <p>{{ $pengajuan->umur_pelapor }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Jenis Kelamin Pelapor</strong></label>
                                                                <p>{{ $pengajuan->jenis_kelamin_pelapor }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan Pelapor</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan_pelapor }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat Pelapor</strong></label>
                                                                <p>{{ $pengajuan->alamat_pelapor }}</p>
                                                            </div>
                                                            @endif

                                                            @if($pengajuan->nik_saksi1)
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK Saksi 1</strong></label>
                                                                <p>{{ $pengajuan->nik_saksi1 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Saksi 1</strong></label>
                                                                <p>{{ $pengajuan->nama_saksi1 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Umur Saksi 1</strong></label>
                                                                <p>{{ $pengajuan->umur_saksi1 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan Saksi 1</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan_saksi1 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat Saksi 1</strong></label>
                                                                <p>{{ $pengajuan->alamat_saksi1 }}</p>
                                                            </div>
                                                            @endif

                                                            @if($pengajuan->nik_saksi2)
                                                            <hr>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK Saksi 2</strong></label>
                                                                <p>{{ $pengajuan->nik_saksi2 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama Saksi 2</strong></label>
                                                                <p>{{ $pengajuan->nama_saksi2 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Umur Saksi 2</strong></label>
                                                                <p>{{ $pengajuan->umur_saksi2 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan Saksi 2</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan_saksi2 }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat Saksi 2</strong></label>
                                                                <p>{{ $pengajuan->alamat_saksi2 }}</p>
                                                            </div>
                                                            @endif
                                                            
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berkas KTP Ayah</strong></label>
                                                                <p><a href="{{ asset('storage/' . $pengajuan->berkas_ktp_ayah) }}" target="_blank">Lihat Berkas</a></p>
                                                            </div>
                                                            <h6 class="fw-bold text-primary mb-3">Berkas Persyaratan</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berkas KK</strong></label>
                                                                <p><a href="{{ asset('storage/' . $pengajuan->berkas_kk) }}" target="_blank">Lihat Berkas</a></p>
                                                            </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"><strong>Surat Keterangan Lahir</strong></label>
                                                                    @if($pengajuan->surat_keterangan_lahir)
                                                                        <p><a href="{{ asset('storage/' . $pengajuan->surat_keterangan_lahir) }}" target="_blank">Lihat Berkas</a></p>
                                                                    @endif
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ubah Status Modal -->
                                    <div class="modal fade" id="exampleModal{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status dan Keterangan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kelahiran.updateStatus', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $pengajuan->nomor_surat }}" placeholder="Masukkan nomor surat">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" name="status" id="status">
                                                                <option value="Data Sedang Diperiksa" {{ $pengajuan->status == 'Data Sedang Diperiksa' ? 'selected' : '' }}>Data Sedang Diperiksa</option>
                                                                <option value="Penandatanganan" {{ $pengajuan->status == 'Penandatanganan' ? 'selected' : '' }}>Penandatanganan</option>
                                                                <option value="Selesai" {{ $pengajuan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                                <option value="Ditolak" {{ $pengajuan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" rows="3">{{ $pengajuan->keterangan }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="surat_kelahiran">Upload Surat</label>
                                                            <input type="file" name="surat_kelahiran" id="surat_kelahiran" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $pengajuanSurat->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
