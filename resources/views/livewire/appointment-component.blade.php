<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Appointments</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">My Appointments</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
  
<div class="container">
    <div class="col-lg-12 mt-5">
        <h1 class="text-center mb-5 wow fadeInUp fw-bold">My Appointments</h1>
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-dark" align="center">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Cancel Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointment as $app)
                            <tr style="vertical-align: middle;">
                                <td>{{$app->doctor}}</td>
                                <td>{{$app->date}}</td>
                                <td>{{$app->message}}</td>
                                <td>{{$app->status}}</td>
                                <td>
                                    <form action="{{route("cancel-appointment", ["id" => $app->id])}}" method="post" onsubmit="return confirm('Are you sure to delete this?');">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Cancel</button>
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