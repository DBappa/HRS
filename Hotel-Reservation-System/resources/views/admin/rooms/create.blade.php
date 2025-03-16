@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-content mx-auto py-6">

            <div class="flex justify-end">
                <a href="{{ url('admin/rooms') }}" class="btn btn-primary mb-3">
                    <i class='bx bx-arrow-back'></i> Back
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 card p-4">
                <div>
                    <form>
                        <div class="mb-4 flex w-full gap-2">
                            <div class="w-1/4">
                                <label for="roomNumber" class="block text-gray-700 font-bold mb-2">Room Number</label>
                                <input type="number" id="roomNumber"
                                    class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter room number">
                            </div>
                            <div class="w-3/4">
                                <label for="roomName" class="block text-gray-700 font-bold mb-2">Name</label>
                                <input type="text" id="roomName" class="w-full border border-gray-300 rounded px-4 py-2"
                                    placeholder="Enter room name">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="roomDescription" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea id="roomDescription" rows="4" class="w-full border border-gray-300 rounded px-4 py-2"
                                placeholder="Enter room description"></textarea>
                        </div>

                        <div class="mb-4 flex w-full gap-2">
                            <div class="w-1/2">
                                <label for="roomPrice" class="block text-gray-700 font-bold mb-2">Price</label>
                                <input type="text" id="roomPrice" class="w-full border border-gray-300 rounded px-4 py-2"
                                    placeholder="Enter room price">
                            </div>
                            <div class="w-1/2">
                                <label for="roomCapacity" class="block text-gray-700 font-bold mb-2">Capacity</label>
                                <input type="number" id="roomCapacity"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    placeholder="Enter room capacity">
                            </div>
                        </div>

                        <div class="mb-4 flex w-full gap-2">
                            <div class="w-1/2">
                                <label for="floorNumber" class="block text-gray-700 font-bold mb-2">Floor Number</label>
                                <input type="number" id="floorNumber"
                                    class="w-full border border-gray-300 rounded px-4 py-2"
                                    placeholder="Enter floor number">
                            </div>
                            <div class="w-1/2">
                                <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                                <select id="status"
                                    class="border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2 px-4 focus:outline-none">
                                    <option selected>Choose a status</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 relative">
                            <label for="facilitiesInput" class="block text-gray-700 font-bold mb-2">Amenities</label>
                            <input type="text" id="facilitiesInput"
                                class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter an amenity">
                            <small class="text-gray-500">Search for facilities and select one from the list.</small>
                            <ul id="facilitiesDropdown"
                                class="absolute w-full mt-2 bg-white border border-gray-300 rounded shadow-lg hidden max-h-40 overflow-y-auto">
                            </ul>
                        </div>

                        <div class="mb-4">
                            <input type="hidden" id="hiddenFacilitiesInput" name="hiddenFacilities">

                            <label class="block text-gray-700 font-bold mb-2">Selected Amenities</label>
                            <div id="facilityTags" class="mb-2 flex flex-wrap gap-2"></div>
                        </div>

                        <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-800">
                            Save Room
                        </button>
                    </form>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Thumbnails</label>
                    <div id="dropzone"
                        class="border-dashed border-2 border-gray-300 p-6 rounded flex flex-col items-center justify-center cursor-pointer h-2/5 hover:border-blue-500"
                        ondrop="handleDrop(event)" ondragover="handleDragOver(event)"
                        onclick="document.getElementById('fileInput').click()">
                        <p>Drag 'n' drop some files here, or click to select files</p>
                        <input id="fileInput" type="file" accept="image/*" multiple class="hidden"
                            onchange="handleFiles(this.files)" />
                    </div>
                    <small class="text-gray-500 mt-2 block">Upload images of the room.</small>

                    <!-- Preview Section -->
                    <div id="previewContainer" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 max-h-72 overflow-y-auto">
                        <!-- Image previews will be dynamically added here -->
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const facilities = @json($facilities);
        const createRoomUrl = "{{ route('admin.rooms.create') }}";
    </script>
    <script src="{{ asset('admin/rooms-assets/rooms.js') }}"></script>
@endsection
