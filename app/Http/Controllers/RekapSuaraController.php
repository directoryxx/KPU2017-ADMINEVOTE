<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class RekapSuaraController extends Controller
{
  public function __construct()
  {
     $this->middleware('auth');
  }

  public function index()
  {
    if (Auth::user()->name == "Anak Agung Angga Wijaya") {
      $hasilsema = DB::table('sema')
                 ->join('votesema','sema.id','=','votesema.dipilih')
                 ->select('sema.id','sema.namaketua', DB::raw('count(votesema.dipilih) as total'))
                 ->groupBy('votesema.dipilih')
                 ->get();
      $hasildema = DB::table('dema')
                  ->join('votedema','dema.id','=','votedema.dipilih')
                  ->select('dema.id','dema.namaketua', DB::raw('count(votedema.dipilih) as total'))
                  ->groupBy('votedema.dipilih')
                  ->get();
      //print_r($hasilsema);
      return view('rekap.index')->with('hasilsema',$hasilsema)->with('hasildema',$hasildema);
    } else {
      echo "Not Allowed";
    }

  }
}
