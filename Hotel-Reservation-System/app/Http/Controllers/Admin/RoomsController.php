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
        $facilities = [
            1 => 'Geyser',
            2 => 'Wifi', 
            3 => 'AC', 
            4 => 'TV', 
            5 => 'Refrigerator', 
            6 => 'Microwave', 
            7 => 'Washing Machine', 
            8 => 'Parking', 
            9 => 'Swimming Pool', 
            10 => 'Gym',
            11 => 'Security', 
            12 => 'Power Backup', 
            13 => 'Balcony', 
            14 => 'Elevator'
        ];
        return view('admin.rooms.create', ['facilities' => $facilities]);

    }
}
