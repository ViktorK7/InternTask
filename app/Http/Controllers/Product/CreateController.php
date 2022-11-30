<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CreateController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('product/create');
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function createPost(Request $request): Redirector|Application|RedirectResponse
    {
        $dateTime = new DateTime();
        $product = new Product();

        $product->setName($request->get('product-name'));
        $product->setWeight((float) $request->get('product-weight'));
        $product->setPrice((float) $request->get('product-price'));
        $product->setDate($dateTime->modify($request->get('product-date')));
        $product->save();

        return redirect('/')->with('message', 'Product was create successfully!');
    }

}
