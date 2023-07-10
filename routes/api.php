<?php

use App\Http\Resources\PaginatorInfoResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Lunar\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', function () {
    $first = $args['first'] ?? 10;
    $page = $args['page'] ?? 1;
    $products = Product::status('published')
                       ->get();
    $paginated = $products->forPage($page, $first);
    $paginator = new LengthAwarePaginator($paginated, $products->count(), $first);

    return [
        'data'          => ProductResource::collection($paginated),
        'paginatorInfo' => new PaginatorInfoResource($paginator),
    ];
});
