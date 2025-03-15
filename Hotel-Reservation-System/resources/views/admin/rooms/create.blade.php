@extends('layouts.admin')

@section('content')
    <div class="page-wrapper bg-gray-100">
        <div class="page-content mx-auto py-6">

            <div class="flex justify-end mb-6">
                <a href="{{ url('admin/rooms') }}" class="btn btn-primary mb-3">
                    <i class='bx bx-arrow-back'></i> Back
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <form>
                        <div class="mb-4">
                            <label for="roomName" class="block text-gray-700 font-bold mb-2">Room Name</label>
                            <input type="text" id="roomName" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter room name">
                        </div>

                        <div class="mb-4">
                            <label for="roomDescription" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea id="roomDescription" rows="4" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter room description"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="roomPrice" class="block text-gray-700 font-bold mb-2">Price</label>
                            <input type="text" id="roomPrice" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter room price">
                        </div>

                        <div class="mb-4 relative">
                            <label for="facilitiesInput" class="block text-gray-700 font-bold mb-2">Facilities</label>
                            <input type="text" id="facilitiesInput" class="w-full border border-gray-300 rounded px-4 py-2" placeholder="Enter a facility">
                            <small class="text-gray-500">Search for facilities and select one from the list.</small>
                            <ul id="facilitiesDropdown" class="absolute w-full mt-2 bg-white border border-gray-300 rounded shadow-lg hidden"></ul>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Selected Facilities</label>
                            <div id="facilityTags" class="mb-2 flex flex-wrap gap-2"></div>
                        </div>

                        <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded hover:bg-gray-800">
                            Save Room
                        </button>
                    </form>
                </div>

                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Thumbnails</label>
                        <div class="border-dashed border-2 border-gray-300 p-6 rounded flex items-center justify-center">
                            <p>Drag 'n' drop some files here, or click to select files</p>
                        </div>
                        <small class="text-gray-500 mt-2 block">Upload images of the room.</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const facilities = @json($facilities);
    </script>
    <script src="{{ asset('admin/rooms-assets/rooms.js') }}"></script>
@endsection
