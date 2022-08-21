<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $req) {

        $data=$req->all();

        $dataToString = json_encode($data);
        
        Webhook::create(['webhook' => $dataToString, 'type' => 'GET']);
        return $data['hub_challenge'];
    }

    public function store(Request $req) {
        $data=$req->all();

        $request_type = $req->method();

        $dataToString = json_encode($data);
        
        Webhook::create(['webhook' => $dataToString, 'type' => $request_type]);
    }
}

