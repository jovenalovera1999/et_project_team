@extends('EmailSend.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <h5 class="card-header bg-c-blue text-white">Email</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table id="emailtb" class="table table-bordered cell-border thead-light table-hover table-sm">
              <thead class="text-dark">
                <tr>
                  <!-- <th style="width:10%"></th> -->
                  <th style="width:10%;"><input type="checkbox" id="select_all"></input></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="alluser">
                @if($data)
                @foreach($data as $d)
                <tr>
                  <!-- <td></td> -->
                  <td><input type="checkbox" class="select-checkbox" value="{{$d->email}}" onclick="updateTextArea();"></td>
                  <td>{{$d->id}}</td>
                  <td>
                    <p>{{$d->first_name}} {{$d->last_name}}
                    <p>
                  </td>
                  <td>{{$d->email}}</td>
                  <td><a href="{{url('email/'.$d->id.'/edit')}}" class="fa fa-edit mr-3 text-center text-dark btn-sm"></a></td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card">
        <h5 class="card-header bg-c-pink text-white">Compose Email</h5>
        <div class="card-body">
          <form class="needs-validation" method="POST" action="{{url('sendemail')}}">
          @csrf
            <div class="form-group">
              @if(Session::has('msg'))
              <div class="alert alert-success alert-dismissible">{{session('msg')}}</div>
              @endif
              
              <label for="emailaddress">Email address</label>
              <textarea type="text" class="form-control" id="emailaddress" name="emailaddress" placeholder="Input email/s here..."></textarea>
            </div>
            <div class="form-group">
            <label for="subject">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="Hello!">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea type="text" class="form-control" id="message" name="message" placeholder="Your message" value="Welcome, alumnis!"></textarea>
            </div>
            <input class="btn bg-c-blue text-light btn-lg btn-block" type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection