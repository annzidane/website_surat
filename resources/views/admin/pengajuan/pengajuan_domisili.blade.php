@extends('admin.layouts.app')

@section('title', 'Surat Domisili')

@section('contents')
    <div class="container">
        <h1>Daftar Pengajuan Surat Domisili</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pengaju</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuanSurat as $pengajuan)
                <tr>
                    <th scope="row">{{ $pengajuan->id }}</th>
                    <td>{{ $pengajuan->user->name }}</td>
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
                        <!-- Button trigger modal for Preview -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#previewModal{{ $pengajuan->id }}">
                            Preview
                        </button>

                        <!-- Preview Modal -->
                        <div class="modal fade" id="previewModal{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="previewModalLabel{{ $pengajuan->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="previewModalLabel{{ $pengajuan->id }}">Detail Pengajuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <p>{{ $pengajuan->nama }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tempat Lahir</label>
                                                    <p>{{ $pengajuan->tempat_lahir }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Lahir</label>
                                                    <p>{{ $pengajuan->tanggal_lahir }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">NIK</label>
                                                    <p>{{ $pengajuan->nik }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <p>{{ $pengajuan->jenis_kelamin }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Status Pernikahan</label>
                                                    <p>{{ $pengajuan->status_pernikahan }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <p>{{ $pengajuan->alamat }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Berkas Persyaratan</label>
                                                    <p>
                                                        <a href="{{ asset('storage/' . $pengajuan->berkas_persyaratan) }}" target="_blank">Lihat Berkas</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        @if($pengajuan->status == 'Selesai')
                                            <a href="{{ route('domisili.cetak', $pengajuan->id) }}" class="btn btn-primary">Cetak</a>
                                        @else
                                            <button type="button" class="btn btn-primary" disabled>Cetak</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Button trigger modal for Ubah Status -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pengajuan->id }}">
                            Ubah Status
                        </button>

                        <!-- Ubah Status Modal -->
                        <div class="modal fade" id="exampleModal{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status dan Keterangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('surat.updateStatus', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
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
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengajuan->keterangan }}" placeholder="Masukkan keterangan">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
@endsection
