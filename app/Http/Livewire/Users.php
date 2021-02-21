<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
  use WithFileUploads;

  public $users, $name, $email, $birth, $phone, $gender, $photo, $action, $live_photo, $greet;
  public $isForm, $isGreet;
  private $default_img = 'default.png';
  public $file_id;

  public function index(){
    $this->isGreet = false;
    $this->resetFields();
  }

  public function render()
  {
    $files = Storage::files('users/');
    $list_users = array();
    $user = array();
    foreach ($files as $txtfile) {
      $file = explode(',',Storage::get($txtfile));
      $user['name'] = $file[0];
      $user['email'] = $file[1];
      $user['birth'] = $file[2];
      $user['phone'] = $file[3];
      $user['gender'] = $file[4];
      $user['photo'] = (isset($file[5])?$file[5]:$this->default_img);
      $user['id'] = $txtfile;

      array_push($list_users, (object)$user);
      $user = array();
    }
    $this->users = $list_users;
    return view('livewire.users');
  }

  public function create()
  {
    $this->isForm = true;
    $this->live_photo = '';
    $this->action = 'store';
  }

  public function store()
  {
    $user = $this->validate([
      'name' => 'required|string|alpha_dash',
      'email' => 'required|email',
      'birth' => 'required|date',
      'phone' => 'required|numeric',
      'gender' => 'required|alpha',
      'photo' => 'nullable|image|max:2048'
    ]);

    if (!empty($this->photo)) {
      $photo_file = $this->photo;
      $photo_name = 'foto-'.$this->name.'-'.date('dmYHis').'.'.$photo_file->extension();
      // Storage::putFileAs('public/photo', $photo, $photo_name);
      if ($this->action=='update') {
        $del = str_replace('storage', 'public', $this->live_photo);
        Storage::delete($del);
      }
      $this->photo->storeAs('public/photo', $photo_name);
      $user['photo'] = $photo_name;
    } else {
      if ($this->action=='store') {
        $user['photo'] = $this->default_img;
      } else {
        $user['photo'] = str_replace('storage/photo/', '', $this->live_photo);
      }
    }

    $data = implode(',',$user);
    try {
      if ($this->action=='store') {
        Storage::put('users/'.$user['name'].'-'.date('dmYHis').'.txt', $data);
        // session()->flash('message', 'Submit Data Success');
        $this->greet = "Add";
      } else {
        Storage::delete($this->file_id);
        Storage::put($this->file_id, $data);
        // session()->flash('message', 'Update Data Success');
        $this->greet = "Update";
      }
      $this->isGreet = true;
      $this->resetFields();
    } catch (\Exception $e) {
      dd($e);
    }
  }

  public function edit($id)
  {
    $this->file_id = $id;
    $this->isForm = true;
    $this->action = 'update';

    $file = explode(',',Storage::get($this->file_id));

    $this->name = $file[0];
    $this->email = $file[1];
    $this->birth = $file[2];
    $this->phone = $file[3];
    $this->gender = $file[4];
    $this->live_photo = "storage/photo/".(isset($file[5])?$file[5]:$this->default_img);
  }

  public function delete($id,$pic)
  {
    if (strcasecmp($pic, $this->default_img)==0) {
      Storage::delete($id);
    } else {
      Storage::delete(["$id", "public/photo/$pic"]);
    }
    // session()->flash('message', 'Delete Data Success');
    $this->isGreet = true;
    $this->greet = "Delete";
  }

  public function resetFields()
  {
    $this->name = "";
    $this->email = "";
    $this->birth = null;
    $this->phone = "";
    $this->gender = "";
    $this->photo = "";
    $this->file_id = "";
    $this->isForm = false;
  }
}
