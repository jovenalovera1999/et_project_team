@extends('EmailSend.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <h5 class="card-header">Emails</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table id="emailtb" class="table table-bordered cell-border thead-light table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th style="width:10%"></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $d)
                <tr>
                  <td></td>
                  <td>{{$d->id}}</td>
                  <td>
                    <p>{{$d->first_name}} {{$d->last_name}}
                    <p>
                  </td>
                  <td>{{$d->email}}</td>
                  <td><a href="{{url('email/'.$d->id.'/edit')}}" class="btn btn-primary btn-sm">Update</a></td>
                </tr>
                @endforeach
                @endif
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <th style="width:10%"></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card">
        <h5 class="card-header">Compose Email</h5>
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
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection