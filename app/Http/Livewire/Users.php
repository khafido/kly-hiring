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
    $files = Storage::files('users/');
    $users = array();
    $user = array();
    foreach ($files as $txtfile) {
      $file = explode(',',Storage::get($txtfile));
      $user['name'] = $file[0];
      $user['email'] = $file[1];
      $user['birth'] = $file[2];
      $user['phone'] = $file[3];
      $user['gender'] = $file[4];
      $user['photo'] = $file[5];
      $user['id'] = $txtfile;

      array_push($users, (object)$user);
      $user = array();
    }
    // dd((object)$users);
    return view('livewire.users', ['data_users'=>$users]);
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
      $photo_name = 'foto-'.$request->name.'-'.date('dmYHis').'.'.$photo->extension();
      Storage::putFileAs('public/photo', $photo, $photo_name);
      // $photo->move(public_path('images/photo'), $image);
    } else {
      $image = 'default.jpg';
    }

    $user['name'] = $request->name;
    $user['email'] = $request->email;
    $user['birth'] = $request->birth;
    $user['phone'] = $request->phone;
    $user['gender'] = $request->gender;
    $user['photo'] = $photo_name;

    $data = implode(',',$user);
    try {
      Storage::put('users/'.$user['name'].'-'.date('dmYHis').'.txt', $data);
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

  public function delete($id, $photo)
  {
    Storage::delete(["$id", "public/photo/$photo"]);
    // Storage::delete(["users/$id", "public/foto/$photo"]);
    session()->flash('message', 'Delete Data Success');
    return redirect('/dashboard');
  }
}
