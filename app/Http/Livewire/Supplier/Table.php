<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class Table extends Component
{
    public $nama_edit, $alamat_edit, $email_edit, $no_telp_edit, $id_edit;
    public $supplier_delete_id;

    protected $listeners = [
        'updateSuppliers' => 'render',
    ];

    public function editSupplier($id)
    {
        $supplier = Supplier::find($id);

        $this->nama_edit = $supplier->nama;
        $this->email_edit = $supplier->email;
        $this->alamat_edit = $supplier->alamat;
        $this->no_telp_edit = $supplier->no_telp;
        $this->id_edit = $supplier->id;

        $this->dispatchBrowserEvent('show-edit-supplier-modal');
    }

    public function editSupplierData()
    {
        $this->validate([
            'nama_edit' => 'required',
            'email_edit' => 'required|email',
            'alamat_edit' => 'required',
            'no_telp_edit' => 'numeric|required',
        ]);

        // edit student data        
        $supplier = Supplier::find($this->id_edit);
        $supplier->nama = $this->nama_edit;
        $supplier->email = $this->email_edit;
        $supplier->alamat = $this->alamat_edit;
        $supplier->no_telp = $this->no_telp_edit;
        $supplier->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-edit');
    }

    public function resetInputs()
    {
        $this->nama_edit = null;
        $this->email_edit = null;
        $this->alamat_edit = null;
        $this->no_telp_edit = null;
        $this->id_edit = null;
    }

    public function deleteConfirmation($id)
    {
        $this->supplier_delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-supplier-modal');
    }

    public function deleteSupplierData()
    {
        $supplier = Supplier::find($this->supplier_delete_id);
        $supplier->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-delete');
        $this->supplier_delete_id = null;
    }

    public function cancel()
    {
        $this->supplier_delete_id = null;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $supplier = Supplier::all();

        return view('livewire.supplier.table', [
            'supplier' => $supplier
        ]);
    }
}
