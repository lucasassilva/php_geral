<?php

namespace App\Http\Controllers\Master;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as Controller;

class MasterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('master.index', ['title'=>'CCAR']);
    }

}

