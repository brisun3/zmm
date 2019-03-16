<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\createTbl;

class createTblController extends Controller
{
    public function createTbl(){ 
        $ucountry=Auth::user()->ucountry;
        $utype=Auth::user()->utype;
        $a=new createTbl();
        //the way of use model function
        
        switch($utype){
            case 'miss':
                return $a->create_miss_tbl($ucountry);
            case 'massage':
                return $a->create_mass_tbl($ucountry,$utype);
            case 'baoyang':
                return $a->create_baoyang_tbl($ucountry);

        }


        
    }
}
