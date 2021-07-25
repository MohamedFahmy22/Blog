<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function __construct()
    {

    }
    public function getOffers(){
        return Offer::get();
    }

/*
    public function store(){
        Offer::create([
            'name'=>'offer2',
            'price'=>'500',
            'details'=>'offer details',
        ]);
    }
*/

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details
        ]);
        return 'Offer created Successfully';
    }

}
