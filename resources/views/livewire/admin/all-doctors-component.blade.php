<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="font-weight: bold;">All Doctors</h3>
        </div>
        <div class="row">    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4> <div class="table-responsive">
                            <table class="table" align="center">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Image</th>
                                  <th>Number</th>
                                  <th>Speciality</th>
                                  <th>Room</th>
                                  <th>Date</th>
                                  <th>Update</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->name}}</td>
                                        <td><img src="{{asset ('storage/doctors')}}/{{$doctor->image}}" width="100" alt=""></td>
                                        <td>{{$doctor->number}}</td>
                                        <td>{{$doctor->speciality}}</td>
                                        <td>{{$doctor->room}}</td>
                                        <td>{{$doctor->created_at->format("d/m/Y")}}</td>
                                        <td>
                                            <a href="{{route("admin.edit_doctor", ["id" => $doctor->id])}}" class="btn btn-primary">Update</a>&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <form method="post" wire:submit.prevent="deleteDoctor({{$doctor->id}})" onsubmit="return confirm('Are you sure to delete this?');">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
