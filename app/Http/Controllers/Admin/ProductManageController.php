<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Facades\QuqeryB;

class ProductManageController extends Controller
{

    public function ProductStore(Request $request)
    {

        $store = new Product();
        $this->save($store,$request);
        return redirect()->back();
    }

    public function ProductUpdate(Request $request)
    {

        $store = Product::where('id', $request->EditId)->first();
        $this->save($store, $request);
        return redirect()->back();
    }

    public function save(Product $store, Request $request)
    {

        $pages = $store;
        QuqeryB::Insert($pages, $request);
        // QuqeryB::InsertImage($pages, 'page', 400, 400, $request);
    }

    public function ProductDelete($id){

        Product::where('id',$id)->delete();
        return redirect()->back();
    }
}
