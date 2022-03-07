<?php
    namespace App\Services;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Http;

    class USDService {
        protected $price;

        public function __construct(){
            return $this->getUsdPrice();
        }

        public function getUsdPrice(){
            return $this->price = Cache::remember('usd_price', 600, function(){
              $headers = ['headers'=>['Accept'=>'text/plain; charset=utf-8']];
              $response = Http::get('https://s3.amazonaws.com/dolartoday/data.json', $headers)->body();
              return json_decode($response, true, 512, JSON_INVALID_UTF8_IGNORE)['USD']['promedio_real'];
              // return Http::get('https://s3.amazonaws.com/dolartoday/data.json')
              // ->object()
              // ->USD
              // ->promedio_real;
            });
        }
    }
?>