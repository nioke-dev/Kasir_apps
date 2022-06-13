<div>
    <form wire:submit.prevent='storeUserData'>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nama</label>
            <div>
                <input type="text" id="nama" class="form-control" wire:model='nama' placeholder="Type Here" autofocus>
                @error('nama')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <div>
                <input type="email" id="email" class="form-control" wire:model='email' placeholder="Type Here">
                @error('email')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="text" class="form-control" id="password" placeholder="Type Here" wire:model='password'>
                <button class="btn btn-outline-success" type="button" id="button-addon2"
                    wire:click='generateAutoPass'>Auto</button>
            </div>
            @error('password')
                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <div>
                <textarea class="form-control" placeholder="Type here" wire:model='alamat'></textarea>
                @error('alamat')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="no_telp" class="form-label">No Telephone / WA</label>
            <div>
                <input type="text" id="no_telp" class="form-control" wire:model='no_telp' placeholder="Type Here">
                @error('no_telp')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="level" class="form-label">Level</label>
            <div>
                <select class="form-select" aria-label="Default select example" wire:model="level">
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="gudang">Gudang</option>
                </select>
                @error('level')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Add Users</button>
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
                text: 'Berhasil Menambahkan Users',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
