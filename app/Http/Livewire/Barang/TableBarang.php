<?php

namespace App\Http\Livewire\Barang;

use App\Models\barang;
use Livewire\Component;
use App\Models\Kategori;

class TableBarang extends Component
{
    public $kode, $nama_barang, $jenis_barang, $kategori_id, $tanggal_input, $harga_beli, $harga_jual, $operator, $profit, $DetailsBarang, $stok_gudang, $stok_toko, $idEdit;
    protected $listeners = [
        'saveBarangData' => 'render',
    ];

    public function updated($key, $value)
    {
        if (in_array($key, ['harga_jual', 'harga_beli'])) {
            $calculate = (int)$this->harga_jual - (int)$this->harga_beli;
            $this->profit = $calculate;
        }
    }

    public function DetailsModalShow($id)
    {
        $DetailsBarangg = Barang::where('id', $id)->first();
        $jenis_barang_method = Kategori::where('id', $DetailsBarangg->kategori_id)->first();

        $this->kode = $DetailsBarangg->kode;
        $this->nama_barang = $DetailsBarangg->nama_barang;
        $this->jenis_barang = $jenis_barang_method->jenis_barang;
        $this->stok_toko = $DetailsBarangg->stok_toko;
        $this->stok_gudang = $DetailsBarangg->stok_gudang;
        $this->tanggal = $DetailsBarangg->tanggal;
        $this->harga_beli = $DetailsBarangg->harga_beli;
        $this->harga_jual = $DetailsBarangg->harga_jual;
        $this->profit = $DetailsBarangg->profit;
        $this->operator = $DetailsBarangg->operator;

        $this->dispatchBrowserEvent('show-modal-detail-barang');
    }

    public function closeModalDetail()
    {
        $this->kode = null;
        $this->nama_barang = null;
        $this->jenis_barang = null;
        $this->stok_toko = null;
        $this->stok_gudang = null;
        $this->tanggal = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->profit = null;
        $this->operator = null;
    }

    public function ShowEditModal($id)
    {

        $EditBarang = Barang::where('id', $id)->first();

        $this->idEdit = $EditBarang->id;
        $this->kode = $EditBarang->kode;
        $this->nama_barang = $EditBarang->nama_barang;
        $this->jenis_barang = $EditBarang->kategori_id;
        $this->stok_toko = $EditBarang->stok_toko;
        $this->stok_gudang = $EditBarang->stok_gudang;
        $this->tanggal_input = $EditBarang->tanggal;
        $this->harga_beli = $EditBarang->harga_beli;
        $this->harga_jual = $EditBarang->harga_jual;
        $this->harga_jual_terakhir = $EditBarang->harga_jual_terakhir;
        $this->profit = $EditBarang->profit;
        $this->operator = $EditBarang->operator;

        $this->dispatchBrowserEvent('show-modal-edit-barang');
    }

    public function EditBarangData()
    {
        $this->validate([
            'kode' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required',
            'tanggal_input' => 'required',
        ]);

        // edit student data        
        $barang = barang::find($this->idEdit);

        $barang->nama_barang = $this->nama_barang;
        $barang->kategori_id = $this->jenis_barang;
        $barang->harga_beli = $this->harga_beli;
        $barang->harga_jual_terakhir = $barang->harga_jual;
        $barang->harga_jual = $this->harga_jual;
        $barang->profit = $this->profit;
        $barang->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success');
    }

    public function render()
    {
        $barangs = barang::all();
        $kategoris = Kategori::all();
        return view('livewire.barang.table-barang', [
            'barangs' => $barangs,
            'kategoris' => $kategoris,
        ]);
    }
}
