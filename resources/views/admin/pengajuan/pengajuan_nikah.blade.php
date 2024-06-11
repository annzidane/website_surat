@extends('admin.layouts.app')

@section('title', 'Surat Pengantar Nikah')

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
                                        <form action="{{ route('nikah.destroy', $pengajuan->id) }}" method="POST">
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
                                                <!-- Modal Header -->
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="previewModalLabel{{ $pengajuan->id }}">Detail Pengajuan Pernikahan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6 border-end">
                                                            <h6 class="fw-bold text-primary mb-3">Informasi Pengajuan</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nama</strong></label>
                                                                <p>{{ $pengajuan->nama }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Jenis Kelamin</strong></label>
                                                                <p>{{ $pengajuan->jenis_kelamin }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tempat Lahir</strong></label>
                                                                <p>{{ $pengajuan->tempat_lahir }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Tanggal Lahir</strong></label>
                                                                <p>{{ $pengajuan->tanggal_lahir }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Kewarganegaraan</strong></label>
                                                                <p>{{ $pengajuan->kewarganegaraan }}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Right Column -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Agama</strong></label>
                                                                <p>{{ $pengajuan->agama }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Pekerjaan</strong></label>
                                                                <p>{{ $pengajuan->pekerjaan }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Alamat</strong></label>
                                                                <p>{{ $pengajuan->alamat }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Nomor KK</strong></label>
                                                                <p>{{ $pengajuan->nomor_kk }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>NIK</strong></label>
                                                                <p>{{ $pengajuan->nik }}</p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berkas KTP</strong></label>
                                                                <p><a href="{{ asset('storage/' . $pengajuan->foto_ktp) }}" target="_blank">Lihat Berkas</a></p>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"><strong>Berkas Persyaratan</strong></label>
                                                                <p><a href="{{ asset('storage/' . $pengajuan->surat_pernyataan) }}" target="_blank">Lihat Berkas</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    @if($pengajuan->status == 'Selesai')
                                                        <a href="{{ route('admin.nikah.cetak', $pengajuan->id) }}" class="btn btn-primary">Cetak</a>
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
                                                    <form action="{{ route('nikah.updateStatus', $pengajuan->id) }}" method="POST" id="statusForm">
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
