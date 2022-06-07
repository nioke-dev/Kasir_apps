<div>
    <form wire:submit.prevent='storeJenisBarang'>
        <div class="form-group row mb-3">
            <label for="jenis_barang" class="col-3">Jenis Barang</label>
            <div class="col-9">
                <input type="text" id="jenis_barang" class="form-control" wire:model='jenis_barang'
                    placeholder="Type Here" autofocus>
                @error('jenis_barang')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="" class="col-3"></label>
            <div class="col-9">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan
                    Data</button>
            </div>
        </div>
    </form>
</div>


@push('page-scripts')
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.js') }}"></script>
@endpush

@push('sweet-alert-scripts')
    <script>
        window.addEventListener('swal-success', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Menambahkan Jenis Barang',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
