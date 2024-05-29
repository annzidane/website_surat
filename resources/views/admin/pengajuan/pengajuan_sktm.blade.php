@extends('admin.layouts.app')

@section('title', 'Daftar Pengajuan SKTM')

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="border-start border-primary shadow-lg p-4">
                <h1>Daftar Pengajuan Surat Keterangan Tidak Mampu</h1>
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
                        @foreach ($pengajuanSurat as $pengajuan)
                        <tr>
                            <th scope="row">{{ $pengajuan->id }}</th>
                            <td>{{ $pengajuan->user->name }}</td>
                            <td>{{ $pengajuan->nomor_surat }}</td>
                            <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if($pengajuan->status == 'Selesai')
                                    <span class="badge bg-success">{{ $pengajuan->status }}</span>
                                @elseif($pengajuan->status == 'Ditolak')
                                    <span class="badge bg-danger">{{ $pengajuan->status }}</span>
                                @else
                                    <span class="badge bg-info">{{ $pengajuan->status }}</span>
                                @endif
                            </td>
                            <td>{{ $pengajuan->keterangan }}</td>
                            <td>
                            <div class="d-flex">
                                <!-- Button trigger modal for Preview -->
                                <button type="button" class="btn btn-success btn-sm show" data-bs-toggle="modal" data-bs-target="#previewModal{{ $pengajuan->id }}" title="Show">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Button trigger modal for Ubah Status -->
                                <button type="button" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pengajuan->id }}" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </div>
                                <!-- Preview Modal -->
                                <div class="modal fade" id="previewModal{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="previewModalLabel{{ $pengajuan->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="previewModalLabel{{ $pengajuan->id }}">Detail Pengajuan Surat Keterangan Tidak Mampu</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 border-end">
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Pemohon</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama</strong></label>
                                                            <p>{{ $pengajuan->nama }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK</strong></label>
                                                            <p>{{ $pengajuan->nik }}</p>
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
                                                            <label class="form-label"><strong>Jenis Kelamin</strong></label>
                                                            <p>{{ $pengajuan->jenis_kelamin }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Pekerjaan</strong></label>
                                                            <p>{{ $pengajuan->pekerjaan }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Alamat</strong></label>
                                                            <p>{{ $pengajuan->alamat }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Orang Tua</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Nama Orang Tua</strong></label>
                                                            <p>{{ $pengajuan->nama_orang_tua }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>NIK Orang Tua</strong></label>
                                                            <p>{{ $pengajuan->nik_orang_tua }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Pekerjaan Orang Tua</strong></label>
                                                            <p>{{ $pengajuan->pekerjaan_orang_tua }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Umur Orang Tua</strong></label>
                                                            <p>{{ $pengajuan->umur_orang_tua }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Alamat Orang Tua</strong></label>
                                                            <p>{{ $pengajuan->alamat_orang_tua }}</p>
                                                        </div>
                                                        <h6 class="fw-bold text-primary mb-3">Informasi Lainnya</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Keperluan</strong></label>
                                                            <p>{{ $pengajuan->keperluan }}</p>
                                                        </div>
                                                        <h6 class="fw-bold text-primary mb-3">Berkas Persyaratan</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Berkas KK</strong></label>
                                                            <p><a href="{{ asset('storage/' . $pengajuan->berkas_kk) }}" target="_blank">Lihat Berkas</a></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Berkas KTP</strong></label>
                                                            <p><a href="{{ asset('storage/' . $pengajuan->berkas_ktp) }}" target="_blank">Lihat Berkas</a></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"><strong>Berkas Pengantar RT</strong></label>
                                                            <p><a href="{{ asset('storage/' . $pengajuan->berkas_pengantar_rt) }}" target="_blank">Lihat Berkas</a></p>
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
                                                <form action="{{ route('sktm.updateStatus', $pengajuan->id) }}" method="POST">
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
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $pengajuanSurat->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection