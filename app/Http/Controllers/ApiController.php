<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maps;
use App\Tanah;

class ApiController extends Controller
{
  public function satuTanah($id)
  {
    $status = Tanah::find($id)->status_sertifikasi;
    if ($status == "belum") { $warna = "#E91E63"; } elseif ($status == "proses") {$warna = "#FFEB3B";}else {$warna ="#4CAF50";}
    $datas = Maps::where('info_tanah_id', $id)->get();
    $coordinates = array();
    $titiktemu;
    foreach ($datas as $key => $data) {
      if ($key==0) {
        $titiktemu = [$data->lon, $data->lat];
      }
      array_push($coordinates, [$data->lon, $data->lat]);
    }
    array_push($coordinates, $titiktemu);
    return response()
    ->json(["type"=>"FeatureCollection",
            "features"=>[["type"=> "Feature",
                          "properties"=>[
                            "color"=> $warna
                          ],
                          "geometry"=>[
                            "type"=> "Polygon",
                            "coordinates"=> [$coordinates]
                          ]
                        ]]
        ]);
  }
  public function semuaTanah()
  {
    $tanahs = Tanah::all();
    $features = array();
    foreach ($tanahs as $key => $tanah) {
      $status = $tanah->status_sertifikasi;
      if ($status == "belum") { $warna = "#E91E63"; } elseif ($status == "proses") {$warna = "#FFEB3B";}else {$warna ="#4CAF50";}

      $datas = Maps::where('info_tanah_id', $tanah->id)->get();
      $coordinates = array();
      $titiktemu;
      foreach ($datas as $key => $data) {
        if ($key==0) {
          $titiktemu = [$data->lon, $data->lat];
        }
        array_push($coordinates, [$data->lon, $data->lat]);
      }
      array_push($coordinates, $titiktemu);

      $feature = ["type"=> "Feature",
                    "properties"=>[
                      "color"=> $warna
                    ],
                    "geometry"=>[
                      "type"=> "Polygon",
                      "coordinates"=> [$coordinates]
                    ]
                  ];
      array_push($features, $feature);
    }
    return response()
    ->json(["type"=>"FeatureCollection",
        "features"=>$features
      ]);
  }
}
