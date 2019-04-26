<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeteranganKonflik;
use App\Tanah;

class KonflikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('lapor_konflik', ['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $konflik = new KeteranganKonflik;
        $konflik->keterangan = $request->isikonflik;
        $konflik->info_tanah_id = $id;
        $konflik->save();
        $tanah = Tanah::find($id);
        $tanah->status_konflik = true;
        $tanah->save();
        return redirect('/tanah/'.$id);
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
      $konflik = KeteranganKonflik::find($id);
      return view('edit_konflik', ['konflik'=>$konflik]);
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
        // dd($request);
        $konflik = KeteranganKonflik::find($id);
        $konfliks = KeteranganKonflik::all();
        $konflik->keterangan = $request->isikonflik;
        if($request->status_konflik =="on"){
            $konflik->status_konflik = true;
            $konflik->status_konfirmasi = false;
        }
        else{
            $konflik->status_konflik = false;
            $konflik->status_konfirmasi = false;
            $status = 0;
            foreach ($konfliks as $key => $_konflik) {
                if($_konflik->status_konflik)
                    $status++;
            }
            $tanah = Tanah::find($konflik->info_tanah_id);
            if($status>1){
                $tanah->status_konflik = true;
            }
            else{
                $tanah->status_konflik = false;
            }
            $tanah->save();
            // dd($tanah);
        }
        $konflik->save();
        return redirect('/tanah/'.$konflik->info_tanah_id);
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
