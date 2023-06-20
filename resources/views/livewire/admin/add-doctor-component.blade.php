<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="font-weight: bold;">Add Doctor</h3>
        </div>
        <div class="row">    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" wire:submit.prevent="addDoctor">
                        @csrf
                    <div class="form-group">
                        <label for="doctorName">Doctor Name</label>
                        <input type="text" wire:model="name" class="form-control" id="doctorName" placeholder="Write the name of doctor">
                        @error("name")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" wire:model="number" class="form-control" id="phoneNumber" placeholder="Write the phone number">
                        @error("number")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select class="form-control" id="speciality" wire:model="speciality">
                        <option value="" selected>--Select--</option>
                        <option value="Skin Doctor">Skin Doctor</option>
                        <option value="Heart Doctor">Heart Doctor</option>
                        <option value="Eye Doctor">Eye Doctor</option>
                        <option value="Nose Doctor">Nose Doctor</option>
                        </select>
                        @error("speciality")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roomNumber">Room Number</label>
                        <input type="text" wire:model="room" class="form-control" id="roomNumber" placeholder="Write the room number">
                        @error("room")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" wire:model="image" class="form-control" id="image" class=" @error("image") border-danger @enderror">
                        @error("image")
                            <span class="text-danger">{{$message}}</span><br>
                        @enderror
                        
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}" alt="" width="120" height="120" class="mt-3 rounded-lg">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Add Doctor</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>