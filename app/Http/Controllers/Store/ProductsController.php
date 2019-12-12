<?php

namespace App\Http\Controllers\Store;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::all();

        //dd($products);

        return view('store.products')
            ->with('products', $products);
    }


    public function store(Request $request)
    {
        if (Product::where('name', $request->input('name'))->doesntExist()) {

            $product = new Product();

            $product->name = $request->input('name');
            $product->category = $request->input('category');
            $product->price = $request->input('price');
            $product->description = $request->input('description');

            if ($request->input('category') == "apuntes") {
                $product->vendor_id =  Auth::user()->id;
            }

            $product->save();

            return redirect('/products')->with('status', 'Producto añadido con éxito.');
        } else {

            return redirect('/products')->with('errorstatus', 'Error. Ya existe un producto con ese nombre. Cambie el nombre del producto.');
        }
    }

    public function recordPurchase(Request $request, $id)
    {
        //vendor_id -> id del usuario que vendio el producto comprado.
        // 0 si lo vendio la empresa.
        // >0 si lo vendio un cliente.

        $product = Product::findOrFail($id);
        $product->sales++;

        //Se actualizan los datos del producto
        $product->update();


        $vendor_id = $request->input('vendor_id');

        //si el producto comprado lo vendio un cliente, entonces este gana la mitad de los beneficios
        if ($vendor_id != 0) {

            /*  $buyer = User::where('id', $vendor_id); */
            $buyer = User::findOrFail($vendor_id);
            if ($request->input('category') == "apuntes") {
                $buyer->profits = $request->input('price') / 2;

                //Se actualizan los datos del cliente
                $buyer->update();
            }
        }

        //Se crea y se guarda el registro de una nueva venta
        $sale = new Sale();

        $sale->month = $request->input('month');
        $sale->year = $request->input('year');
        $sale->product = $request->input('productname');
        $sale->category = $request->input('category');

        $sale->save();

        return redirect('/products')->with('status', '¡Compra realizada con exito!');
    }

    /* Permite registrar una visita del enlace del producto */
    public function updateViews($id)
    {
        $product = Product::findOrFail($id);
        $product->views++;

        //Se actualizan los datos del producto
        $product->update();

        return redirect('/products');
    }
}
