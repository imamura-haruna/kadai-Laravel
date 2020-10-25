<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add(){
        return view('Admin.profile.create');
    }
    
   public function create(){
        return redirect('Admin/profile/create');
    }
    
    public function edit(){
        return view('Admin.profile.edit');
    }
    
    public function update(){
        return redirect('Admin/profile/edit');
    }
}
