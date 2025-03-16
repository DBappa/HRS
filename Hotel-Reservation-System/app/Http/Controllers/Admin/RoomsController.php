<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomsController extends Controller
{

    public function index()
    {
        return view('admin.rooms.index');

    }


    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            $facilities = [
                ['id' => 1, 'name' => 'Geyser'],
                ['id' => 2, 'name' => 'Wifi'],
                ['id' => 3, 'name' => 'AC'],
                ['id' => 4, 'name' => 'TV'],
                ['id' => 5, 'name' => 'Refrigerator'],
                ['id' => 6, 'name' => 'Microwave'],
                ['id' => 7, 'name' => 'Washing Machine'],
                ['id' => 8, 'name' => 'Parking'],
                ['id' => 9, 'name' => 'Swimming Pool'],
                ['id' => 10, 'name' => 'Gym'],
                ['id' => 11, 'name' => 'Security'],
                ['id' => 12, 'name' => 'Power Backup'],
                ['id' => 13, 'name' => 'Balcony'],
                ['id' => 14, 'name' => 'Elevator']
            ];
            $statuses = [
                ['id' => 1, 'name' => 'Occupied'],
                ['id' => 2, 'name' => 'Vacant'],
                ['id' => 3, 'name' => 'Under Maintenance'],
                ['id' => 4, 'name' => 'Not In Use']
            ];
            return view('admin.rooms.create', ['facilities' => $facilities, 'statuses' => $statuses]);
        } elseif ($request->isMethod('post')) {
            try {
                // Validation rules
                $validatedData = $request->validate([
                    'roomNumber' => 'required|min:1',
                    'roomName' => 'required',
                    'roomDescription' => 'required',
                    'roomPrice' => 'required|numeric',
                    'roomCapacity' => 'required|numeric',
                    'floorNumber' => 'required|numeric',
                    'status' => 'required',
                    'facilities' => 'required',
                    'images' => 'required|array',
                ]);

                // For testing purposes, return a JSON response
                return response()->json(['message' => 'Form submitted successfully!', 'data' => $request->all()]);
            } catch (ValidationException $e) {
                return response()->json(['errors' => $e->errors()], 422);
            }
        }
    }

}
