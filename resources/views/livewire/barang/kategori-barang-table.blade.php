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
                <th>Jenis Barang</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($kategoris->count() > 0)
                @php
                    $no = 1;
                @endphp
                @foreach ($kategoris as $kategori)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $kategori->jenis_barang }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-2" data-bs-toggle="tooltip" title="Edit"
                                wire:click="editJenisBarang({{ $kategori->id }})"><i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button class=" btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $kategori->id }})"
                                data-bs-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash"></i>
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


    <!-- Modal edit jenis Barang -->
    <div wire:ignore.self class="modal fade" id="editJenisBarang" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='editJenisBarangData'>
                        <input type="hidden" wire:model="id_edit">
                        <div class="form-group row mb-3">
                            <label for="jenisBarangEdit" class="col-3">Jenis Barang</label>
                            <div class="col-9">
                                <input type="text" id="jenisBarangEdit" class="form-control"
                                    wire:model='jenis_barang_edit' placeholder="Type Here">
                                @error('jenis_barang')
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
    <div wire:ignore.self class="modal fade" id="deleteJenisBarang" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click='resetInputs()'></button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Kategori Barang data!</h6>
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
            $('#editJenisBarang').modal('hide');
            $('#deleteJenisBarang').modal('hide');
        });

        window.addEventListener('show-edit-jenis-barang-modal', event => {
            $('#editJenisBarang').modal('show');
        });

        window.addEventListener('show-delete-jenis-barang-modal', event => {
            $('#deleteJenisBarang').modal('show');
        });

        window.addEventListener('swal-success-edit', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Mengedit Jenis Barang',
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
