<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class DeleteController
{
    /**
     * @param $id
     * @return Redirector|Application|RedirectResponse
     */
    function deleteById($id): Redirector|Application|RedirectResponse
    {
        Product::destroy($id);
        return redirect('/')->with('message', 'Product was delete successfully!');
    }
}
