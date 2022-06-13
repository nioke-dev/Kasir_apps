<div>


    <table class="table table-sm table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok Toko</th>
                <th>Stok Gudang</th>
                <th>Harga</th>
                <th>Profit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($barangs->count() > 0)
                @php
                    $no = 1;
                @endphp
                @foreach ($barangs as $barang)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $barang->kode }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori->jenis_barang }}</td>
                        <td>{{ $barang->stok_toko }}</td>
                        <td>{{ $barang->stok_gudang }}</td>
                        <td>{{ $barang->harga_jual }}</td>
                        <td>{{ $barang->profit }}</td>
                        <td>
                            <button wire:click="DetailsModalShow({{ $barang->id }})" class="btn btn-info btn-sm"
                                data-bs-toggle="tooltip" title="Details"><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit"
                                wire:click="ShowEditModal({{ $barang->id }})"><i class="fas fa-pen"></i>
                            </button>
                            <button class=" btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $barang->id }})"
                                data-bs-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" style="text-align: center;"><small>Barang not Found</small></td>
                </tr>
            @endif
        </tbody>
    </table>


    <!-- Modal Detail Barang v1 -->
    <div wire:ignore.self class="modal fade " id="ModalDetailBarang" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group-sm row mb-3">
                                <label for="kode" class="col-3" class="form-label">Kode Barang
                                    :</label>
                                <div class="col-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kode" placeholder="Type Here"
                                            wire:model='kode'>
                                    </div>
                                    @error('kode')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group-sm row mb-3">
                                <label for="nama_barang" class="col-3">Nama Barang :</label>
                                <div class="col-9">
                                    <input type="text" id="nama_barang" class="form-control" wire:model='nama_barang'
                                        placeholder="Type Here">
                                    @error('nama_barang')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group-sm row mb-3">
                                <label for="jenis_barang" class="col-3">Jenis Barang :</label>
                                <div class="col-9">
                                    <input type="text" id="jenis Barang" class="form-control"
                                        wire:model='jenis_barang' placeholder="Type Here">
                                    @error('jenis_barang')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group-sm row mb-3">
                                <label for="tanggal_input" class="col-3">Tanggal Input :</label>
                                <div class="col-9">
                                    <input type="date" id="tanggal_input" class="form-control"
                                        wire:model='tanggal_input'>
                                    @error('tanggal_input')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group-sm row mb-3">
                                <label for="harga_beli" class="col-3">Harga Beli :</label>
                                <div class="col-9">
                                    <input type="number" id="harga_beli" class="form-control" wire:model='harga_beli'
                                        placeholder="Type Here">
                                    @error('harga_beli')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group-sm row mb-3">
                                <label for="harga_jual" class="col-3">Harga jual :</label>
                                <div class="col-9">
                                    <input type="number" id="harga_jual" class="form-control" wire:model='harga_jual'
                                        placeholder="Type Here">
                                    @error('harga_jual')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group-sm row mb-3">
                                <label for="profit" class="col-3">Profit :</label>
                                <div class="col-9">
                                    <input type="number" id="profit" class="form-control" wire:model='profit'
                                        placeholder="Type Here" disabled>
                                    @error('profit')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fas fa-xmark"></i>Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Detail Barang v2 -->
    <div wire:ignore.self class="modal fade " id="ModalDetailBarangV2" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModalDetail"></button>
                </div>
                <div class="modal-body">
                    {{-- @dd($DetailsBarang) --}}
                    {{-- @foreach ($DetailsBarang as $Detail) --}}
                    <div class="container">
                        <table class="table table-borderless">
                            <tr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <td>Kode Barang</td>
                                        <td>:</td>
                                        <td><span class="badge bg-primary">{{ $kode }}</span> </td>
                                    </div>
                                    <div class="col-lg-6">
                                        <td>Nama Barang</td>
                                        <td>:</td>
                                        <td>{{ $nama_barang }}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <td>Jenis Barang</td>
                                        <td>:</td>
                                        <td>{{ $jenis_barang }} </td>
                                    </div>
                                    <div class="col-lg-6">
                                        <td>Stok Toko</td>
                                        <td>:</td>
                                        <td>{{ $stok_toko }}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>Fitur Mendatang</td>
                                    </div>
                                    <div class="col-lg-6">
                                        <td>Harga Beli</td>
                                        <td>:</td>
                                        <td>{{ $harga_beli }}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <td>Harga Jual</td>
                                        <td>:</td>
                                        <td>{{ $harga_jual }}</td>
                                    </div>
                                    <div class="col-lg-6">
                                        <td>Profit</td>
                                        <td>:</td>
                                        <td>{{ $profit }}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <td>Stok Gudang</td>
                                        <td>:</td>
                                        <td>{{ $stok_gudang }}</td>
                                    </div>
                                    <div class="col-lg-6">
                                        <td>Operator</td>
                                        <td>:</td>
                                        <td>{{ $operator }}</td>
                                    </div>
                                </div>
                            </tr>
                        </table>
                    </div>
                    {{-- @endforeach --}}
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        wire:click="closeModalDetail"><i class="fas fa-xmark me-2"></i>Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Barang -->
    <div wire:ignore.self class="modal fade " id="modalEditbarang" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='EditBarangData'>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group-sm row mb-3">
                                    <label for="kode" class="col-3" class="form-label">Kode Barang
                                        :</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kode" placeholder="Type Here"
                                                wire:model='kode' disabled>
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
                                    <label for="stok_toko" class="col-3">Stok Toko :</label>
                                    <div class="col-9">
                                        <input type="number" id="stok_toko" class="form-control"
                                            wire:model='stok_toko' placeholder="Type Here" disabled>
                                        @error('stok_toko')
                                            <span class="text-danger"
                                                style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group-sm row mb-3">
                                    <label for="stok_gudang" class="col-3">Stok Gudang :</label>
                                    <div class="col-9">
                                        <input type="number" id="stok_gudang" class="form-control"
                                            wire:model='stok_gudang' placeholder="Type Here" disabled>
                                        @error('stok_gudang')
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
                                    <label for="harga_jual_terakhir" class="col-3">Harga jual Terakhir
                                        :</label>
                                    <div class="col-9">
                                        <input type="number" id="harga_jual_terakhir" class="form-control"
                                            wire:model='harga_jual_terakhir' placeholder="Type Here" disabled>
                                        @error('harga_jual_terakhir')
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
                                        <input type="number" id="profit" class="form-control"
                                            style="background-color: green; opacity: 0.6; color: white"
                                            wire:model='profit' placeholder="Type Here" disabled>
                                        @error('profit')
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
            $('#modalEditbarang').modal('hide');
        });
        window.addEventListener('show-modal-detail-barang', function(e) {
            $('#ModalDetailBarangV2').modal('show');
        });
        window.addEventListener('show-modal-edit-barang', function(e) {
            $('#modalEditbarang').modal('show');
        });
        window.addEventListener('swal-success', function(e) {
            Swal.fire({
                icon: 'success',
                title: 'Goof Job!',
                text: 'Berhasil mengedit Barang',
                timer: 1500,
                toast: true
            })
        });
    </script>
@endpush
