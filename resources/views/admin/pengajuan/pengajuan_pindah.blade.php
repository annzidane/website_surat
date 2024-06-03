@extends('admin.layouts.app')

@section('title', 'Surat Keterangan Pindah')

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="border-start border-primary shadow-lg p-4">
                <h1>Daftar Pengajuan Surat Keterangan Pindah</h1>
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
                                    <form action="{{ route('pindah.destroy', $pengajuan->id) }}" method="POST">
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
                                                <h5 class="modal-title" id="previewModalLabel{{ $pengajuan->id }}">Detail Pengajuan Surat Keterangan Pindah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 border-end">
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Kepala Keluarga</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nomor KK</strong></label>
                                                            <p>{{ $pengajuan->nomor_kk }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Kepala Keluarga</strong></label>
                                                            <p>{{ $pengajuan->nama_kepala_keluarga }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Alamat</strong></label>
                                                            <p>{{ $pengajuan->alamat }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Kode Pos</strong></label>
                                                            <p>{{ $pengajuan->kode_pos }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Telepon</strong></label>
                                                            <p>{{ $pengajuan->telepon }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Pemohon</strong></label>
                                                            <p>{{ $pengajuan->nik_pemohon }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Lengkap Pemohon</strong></label>
                                                            <p>{{ $pengajuan->nama_lengkap_pemohon }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Daerah Tujuan</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Status KK</strong></label>
                                                            <p>{{ $pengajuan->status_kk }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nomor KK Tujuan</strong></label>
                                                            <p>{{ $pengajuan->nomor_kk_tujuan }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Kepala Keluarga Tujuan</strong></label>
                                                            <p>{{ $pengajuan->nik_kepala_keluarga_tujuan }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Kepala Keluarga Tujuan</strong></label>
                                                            <p>{{ $pengajuan->nama_kepala_keluarga_tujuan }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Tanggal Kedatangan</strong></label>
                                                            <p>{{ $pengajuan->tanggal_kedatangan }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Alamat Tujuan</strong></label>
                                                            <p>{{ $pengajuan->alamat_tujuan }}</p>
                                                        </div>
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Anggota Keluarga yang Datang</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK</strong></label>
                                                            <p>{{ $pengajuan->shdk }}</p>
                                                        </div>
                                                        <!-- Kolom untuk anggota keluarga kedua dan seterusnya -->
                                                        @if($pengajuan->nik_keluarga_datang2)
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang 2</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang2 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang 2</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang2 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP 2</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp2 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK 2</strong></label>
                                                            <p>{{ $pengajuan->shdk2 }}</p>
                                                        </div>
                                                        @endif
                                                        @if($pengajuan->nik_keluarga_datang3)
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang 3</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang3 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang 3</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang3 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP 3</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp3 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK 3</strong></label>
                                                            <p>{{ $pengajuan->shdk3 }}</p>
                                                        </div>
                                                        @endif
                                                        @if($pengajuan->nik_keluarga_datang4)
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang 4</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang4 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang 4</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang4 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP 4</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp4 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK 4</strong></label>
                                                            <p>{{ $pengajuan->shdk4 }}</p>
                                                        </div>
                                                        @endif
                                                        @if($pengajuan->nik_keluarga_datang5)
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang 5</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang5 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang 5</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang5 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP 5</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp5 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK 5</strong></label>
                                                            <p>{{ $pengajuan->shdk5 }}</p>
                                                        </div>
                                                        @endif
                                                        @if($pengajuan->nik_keluarga_datang6)
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Keluarga Datang 6</strong></label>
                                                            <p>{{ $pengajuan->nik_keluarga_datang6 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Keluarga Datang 6</strong></label>
                                                            <p>{{ $pengajuan->nama_keluarga_datang6 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Masa Berlaku KTP 6</strong></label>
                                                            <p>{{ $pengajuan->masa_berlaku_ktp6 }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>SHDK 6</strong></label>
                                                            <p>{{ $pengajuan->shdk6 }}</p>
                                                        </div>
                                                        @endif
                                                        <h6 class="fw-bold text-primary mb-3">Berkas Persyaratan</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Berkas Persyaratan</strong></label>
                                                            <p><a href="{{ asset('storage/' . $pengajuan->berkas_persyaratan) }}" target="_blank">Lihat Berkas</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                @if($pengajuan->status == 'Selesai')
                                                    <a href="{{ route('pindah.cetak', $pengajuan->id) }}" class="btn btn-primary">Cetak</a>
                                                @else
                                                    <button type="button" class="btn btn-primary" disabled>Cetak</button>
                                                @endif
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
                                                <form action="{{ route('pindah.updateStatus', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
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
                                                        <label for="surat_pindah">Upload Surat Pindah</label>
                                                        <input type="file" name="surat_pindah" id="surat_pindah" class="form-control">
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
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $pengajuanSurat->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
