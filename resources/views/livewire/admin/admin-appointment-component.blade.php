<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="font-weight: bold;">All Appointment</h3>
        </div>
        <div class="row">    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4> <div class="table-responsive">
                            <table class="table" align="center">
                              <thead>
                                <tr>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Doctor Name</th>
                                  <th>Number</th>
                                  <th>Message</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th>Approved</th>
                                  <th>Cancel</th>
                                  <th>Send Mail</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->email}}</td>
                                    <td>{{$appointment->doctor}}</td>
                                    <td>{{$appointment->number}}</td>
                                    <td>{{$appointment->message}}</td>
                                    <td>{{$appointment->date}}</td>
                                    <td>{{$appointment->status}}</td>
                                    <td>
                                        <form action="{{route("approve", ["id" => $appointment->id])}}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-success">Approved</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route("cancel", ["id" => $appointment->id])}}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-danger">Cancelled</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route("admin.emailview", ["id" => $appointment->id])}}" class="btn btn-primary">Send Mail</a>
                                        
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
