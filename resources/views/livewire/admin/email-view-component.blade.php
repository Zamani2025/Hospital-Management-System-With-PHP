<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="font-weight: bold;">Send Mail</h3>
        </div>
        <div class="row">    
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <form class="forms-sample" method="POST" wire:submit.prevent="sendmail">
                        @csrf
                        <div class="form-group">
                            <label for="doctorName">Greeting</label>
                            <input type="text" wire:model="greeting" class="form-control" id="doctorName" placeholder="Write your greetings">
                            @error("greeting")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Body</label>
                            <textarea placeholder="write your body" wire:model="body" id="" cols="30" class="form-control" rows="10"></textarea>
                            @error("body")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="actionText">Action Text</label>
                            <input type="text" wire:model="actionText" class="form-control" id="actionText" placeholder="Write your action text">
                            @error("actionText")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="actionUrl">Action Url</label>
                            <input type="text" wire:model="actionUrl" class="form-control" id="actionUrl" placeholder="Write your action url">
                            @error("actionUrl")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="endPart">End Part</label>
                            <input type="text" wire:model="endPart" class="form-control" id="endPart" placeholder="Write your endpart">
                            @error("endPart")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary mr-2">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>