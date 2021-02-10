<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
  public $users, $name, $email, $birth, $phone, $gender, $photo;
  public $isModal = 0;

    public function index()
    {
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.users');
    }

   public function create()
   {

      return view('livewire.create');
       // $this->resetFields();
       // $this->openModal();
   }

   public function closeModal()
   {
       $this->isModal = false;
   }

   public function openModal()
   {
       $this->isModal = true;
   }

   public function resetFields()
   {
       $this->name = '';
       $this->email = '';
       $this->phone_number = '';
       $this->status = '';
       $this->member_id = '';
   }

   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|alpha_dash',
           'email' => 'required|email',
           'birth' => 'required|date',
           'phone' => 'required|numeric',
           'gender' => 'required|numeric',
           'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       $photo = $request->photo;
       if (isset($photo)) {
         $image = time().'.'.$photo->extension();
         $photo->move(public_path('images/photo'), $image);
       } else {
         $image = 'default.jpg';
       }

       $user['name'] = $request->name;
       $user['email'] = $request->email;
       $user['birth'] = $request->birth;
       $user['phone'] = $request->phone;
       $user['gender'] = $request->gender;
       $user['photo'] = $image;

       $data = implode(',',$user);
       try {
         Storage::put('users/'.$user['name'].'-'.date('ddMMYYYYHHiiss').'.txt', $data);
         return redirect('/dashboard')->with('message', 'Submit Data Success');
       } catch (\Exception $e) {
         dd($e);
       }

   }

   //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID MEMBER
   public function edit($id)
   {
       $member = Member::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
       //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
       $this->member_id = $id;
       $this->name = $member->name;
       $this->email = $member->email;
       $this->phone_number = $member->phone_number;
       $this->status = $member->status;

       $this->openModal(); //LALU BUKA MODAL
   }

   //FUNGSI INI UNTUK MENGHAPUS DATA
   public function delete($id)
   {
       $member = Member::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
       $member->delete(); //LALU HAPUS DATA
       session()->flash('message', $member->name . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
   }
}
