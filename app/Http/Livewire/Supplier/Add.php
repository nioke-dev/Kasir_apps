<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class Add extends Component
{
    public $nama;
    public $email;
    public $alamat;
    public $no_telp;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'numeric|required',
        ]);
    }

    public function storeSupplierData()
    {
        // on form submit validation
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'numeric|required',
        ]);

        Alert::success('Success Title', 'Success Message');

        // Add Student Data
        $supliers = new Supplier();
        $supliers->nama = $this->nama;
        $supliers->email = $this->email;
        $supliers->alamat = $this->alamat;
        $supliers->no_telp = $this->no_telp;

        $supliers->save();


        $this->nama = null;
        $this->email = null;
        $this->alamat = null;
        $this->no_telp = null;

        // For Hide Modal after add student success
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success', ['messege' => 'Data Berhasil Ditambahkan']);

        $this->emit('updateSuppliers');
    }

    public function render()
    {
        return view('livewire.supplier.add');
    }
}
