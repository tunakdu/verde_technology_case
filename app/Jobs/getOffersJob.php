<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;

class getOffersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function getOfferData(){

        try {
            $client = new Client();

            $response = $client->get('https://run.mocky.io/v3/5a4b809b-c72a-4ab2-9acd-f63dc95a9755');

            // API'den gelen verilerle bir şeyler yapılabilir
            $data = json_decode($response->getBody(), true);

            var_dump($data);

            // Veri işleme işlemleri burada gerçekleştirilir

            return response()->json(['message' => 'Veri başarıyla çekildi', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hata oluştu', 'message' => $e->getMessage()], 500);
        }

    }
}
