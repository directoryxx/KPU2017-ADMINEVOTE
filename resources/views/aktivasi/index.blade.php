@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-4">
        <div class="list-group table-of-contents">
          <a class="list-group-item" href="{{ url('home') }}">Home</a>
          <a class="list-group-item" href="{{ url('paslon') }}">Pasangan Calon</a>
          <a class="list-group-item" href="{{ url('aktivasi') }}">Aktivasi User</a>
          <a class="list-group-item" href="{{ url('rekap') }}">Rekap Suara</a>

        </div>
      </div>
        <div class="col-lg-9 col-md-3 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Aktivasi User</div>
                <div class="panel-body">
                  @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                    {!! session('message.content') !!}
                    </div>
                  @endif
                  <form action="{{url('aktivasi')}}" method="post">
                    {{ csrf_field() }}
                    <center><input type="text" name="nim" placeholder="NIM"></input></center>
                    <br />
                    <button type="submit" class="btn btn-primary center-block">Aktivasi</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
