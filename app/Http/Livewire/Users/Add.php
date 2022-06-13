<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Add extends Component
{
    public $nama, $email, $password, $alamat, $no_telp, $level;

    public function updated($fields)
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

    public function generateAutoPass()
    {
        $this->password = Str::random(8);
    }

    public function resetInputs()
    {
        $this->nama = null;
        $this->email = null;
        $this->password = null;
        $this->alamat = null;
        $this->no_telp = null;
        // $this->level = 'null'; 
    }

    public function storeUserData()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'level' => 'required',
        ]);

        $users = new User();
        $users->nama = $this->nama;
        $users->email = $this->email;
        $users->password = $this->password;
        $users->alamat = $this->alamat;
        $users->no_telp = $this->no_telp;
        $users->level = $this->level;

        $users->save();

        $this->resetInputs();
        $this->emit('userAdded');
        $this->dispatchBrowserEvent('swal-success');
    }


    public function render()
    {
        return view('livewire.users.add');
    }
}
