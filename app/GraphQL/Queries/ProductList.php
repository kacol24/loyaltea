<?php

namespace App\GraphQL\Queries;

use App\Http\Resources\ProductResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Lunar\Models\Product;

final class ProductList
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $first = $args['first'] ?? 10;
        $page = $args['page'] ?? 1;
        $products = Product::status('published')
                           ->get();
        $paginated = $products->forPage($page, $first);

        return new LengthAwarePaginator(ProductResource::collection($paginated)->resolve(), $products->count(), $first);
    }
}
