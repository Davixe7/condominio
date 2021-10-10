<?php
    namespace App\Services\Facades;
    use Illuminate\Support\Facades\Facade;
    use App\Services\USDService;

    class USDServiceFacade extends Facade {
        protected static function getFacadeAccessor(){
            return USDService::class;
        }
    }
?>