<?php

namespace App\Http\Livewire\Barang;

use App\Models\Kategori;
use Livewire\Component;

class AddKategoriBarang extends Component
{

    public $jenis_barang;

    public function updates()
    {
        $this->validate([
            'jenis_barang' => 'required'
        ]);
    }

    public function storeJenisBarang()
    {
        $this->validate([
            'jenis_barang' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->jenis_barang = $this->jenis_barang;

        $kategori->save();

        $this->jenis_barang = null;
        $this->dispatchBrowserEvent('swal-success', ['messege' => 'Data Berhasil Ditambahkan']);
        $this->emit('simpanKategori');
    }

    public function render()
    {
        return view('livewire.barang.add-kategori-barang');
    }
}
