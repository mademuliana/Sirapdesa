<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 1/13/2017
 * Time: 10:15 PM
 */

namespace App\Http\Controllers;
use App\Pemilik;

class Coba extends  Controller
{

    public function show($pemanggil, $id){
        $pemilik = Pemilik::where('id', $id)->first();
        return view('edit_data_pemilik', ['pemanggil'=>$pemanggil, 'data'=>$id, 'pemilik'=> $pemilik]);
    }

}