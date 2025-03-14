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

            <!-- Rooms Table -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="rooms-table">
                    <!-- Dynamic rows will be inserted here -->
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- Pagination links will go here -->
                </ul>
            </nav>
        </div>
    </div>
@endsection
