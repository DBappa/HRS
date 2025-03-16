<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomsController extends Controller
{

    public function index()
    {
        $data = [
            [
                'roomNumber' => '101',
                'roomName' => 'Deluxe Room',
                'roomDescription' => 'A spacious room with a king-size bed.',
                'roomPrice' => 150,
                'roomCapacity' => 2,
                'floorNumber' => 1,
                'is_active' => true,
                'status' => ['id' => 1, 'status' => 'Available'],
                'facilities' => [['id' => 1, 'name' => 'AC'], ['id' => 2, 'name' => 'TV']],
                'images' => ['https://plus.unsplash.com/premium_photo-1661877303180-19a028c21048?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D.jpg'],
                'created_by' => 'user',
                'created_at' => '2023-01-01 12:00:00',
            ],
            [
                'roomNumber' => '102',
                'roomName' => 'Suite Room',
                'roomDescription' => 'A luxurious room with a separate living area.',
                'roomPrice' => 250,
                'roomCapacity' => 4,
                'floorNumber' => 1,
                'is_active' => true,
                'status' => ['id' => 1, 'status' => 'Available'],
                'facilities' => [['id' => 1, 'name' => 'AC'], ['id' => 2, 'name' => 'TV'], ['id' => 3, 'name' => 'Mini Bar']],
                'images' => ['https://plus.unsplash.com/premium_photo-1661877303180-19a028c21048?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'https://plus.unsplash.com/premium_photo-1661877303180-19a028c21048?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'],
                'created_by' => 'admin',
                'created_at' => '2023-01-05 14:00:00',
            ],
            [
                'roomNumber' => '103',
                'roomName' => 'Single Room',
                'roomDescription' => 'A cozy room for solo travelers.',
                'roomPrice' => 80,
                'roomCapacity' => 1,
                'floorNumber' => 1,
                'is_active' => true,
                'status' => ['id' => 2, 'status' => 'Occupied'],
                'facilities' => [['id' => 1, 'name' => 'AC']],
                'images' => ['room3.jpg'],
                'created_by' => 'user',
                'created_at' => '2023-01-10 10:00:00',
            ],
            [
                'roomNumber' => '201',
                'roomName' => 'Family Room',
                'roomDescription' => 'A spacious room suitable for families.',
                'roomPrice' => 200,
                'roomCapacity' => 5,
                'floorNumber' => 2,
                'is_active' => true,
                'status' => ['id' => 1, 'status' => 'Available'],
                'facilities' => [['id' => 1, 'name' => 'AC'], ['id' => 2, 'name' => 'TV'], ['id' => 4, 'name' => 'Free Breakfast']],
                'images' => ['room4.jpg', 'room4_1.jpg', 'room4_2.jpg'],
                'created_by' => 'admin',
                'created_at' => '2023-01-15 16:00:00',
            ],
            [
                'roomNumber' => '202',
                'roomName' => 'Executive Room',
                'roomDescription' => 'A premium room with additional amenities.',
                'roomPrice' => 300,
                'roomCapacity' => 2,
                'floorNumber' => 2,
                'is_active' => false,
                'status' => ['id' => 3, 'status' => 'Maintenance'],
                'facilities' => [['id' => 1, 'name' => 'AC'], ['id' => 2, 'name' => 'TV'], ['id' => 3, 'name' => 'Mini Bar'], ['id' => 5, 'name' => 'Gym Access']],
                'images' => ['room5.jpg'],
                'created_by' => 'user',
                'created_at' => '2023-01-20 18:00:00',
            ],
        ];
        
        return view('admin.rooms.index', ['data' => $data]);

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
