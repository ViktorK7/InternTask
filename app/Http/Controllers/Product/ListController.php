<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ListController extends Controller
{
    const PRODUCT_PER_PAGE = 6;

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function execute(Request $request): Factory|View|Application
    {
        $message = $request->session()->get('message');
        $priceFilter = $request->get('priceFilter');
        $dateFilter = $request->get('dateFilter');
        $page = $request->get('p');

        $products = Product::all();
        if ($priceFilter) {
            $products = $products->where('price', $priceFilter);
        }

        if ($dateFilter) {
            $products = $products->where('date', $dateFilter);
        }

        $productsCount = $products->count();
        if ($page) {
            $products = $products->splice(
                self::PRODUCT_PER_PAGE * ((int) $page - 1),
                self::PRODUCT_PER_PAGE* (int) $page
            );
        } else {
            $products = $products->take(self::PRODUCT_PER_PAGE);
        }

        return view('product/list', [
            'products' => $products,
            'message' => $message,
            'priceOptions' => $this->getPriceOptions(),
            'dateOptions' => $this->getDateOptions(),
            'selectedPriceFilter' => $priceFilter,
            'selectedDateFilter' => $dateFilter,
            'pages' => $this->getPages($productsCount)
        ]);
    }

    /**
     * @return array
     */
    private function getPriceOptions(): array
    {
        $priceOptions[] = '';
        $productCollection =  Product::all('price');

        foreach ($productCollection as $product) {
            $priceOptions[] = $product->getPrice();
        }

        return array_unique($priceOptions);
    }

    /**
     * @return array
     */
    private function getDateOptions(): array
    {
        $dateOptions[] = '';
        $productCollection =  Product::all('date');

        foreach ($productCollection as $product) {
            $dateOptions[] = $product->getDate();
        }

        return array_unique($dateOptions);
    }

    private function getPages($productCount)
    {
        $pages = [];
        for ($i = $productCount; $i > 0; $i -= self::PRODUCT_PER_PAGE) {
            $pages[] = count($pages) + 1;
        }
        return $pages;
    }
}
