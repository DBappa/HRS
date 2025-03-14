<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    
    public function index(){

        return view('admin.rooms.index');

    }


    public function create(){

        return view('admin.rooms.create');

    }
}
