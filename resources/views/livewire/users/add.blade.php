<div>
    <form wire:submit.prevent='storeSupplierData'>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nama</label>
            <div>
                <input type="text" id="nama" class="form-control" wire:model='nama' placeholder="Type Here">
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
            <div>
                <input type="password" id="password" class="form-control" wire:model='password'
                    placeholder="Type Here">
                @error('email')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
            </div>
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
        <button type="submit" class="btn btn-sm btn-primary">Add Supplier</button>
    </form>
</div>
