@extends('layouts.admin')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">


            <div class="">
                <div class="d-flex justify-content-end">
                    <a href="{{ url('admin/rooms') }}" class="btn btn-primary">
                        <i class='bx bx-arrow-back'></i>
                        Back
                    </a>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="roomName" class="form-label fw-bold">Room Name</label>
                                <input type="text" class="form-control" id="roomName" placeholder="Enter room name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="roomDescription" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="roomDescription" rows="4" placeholder="Enter room description"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="roomPrice" class="form-label fw-bold">Price</label>
                                <input type="url" class="form-control" id="roomPrice" placeholder="">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="mb-2">
                                    <span class="tag">Gyser <span class="close">&times;</span></span>
                                    <span class="tag">Wifi <span class="close">&times;</span></span>
                                    <span class="tag">AC <span class="close">&times;</span></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter a technology">
                                <small class="form-text text-muted">Enter facilities of the room. Press Enter to add each one.</small>
                            </div>
                            
                            <button type="submit" class="btn btn-dark mt-2">Save Room</button>
                        </form>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Thumbnails</label>
                            <div class="upload-area">
                                <div>
                                    <p>Drag 'n' drop some files here, or click to select files</p>
                                </div>
                            </div>
                            <small class="form-text text-muted mt-2">Upload images of the room.</small>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
