<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function add(Requesr $request)
    {
        $namee = $request->all('namee');
        $price = $request->all('price');
        $numm = $request->all('numm');
        var_dump($numm);
    }
}
