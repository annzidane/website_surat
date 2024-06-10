@extends('admin.layouts.app')

@section('title', 'User Management')

@section('contents')
  <div class="container-fluid">
    <div class="card shadow-sm">
      <div class="border-start border-primary shadow-lg p-4">
        <h1>User Management</h1>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Akun</th>
                <th scope="col">Ubah Password</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $user->name }}</td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#passwordModal{{ $user->id }}">
                      <i class="fas fa-key"></i> Ubah Password
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="passwordModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel{{ $user->id }}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="passwordModalLabel{{ $user->id }}">Ubah Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('admin.user.updatePassword', $user->id) }}" method="POST">
                              @csrf
                              @method('PATCH')
                              <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                        <i class="fas fa-trash-alt"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
