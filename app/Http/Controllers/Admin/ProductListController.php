<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductListController extends Controller
{
    public function index()
    {

        $products = Product::all();

        //dd($products);

        return view('admin.productList')
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

                /* ERROR: Un administrador ha subido apuntes. Esto no puede pasar!!!  */
                dd($product);
            }

            $product->save();

            return redirect('/product-list')->with('status', 'Producto añadido con éxito.');
        } else {

            return redirect('/product-list')->with('errorstatus', 'Error. Ya existe un producto con ese nombre. Cambie el nombre del producto.');
        }
    }


    /* funcion que redirige a la pagina para editar los datos de un producto con id $id */
    public function productedit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.productEdit')->with('product', $product);
    }


    /* funcion que permite cambiar los datos de un producto */
    public function producteditupdate(Request $request, $id)
    {
        if (Product::find($id)->name != $request->name){

            if (Product::where('name', $request->input('name'))->doesntExist()) {

                $product = Product::find($id);
                $product->name = $request->input('name');
                $product->category = $request->input('category');
                $product->price = $request->input('price');
                $product->description = $request->input('description');
    
                $product->update();
    
                return redirect('/product-list')->with('status', 'Cambios guardados con exito');
    
            } else {

                return redirect('/product-list')->with('errorstatus', 'Error. Ya existe un producto con ese nombre. Cambie el nombre del producto.');
            }

        }else{

            $product = Product::find($id);
           
            $product->category = $request->input('category');
            $product->price = $request->input('price');
            $product->description = $request->input('description');

            $product->update();

             return redirect('/product-list')->with('status', 'Cambios guardados con exito'); 

        }
        
       
    }
}
