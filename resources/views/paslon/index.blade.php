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
                <div class="panel-heading">Pasangan Calon</div>
                <div class="panel-body">
                  @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                    {!! session('message.content') !!}
                    </div>
                  @endif
                  <p>Organisasi : </p>
                  <select id="organisasi">
                    <option value="sema">Senat Mahasiswa</option>
                    <option value="dema">Dewan Mahasiswa</option>
                  </select>
                  <br />
                <div class="showlist">

                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
