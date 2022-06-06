<div>
    {{-- <div class="row mb-3">
        <div class="col-md-12">
            <input type="search" class="form-control w-25" placeholder="search" wire:model="searchTerm"
                style="float: right;" />
        </div>
    </div> --}}

    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Telepon / WA</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($supplier->count() > 0)
                @php
                    $no = 1;
                @endphp
                @foreach ($supplier as $suppliers)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $suppliers->nama }}</td>
                        <td>{{ $suppliers->email }}</td>
                        <td>{{ $suppliers->alamat }}</td>
                        <td>{{ $suppliers->no_telp }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2" data-bs-toggle="tooltip" title="Edit"
                                wire:click="editSupplier({{ $suppliers->id }})"><i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button class=" btn btn-sm btn-danger"
                                wire:click="deleteConfirmation({{ $suppliers->id }})" data-bs-toggle="tooltip"
                                title="Delete"><i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center;"><small>Supplier not Found</small></td>
                </tr>
            @endif

        </tbody>
    </table>


    <!-- Modal edit Supplier -->
    <div wire:ignore.self class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='editSupplierData'>
                        <input type="hidden" wire:model="id_edit">
                        <div class="form-group row mb-3">
                            <label for="name" class="col-3">Nama Supplier</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control" wire:model='nama_edit'
                                    placeholder="Type Here">
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-3">Email Supplier</label>
                            <div class="col-9">
                                <input type="email" id="name" class="form-control" wire:model='email_edit'
                                    placeholder="Type Here">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-3">Alamat</label>
                            <div class="col-9">
                                <textarea class="form-control" placeholder="Type here" wire:model="alamat_edit"></textarea>
                                @error('address')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-3">No Telephon / WA</label>
                            <div class="col-9">
                                <textarea class="form-control" placeholder="Type here" wire:model="no_telp_edit"></textarea>
                                @error('no_telp')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-warning">Edit Supplier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete Supplier --}}
    <div wire:ignore.self class="modal fade" id="deleteSupplier" tabindex="-1" role="dialog"
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
                    <button class="btn btn-sm btn-danger" wire:click='deleteSupplierData()'>Yes! Delete</button>
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
            $('#editSupplier').modal('hide');
            $('#deleteSupplier').modal('hide');
        });

        window.addEventListener('show-edit-supplier-modal', event => {
            $('#editSupplier').modal('show');
        });

        window.addEventListener('show-delete-supplier-modal', event => {
            $('#deleteSupplier').modal('show');
        });

        window.addEventListener('swal-success-edit', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Mengedit Supplier',
                timer: 1500,
                toast: true
            })
        });

        window.addEventListener('swal-success-delete', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Menghapus Supplier',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
