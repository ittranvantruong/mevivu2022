<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SendApi {
    public function callApi($path, $method, $data = []){
        $response = Http::asForm()->$method($path, $data);
        $response = $response->object();
        return $response;
    }
}