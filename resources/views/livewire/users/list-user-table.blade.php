<div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2" data-bs-toggle="tooltip" title="Edit"
                                wire:click="editUser({{ $user->id }})"><i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button class=" btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $user->id }})"
                                data-bs-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal edit Users -->
    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='editUserData'>
                        <input type="hidden" wire:model="id_edit">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Supplier</label>
                            <input type="text" id="name" class="form-control" wire:model='nama_edit'
                                placeholder="Type Here">
                            @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Email Supplier</label>
                            <input type="email" id="name" class="form-control" wire:model='email_edit'
                                placeholder="Type Here">
                            @error('email')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Alamat</label>
                            <textarea class="form-control" placeholder="Type here" wire:model="alamat_edit"></textarea>
                            @error('address')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">No Telephon / WA</label>
                            <textarea class="form-control" placeholder="Type here" wire:model="no_telp_edit"></textarea>
                            @error('no_telp')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="level" class="form-label">Level</label>
                            <div>
                                <select class="form-select" aria-label="Default select example"
                                    wire:model="level_edit">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="gudang">Gudang</option>
                                </select>
                                @error('level')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-warning">Edit Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete Supplier --}}
    <div wire:ignore.self class="modal fade" id="deleteUser" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='resetInputs()'></button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Supplier data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click='cancel()'>Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click='deleteUserData()'>Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

















</div>
@push('page-scripts')
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.js') }}"></script>
@endpush


@push('sweet-alert-scripts')
    <script>
        window.addEventListener('close-modal', function(e) {
            $('#editUser').modal('hide');
            $('#deleteUser').modal('hide');
        });

        window.addEventListener('show-edit-user-modal', event => {
            $('#editUser').modal('show');
        });

        window.addEventListener('show-delete-user-modal', event => {
            $('#deleteUser').modal('show');
        });

        window.addEventListener('swal-success-edit', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Mengedit User',
                timer: 1500,
                toast: true
            })
        });

        window.addEventListener('swal-success-delete', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Menghapus User',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
