<?php

namespace App\Http\Livewire\Barang;

use DB;
use App\Models\barang;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class TambahBarang extends Component
{
    public $kode, $nama_barang, $jenis_barang, $kategori_id, $tanggal_input, $harga_beli, $harga_jual, $profit;
    public $calculate;
    public function updated($key, $value)
    {
        if (in_array($key, ['harga_jual', 'harga_beli'])) {
            $calculate = (int)$this->harga_jual - (int)$this->harga_beli;
            $this->profit = $calculate;
        }
    }

    public function generateAutoKode()
    {
        $barang = barang::all();

        $q = DB::table('barang')->select(DB::raw('MAX(RIGHT(kode, 4)) as kode'));
        $kd = "";

        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = '0001';
        }

        $this->kode = "BRG" . $kd;
    }

    public function ressetInputsAdd()
    {
        $this->kode = null;
        $this->nama_barang = null;
        $this->jenis_barang = null;
        $this->tanggal_input = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->profit = null;
    }

    public function storeBarangData()
    {
        $this->validate([
            'kode' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'tanggal_input' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required',
        ]);

        $barang = new barang();
        $barang->kode = $this->kode;
        $barang->nama_barang = $this->nama_barang;
        $barang->kategori_id = $this->jenis_barang;
        $barang->stok_toko = 0;
        $barang->stok_gudang = 0;
        $barang->harga_beli = $this->harga_beli;
        $barang->harga_jual = $this->harga_jual;
        $barang->tanggal = $this->tanggal_input;
        $barang->operator = Auth::user()->nama;
        $barang->profit = $this->profit;
        $barang->harga_jual_terakhir = 0;

        $barang->save();

        $this->emit('saveBarangData');
        $this->dispatchBrowserEvent('swal-success');
        $this->dispatchBrowserEvent('close-modal');
        $this->ressetInputsAdd();
    }

    public function TambahBarangClick()
    {
        $this->tanggal_input = date('Y-m-d');
    }

    public function ShowModalBarangStokTokoHabis()
    {
        $this->dispatchBrowserEvent('show-modal-barang-stok-toko-habis');
    }

    public function render()
    {
        $kategoris = Kategori::all();
        return view('livewire.barang.tambah-barang', [
            'kategoris' => $kategoris,
        ]);
    }
}
