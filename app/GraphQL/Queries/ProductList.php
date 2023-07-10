<?php

namespace App\GraphQL\Queries;

use App\GraphQL\Traits\HasPagination;
use App\Http\Resources\ProductResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Lunar\Models\Product;

final class ProductList
{
    use HasPagination;

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
        $paginator = new LengthAwarePaginator($paginated, $products->count(), $first);

        return [
            'data'          => ProductResource::collection($paginated),
            'paginatorInfo' => $this->paginatorInfo($paginator),
        ];
    }
}
