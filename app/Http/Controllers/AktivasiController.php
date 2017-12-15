<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AktivasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        return view('aktivasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users = DB::connection('admindb')
        ->table('users')
        ->where('username','=',$request['nim'])
        ->count();
        $ambildata = DB::connection('admindb')
        ->table('users')
        ->where('username','=',$request['nim'])
        ->get();

        $ambil = DB::connection('admindb')
        ->table('users')
        ->get();
        if ($users == 1 && $ambildata[0]->status != "A") {
          $updatestatus = DB::connection('admindb')
          ->table('users')
          ->where('username','=',$request['nim'])
          ->update(['status' => 'A']);
          $request->session()->flash('message.level', 'success');
          $request->session()->flash('message.content', 'NIM '. $request['nim'] .' Telah diaktivasi');
          return redirect('aktivasi');
        } else {
          $request->session()->flash('message.level', 'warning');
          $request->session()->flash('message.content', 'Error, Silahkan Hubungi Administrator');
          return redirect('aktivasi');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
