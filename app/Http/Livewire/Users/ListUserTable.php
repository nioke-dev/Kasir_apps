<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ListUserTable extends Component
{
    public $nama_edit, $alamat_edit, $email_edit, $no_telp_edit, $level_edit, $id_edit, $user_delete_id;

    public $listeners = [
        'userAdded' => 'render',
    ];

    public function resetInputs()
    {
        $this->nama = null;
        $this->email = null;
        $this->password = null;
        $this->alamat = null;
        $this->no_telp = null;
        // $this->level = 'null'; 
    }

    public function updates($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'level' => 'required',
        ]);
    }

    public function editUser($id)
    {
        $user = User::find($id);

        $this->nama_edit = $user->nama;
        $this->email_edit = $user->email;
        $this->alamat_edit = $user->alamat;
        $this->no_telp_edit = $user->no_telp;
        $this->level_edit = $user->level_edit;
        $this->id_edit = $user->id;

        $this->dispatchBrowserEvent('show-edit-user-modal');
    }

    public function editUserData()
    {
        $this->validate([
            'nama_edit' => 'required',
            'email_edit' => 'required|email',
            'alamat_edit' => 'required',
            'no_telp_edit' => 'numeric|required',
            'level_edit' => 'required',
        ]);

        // edit student data        
        $user = User::find($this->id_edit);
        $user->nama = $this->nama_edit;
        $user->email = $this->email_edit;
        $user->alamat = $this->alamat_edit;
        $user->no_telp = $this->no_telp_edit;
        $user->level = $this->level_edit;
        $user->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-edit');
    }


    public function deleteConfirmation($id)
    {
        $this->user_delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-user-modal');
    }

    public function deleteUserData()
    {
        $user = User::find($this->user_delete_id);
        $user->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal-success-delete');
        $this->user_delete_id = null;
    }

    public function cancel()
    {
        $this->user_delete_id = null;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.users.list-user-table', ['users' => $users]);
    }
}
