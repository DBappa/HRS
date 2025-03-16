@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Search and Filter -->
            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex gap-2 align-middle mb-3 max-w-100">
                    <input type="text" id="search" class="form-control w-80" placeholder="Search rooms...">
                    <select id="filter" class="form-select w-50">
                        <option value="">Filter</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>
                <!-- Add Room Button -->
                <a href="{{ url('admin/rooms/create') }}" class="btn btn-primary mb-3">Add New Room</a>
            </div>

            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Room</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Name</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Price</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Capacity</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Facilities</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Active</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $room)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <!-- Room Number -->
                                <td class="px-5 py-5 text-sm">
                                    <p class="text-gray-900 whitespace-nowrap">{{ $room['roomNumber'] }}</p>
                                    <p class="text-gray-500 text-xs text-nowrap">Floor {{ $room['floorNumber'] }}</p>
                                </td>

                                <!-- Room Name & Description -->
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex flex-col">
                                        <p class="text-gray-900 font-medium">{{ $room['roomName'] }}</p>
                                        <p class="text-gray-500 text-xs mt-1">{{ Str::limit($room['roomDescription'], 40) }}
                                        </p>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-5 py-5 text-sm">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $room['status']['status'] === 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $room['status']['status'] }}
                                    </span>
                                </td>

                                <!-- Price -->
                                <td class="px-5 py-5 text-sm">
                                    <p class="text-gray-900">${{ number_format($room['roomPrice'], 2) }}</p>
                                    <p class="text-gray-500 text-xs">per night</p>
                                </td>

                                <!-- Capacity -->
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <span class="mr-2">👤</span>
                                        {{ $room['roomCapacity'] }}
                                    </div>
                                </td>

                                <!-- Facilities -->
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($room['facilities'] as $facility)
                                            <span class="px-2 py-1 bg-gray-100 rounded-full text-xs">
                                                {{ $facility['name'] }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>

                                <!-- Image -->
                                <td class="px-5 py-5 text-sm">
                                    <div class="relative group">
                                        <img class="w-16 h-12 rounded object-cover cursor-zoom-in"
                                            src="{{ asset('storage/' . $room['images'][0]) }}" alt="Room image"
                                            onclick="zoomImage(this)">
                                        @if (count($room['images']) > 1)
                                            <div
                                                class="absolute bottom-0 right-0 bg-black bg-opacity-50 text-white text-xs px-1 rounded">
                                                +{{ count($room['images']) - 1 }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <!-- Active Status -->
                                <td class="px-5 py-5 text-sm">
                                    <div
                                        class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" id="toggle-{{ $room['roomNumber'] }}"
                                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                                            {{ $room['is_active'] ? 'checked' : '' }}
                                            data-room-id="{{ $room['roomNumber'] }}" />
                                        <label for="toggle-{{ $room['roomNumber'] }}"
                                            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
                                        </label>
                                    </div>
                                </td>


                                <!-- Actions -->
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex gap-4">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pt-3 flex justify-center card mt-2 items-center">
                <nav class="block">
                    <ul class="flex pl-0 rounded list-none flex-wrap">
                        <li class="mr-2">
                            <a href="#" class="p-2 text-blue-500 hover:text-blue-700">&laquo;</a>
                        </li>
                        <li class="mr-2">
                            <a href="#" class="p-2 text-blue-500 hover:text-blue-700">1</a>
                        </li>
                        <li class="mr-2">
                            <a href="#" class="p-2 text-blue-500 hover:text-blue-700">&raquo;</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            function zoomImage(img) {
                const modal = document.getElementById('imageModal');
                const zoomedImg = document.getElementById('zoomedImage');
                zoomedImg.src = img.src;
                modal.classList.remove('hidden');

                modal.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            }
        </script>

        <style>
            .toggle-checkbox:checked {
                right: 0;
                border-color: #3B82F6;
            }

            .toggle-checkbox:checked+.toggle-label {
                background-color: #3B82F6;
            }

            .toggle-label::before {
                content: "";
                position: absolute;
                top: 1px;
                left: 1px;
                width: 4px;
                height: 4px;
                background-color: white;
                transition: transform 0.3s;
                transform: translateX(0);
            }

            .toggle-checkbox:checked+.toggle-label::before {
                transform: translateX(100%);
            }
        </style>
    @endsection
