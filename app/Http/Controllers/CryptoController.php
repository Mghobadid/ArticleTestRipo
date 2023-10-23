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
    public function show(CoinInfo $cryptocurrencies)
    {
        return view('crypto.show', compact('cryptocurrencies'));
    }
}
