<div>
    <button class="btn btn-sm btn-primary text-end" type="button" wire:click="ShowModalBarangStokTokoHabis">barang stok
        habis</button>
    <button class="btn btn-sm btn-primary text-end" type="button" data-bs-toggle="modal"
        data-bs-target="#modalTambahbarang" wire:click="TambahBarangClick">Tambah Barang</button>



    <!-- Modal Tambah Barang -->
    <div wire:ignore.self class="modal fade " id="modalTambahbarang" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='storeBarangData'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group-sm row mb-3">
                                    <label for="kode" class="col-3" class="form-label">Kode Barang
                                        :</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kode" placeholder="Type Here"
                                                wire:model='kode'>
                                            <button class="btn btn-outline-success" type="button" id="button-addon2"
                                                wire:click='generateAutoKode'>Auto</button>
                                        </div>
                                        @error('kode')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group-sm row mb-3">
                                    <label for="nama_barang" class="col-3">Nama Barang :</label>
                                    <div class="col-9">
                                        <input type="text" id="nama_barang" class="form-control"
                                            wire:model='nama_barang' placeholder="Type Here">
                                        @error('nama_barang')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-sm row mb-3">
                                    <label for="jenis_barang" class="col-3">Jenis Barang :</label>
                                    <div class="col-9">
                                        <select class="form-select" wire:model="jenis_barang">
                                            <option selected>Open this select menu</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->jenis_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jenis_barang')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-sm row mb-3">
                                    <label for="tanggal_input" class="col-3">Tanggal Input :</label>
                                    <div class="col-9">
                                        <input type="date" id="tanggal_input" class="form-control"
                                            wire:model='tanggal_input'>
                                        @error('tanggal_input')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group-sm row mb-3">
                                    <label for="harga_beli" class="col-3">Harga Beli :</label>
                                    <div class="col-9">
                                        <input type="number" id="harga_beli" class="form-control"
                                            wire:model='harga_beli' placeholder="Type Here">
                                        @error('harga_beli')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-sm row mb-3">
                                    <label for="harga_jual" class="col-3">Harga jual :</label>
                                    <div class="col-9">
                                        <input type="number" id="harga_jual" class="form-control"
                                            wire:model='harga_jual' placeholder="Type Here">
                                        @error('harga_jual')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-sm row mb-3">
                                    <label for="profit" class="col-3">Profit :</label>
                                    <div class="col-9">
                                        <input type="number" id="profit" class="form-control" wire:model='profit'
                                            placeholder="Type Here" disabled>
                                        @error('profit')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="container">
                    <div class="text-start">
                        <label for="catatan" style="color: red;">*catatan :</label><br>
                        <table>
                            <tr>
                                <td style="color: blue; font-weight: bold;">Profit</td>
                                <td style="color: blue; font-weight: bold;"> : </td>
                                <td class="fw-bold">Keuntungan Dan Harga Jual Dikurangi Harga Beli</td>
                            </tr>
                            <tr>
                                <td style="color: blue; font-weight: bold;">Harga Beli</td>
                                <td style="color: blue; font-weight: bold;"> : </td>
                                <td class="fw-bold">Harga Per - Satuan Dari Supplier</td>
                            </tr>
                            <tr>
                                <td style="color: blue; font-weight: bold;">Harga Jual</td>
                                <td style="color: blue; font-weight: bold;"> : </td>
                                <td class="fw-bold">Harga Yang Dijual Oleh Pemilik Toko</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Daftar Barang Stok Toko Habis -->
    <div class="modal fade" id="DaftarBarangStokTokoHabis" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Daftar barang Stok Toko Habis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama barang</th>
                                    <th>Kategori</th>
                                    <th>Stok Toko</th>
                                    <th>Stok Gudang</th>
                                    <th>Harga</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-css')
    <style>
        .modal-lg {
            max-width: 1000px;
        }
    </style>
@endpush

@push('page-scripts')
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.js') }}"></script>
@endpush

@push('sweet-alert-scripts')
    <script>
        window.addEventListener('close-modal', function(e) {
            $('#modalTambahbarang').modal('hide');
        });
        window.addEventListener('show-modal-barang-stok-toko-habis', function(e) {
            $('#DaftarBarangStokTokoHabis').modal('show');
        });
        window.addEventListener('swal-success', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil Menambahkan Barang',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
