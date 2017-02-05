<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;

use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('existsEnough', function ($attribute, $value, $parameters, $validator) {

            $validatorData = $validator->getData();
            $validatorAttributes = explode('.', $attribute);

            $productId = $validatorData['products'][$validatorAttributes[1]]['ID'];

            $product = Product::find($productId);

            return ($value <= $product->quantityInStock);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\League\Fractal\Manager', function($app) {
            $manager = new \League\Fractal\Manager;

            // Use the serializer of your choice.
            $manager->setSerializer(
                new \League\Fractal\Serializer\ArraySerializer);

            return $manager;
        });
    }
}
