<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\katalog;
use App\Models\supir;
use App\Models\penyewa;
class PageController extends Controller
{
    
    //// katalog 

    public function katalog()
    {
        $katalog = katalog::all();
        return view('/Page/katalog', ['katalog' => $katalog]);
    }

    //// penyewa
        public function penyewa()
    {
        $penyewa = penyewa::all();
        return view('/Page/penyewa', ['penyewa' => $penyewa]);
    }

        //// supir
        public function supir()
    {
        $supir = supir::all();
        return view('/Page/supir', ['supir' => $supir]);
    }
}
