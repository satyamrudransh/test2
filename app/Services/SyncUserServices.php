<?php

namespace App\Services;
use Illuminate\Http\Request; 
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Artisan;


class SyncUserServices
{

//this is used for User
    public function syncFromUserApi(Request $request) 
    {
        
        $header = $request->header('Authorization');
        $client = new Client([
                'base_uri' => env('API_CAREER'),
                'headers' => ['Authorization' => $header,]
              ]);
              $res = $client->request('GET','user' , [
                'query' => [
                    'app' => $request->app,
                 ],
              ]           
            );
            $x = $res->getBody();
            $data = json_decode($x, true);
            return $data;
    }


}