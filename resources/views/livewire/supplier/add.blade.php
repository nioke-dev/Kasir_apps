<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addSupplier">
        <i class="fa-solid fa-circle-plus"></i> Add Supplier
    </button>

    <!-- Modal add supplier -->
    <div wire:ignore.self class="modal fade" id="addSupplier" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='storeSupplierData'>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-3">Nama Supplier</label>
                            <div class="col-9">
                                <input type="text" id="nama" class="form-control" wire:model='nama'
                                    placeholder="Type Here">
                                @error('nama')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-3">Email Supplier</label>
                            <div class="col-9">
                                <input type="email" id="email" class="form-control" wire:model='email'
                                    placeholder="Type Here">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-3">alamat</label>
                            <div class="col-9">
                                <textarea class="form-control" placeholder="Type here" wire:model='alamat'></textarea>
                                @error('alamat')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="no_telp" class="col-3">No Telephone / WA</label>
                            <div class="col-9">
                                <input type="text" id="no_telp" class="form-control" wire:model='no_telp'
                                    placeholder="Type Here">
                                @error('no_telp')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add Supplier</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
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
            $('#addSupplier').modal('hide');
        });
        window.addEventListener('swal-success', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Menambahkan Supplier',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
