<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function index(ProductRequest $request): JsonResource
    {
        $data = $request->validated();
        $products = Product::query();

        if (isset($data['properties'])) {
            foreach ($data['properties'] as $key => $filter) {
                $products->whereHas('options', function ($query) use ($key, $filter) {
                    $query->whereIn('value', $filter)->where('name', $key);
                });
            }
        }

        $products = $products->get()->paginate(40);

        return ProductResource::collection($products);
    }
}
