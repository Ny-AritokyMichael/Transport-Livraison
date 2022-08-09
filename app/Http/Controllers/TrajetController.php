<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TrajetExport;
use Excel;



class TrajetController extends Controller
{

    public function index()
    {
        return view('index1');
    }


    public function chart()
      {
        $result = \DB::table('histogramme')
                    // ->where('stockName','=','Infosys')
                    ->orderBy('dateDepart', 'ASC')
                    ->get();
        return response()->json($result);

        dd($result);
      }


      public function exportExcel(){
          return Excel::download(new TrajetExport,'Export.xlsx');
      }

      public function exportCsv(){
        return Excel::download(new TrajetExport,'Export.csv');
    }
}
