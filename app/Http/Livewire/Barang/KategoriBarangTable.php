<?php

namespace App\Http\Livewire\Barang;

use App\Models\Kategori;
use Livewire\Component;

class KategoriBarangTable extends Component
{

    protected $listeners = [
        'simpanKategori' => 'render',
    ];

    public $jenis_barang_edit, $jenis_barang_id;

    public function editJenisBarang($id)
    {
        $kategori = Kategori::find($id);

        $this->jenis_barang_edit = $kategori->jenis_barang;
        $this->id_edit = $kategori->id;

        $this->dispatchBrowserEvent('show-edit-jenis-barang-modal');
    }

    public function editJenisBarangData()
    {
        $this->validate([
            'jenis_barang_edit' => 'required',
        ]);

        // edit student data        
        $kategori = Kategori::find($this->id_edit);
        $kategori->jenis_barang = $this->jenis_barang_edit;
        $kategori->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-edit');
    }

    public function resetInputs()
    {
        $this->jenis_barang_edit = null;
        $this->id_edit = null;
    }

    public function deleteConfirmation($id)
    {
        $this->jenis_barang_id = $id;
        $this->dispatchBrowserEvent('show-delete-jenis-barang-modal');
    }

    public function deleteSupplierData()
    {
        $kategori = Kategori::find($this->jenis_barang_id);
        $kategori->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-delete');
        $this->jenis_barang_id = null;
    }

    public function cancel()
    {
        $this->jenis_barang_id = null;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $kategori = Kategori::all();
        return view('livewire.barang.kategori-barang-table', [
            'kategoris' => $kategori
        ]);
    }
}
