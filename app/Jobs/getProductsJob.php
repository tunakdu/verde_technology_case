<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;

class getProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function getProductData(){

        try {
            $client = new Client();

            $response = $client->get('https://run.mocky.io/v3/1d4edd1f-ecea-4972-9afe-713d78b6f534');

            // API'den gelen verilerle bir şeyler yapılabilir
            $data = json_decode($response->getBody(), true);

            var_dump($data);

            return response()->json(['message' => 'Veri başarıyla çekildi', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hata oluştu', 'message' => $e->getMessage()], 500);
        }

    }
}
