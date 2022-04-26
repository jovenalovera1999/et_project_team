@extends('EmailSend.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-c-pink"> 
                    <h5 class="text-white">Update Email</h5>
                    <a href="{{url('email')}}" class="btn btn-danger float-right">Back</a>   
                </div>
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif

                    @if(Session::has('msg'))
                    <p class="text-success">{{session('msg')}}</p>
                    @endif
                    <form method="post" action="{{url('email/'.$data->id)}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{$data->first_name}}-{{$data->last_name}}" name="name"></input>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{$data->email}}" name="email"></input>
                        </div>
                        <input class="btn btn-primary color-theme btn-lg btn-block" type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <h5 class="card-header bg-c-pink text-white">Compose Email</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <textarea type="text" class="form-control" id="emailadress" name="emailadress" placeholder="Input email/s here..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your message"></textarea>
                        </div>
                        <input class="btn btn-primary color-theme btn-lg btn-block" type="submit" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection