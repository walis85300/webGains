<?php

namespace App\Providers;

use Response;

use \League\Fractal\TransformerAbstract;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use \League\Fractal\Resource\Collection as Collection;
use \League\Fractal\Resource\Item as Item;

// use League\Fractal\Manager

use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $fractal = $this->app->make('\League\Fractal\Manager');

        /**
         * Macro response for individual Item
         */
        Response::macro('item', 
        function ($item, TransformerAbstract $transformer, $status = 200, array $headers = [], $includes = [], $excludes = []) use ($fractal) {

                $resource = new Item($item, $transformer);

                if (!is_null($includes)) {
                    $fractal->parseIncludes($includes);
                }
                if (!is_null($excludes)) {
                    $fractal->parseExcludes($excludes);
                }

                return response()->json(
                    $fractal->createData($resource)->toArray(),
                    $status,
                    $headers
                );
        });

        /**
         * Response macro for Collection paginator
         */
        Response::macro('collection', 
        function ($collection, TransformerAbstract $transformer, $status = 200, array $headers = [], $includes = [], $excludes = []) use ($fractal) {
            $resource = new Collection($collection->getCollection(), $transformer);
            if (!is_null($includes)) {
                $fractal->parseIncludes($includes);
            }
            if (!is_null($excludes)) {
                $fractal->parseExcludes($excludes);
            }

            $resource->setPaginator(new IlluminatePaginatorAdapter($collection));

            return response()->json(
                $fractal->createData($resource)->toArray(),
                $status,
                $headers
            );
        });   
    }
}
