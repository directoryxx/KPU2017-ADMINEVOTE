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
                <div class="panel-heading">Rekap Suara</div>
                <div class="panel-body">
                  <center><p>Vote Senat Mahasiswa</p></center>
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>Pasangan Calon</th>
                        <th>Nama Ketua</th>
                        <th>Total Vote</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i =1; ?>
                      @foreach ($hasilsema as $lists)
                      <tr>
                        <td>{{$lists->id}}</td>
                        <td>{{$lists->namaketua}}</td>
                        <td>{{$lists->total}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                  <center><p>Vote Dewan Mahasiswa</p></center>
                  <table class="table table-striped table-hover ">
                    <thead>
                      <tr>
                        <th>Pasangan Calon</th>
                        <th>Nama</th>
                        <th>Total Vote</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i =1; ?>
                      @foreach ($hasildema as $lists)
                      <tr>
                        <td>{{$lists->id}}</td>
                        <td>{{$lists->namaketua}}</td>
                        <td>{{$lists->total}}</td>
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
@endsection
