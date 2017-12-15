<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class PaslonController extends Controller
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
        return view('paslon.index');
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
        if ($request['organisasi'] == "dema") {
          $validator = Validator::make($request->all(), [
            'nketua' => 'required|string',
            'fotoketua' => 'required|mimes:jpeg,bmp,png,jpg',
            'visi'=>'required|string',
            'misi'=>'required|string',
          ]);
          if ($validator->fails()) {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Terdapat Sebuah Kesalahan!!!!');
            return redirect('paslon');
          } else {
            $digit = mt_rand(100000, 999999);
            $fotoketua = 'fotoketuadema'.$digit.'.'.$request->file('fotoketua')->getClientOriginalExtension();
            $request->file('fotoketua')->move(public_path('datakandidat/'),$fotoketua);
            $locatfotoketua = "datakandidat/".$fotoketua;
            DB::table('dema')->insert(
            //rewuest berdasarkan name
            [
              'namaketua' => $request['nketua'],
              'fotoketua' => $locatfotoketua,
              'nimketua' => $request['nimketua'],
              'visi' => $request['visi'],
              'misi' => $request['misi'],

            ]);

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Kandidat Telah ditambahkan');
            return redirect('paslon');
          }

        } elseif ($request['organisasi'] == "sema") {

            $digit = mt_rand(100000, 999999);
            $fotoketua = 'fotoketuasema'.$digit.'.'.$request->file('fotoketua')->getClientOriginalExtension();
            $fotowakil = 'fotowakilsema'.$digit.'.'.$request->file('fotowketua')->getClientOriginalExtension();
            $request->file('fotoketua')->move(public_path('datakandidat/'),$fotoketua);
            $request->file('fotowketua')->move(public_path('datakandidat/'),$fotowakil);
            $locatfotoketua = "datakandidat/".$fotoketua;
            $locatfotowakil = "datakandidat/".$fotoketua;
            DB::table('sema')->insert(
            //rewuest berdasarkan name
            [
              'namaketua' => $request['nketua'],
              'namawakil' => $request['nwketua'],
              'nimketua' => $request['nimketua'],
              'nimwakil' => $request['nimwketua'],
              'fotoketua' => $locatfotoketua,
              'fotowakil' => $locatfotowakil,
              'visi' => $request['visi'],
              'misi' => $request['misi'],

            ]);

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Kandidat Telah ditambahkan');
            return redirect('paslon');

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

    public function get(Request $request){
      if ($request['organisasi'] == 'sema') {
        //$list1 = DB::table('sema')->get();
        $returnHTML = view('ajax.semaajax')->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
      }
      else if ($request['organisasi'] == 'dema') {
        //$list = DB::table('dema')->get();
        $returnHTML = view('ajax.demajax')->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
      }
    }
}
