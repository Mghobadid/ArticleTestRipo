<?php

namespace App\Http\Controllers;

use App\Models\CoinInfo;
use App\Models\cryptocurrencies;

class CryptoController extends Controller
{
    public function index()
    {
        $data = cryptocurrencies::paginate();
        return view('crypto.index', ['values' => $data]);
    }

    public function show($id)
    {

        $coinInfo=CoinInfo::where('cryptocurrency_id',$id)->with('cryptocurrency')->firstOrFail();

        return view('crypto.show', compact('coinInfo'));
    }
}
