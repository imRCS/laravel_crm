<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Charts\VentasProductosChart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;

class DashboardMainpageController extends Controller
{
    //devuelve la pagina principal del crm
    public function index()
    {
        //dd($products);

        /* grafica ventas ultimos 3 meses de 2019*/
        $chart1 = new VentasProductosChart;


        $ventasApuntesSep =  Sale::where('month', 9)->where('category', "apuntes")->where('year', 2019)->count();
        $ventasApuntesOct =  Sale::where('month', 10)->where('category', "apuntes")->where('year', 2019)->count();
        $ventasApuntesNov =  Sale::where('month', 11)->where('category', "apuntes")->where('year', 2019)->count();
        $ventasApuntesDic =  Sale::where('month', 12)->where('category', "apuntes")->where('year', 2019)->count();

        $ventasCursosSep =   Sale::where('month', 9)->where('category', "curso")->where('year', 2019)->count();
        $ventasCursosOct = Sale::where('month', 10)->where('category', "curso")->where('year', 2019)->count();
        $ventasCursosNov =   Sale::where('month', 11)->where('category', "curso")->where('year', 2019)->count();
        $ventasCursosDic = Sale::where('month', 12)->where('category', "curso")->where('year', 2019)->count();

        $ventasLibrosSep =  Sale::where('month', 9)->where('category', "libro")->where('year', 2019)->count();
        $ventasLibrosOct = Sale::where('month', 10)->where('category', "libro")->where('year', 2019)->count();
        $ventasLibrosNov =  Sale::where('month', 11)->where('category', "libro")->where('year', 2019)->count();
        $ventasLibrosDic = Sale::where('month', 12)->where('category', "libro")->where('year', 2019)->count();


        $chart1->labels(['Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
        $chart1->dataset('Apuntes', 'bar', [$ventasApuntesSep, $ventasApuntesOct, $ventasApuntesNov, $ventasApuntesDic])->color("#fcc468")->backgroundColor("#fcc468");
        $chart1->dataset('Cursos', 'bar', [$ventasCursosSep, $ventasCursosOct,     $ventasCursosNov,      $ventasCursosDic,])->color("#f17e5d")
            ->backgroundColor("#f17e5d");
        $chart1->dataset('Libros', 'bar', [$ventasLibrosSep,   $ventasLibrosOct,   $ventasLibrosNov,   $ventasLibrosDic])->color("#6bd098")
            ->backgroundColor("#6bd098");
        $chart1->height(330);
        $chart1->width(330);





        /* grafica de ingresos del año 2019*/
        $chart2 = new VentasProductosChart;

        $data = collect([]); // Coleccion de valores       
        for ($i = 1; $i <= 12; $i++) {
            $ingresosMes = 0;

            $productNames = Sale::where('year', 2019)->where('month', $i)->pluck('product');
            foreach ($productNames as $productName) {

                $product = Product::where('name', $productName)->first();


                if ($product->category == "apuntes") {
                    $ingresosMes +=  $product->price / 2;
                } else {
                    $ingresosMes +=  $product->price;
                }
            }
            $data->push($ingresosMes);
        }

        $chart2->labels(['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']);
        $chart2->dataset('Ingresos totales en 2019 en euros', 'line', $data)->color("#74bdd6")
            ->backgroundColor("#72d6d8");
        $chart2->height(330);
        $chart2->width(330);




        /* grafica de ingresos totales por categoria*/
        $chart3 = new VentasProductosChart;

        $productos = Product::all();

        $ingresosApuntes = 0;
        foreach ($productos as $producto) {
            if ($producto->category == "apuntes") {
                $ingresosApuntes = $ingresosApuntes + ($producto->sales * ($producto->price / 2));
            }
        }
        $ingresosCursos = 0;
        foreach ($productos as $producto) {
            if ($producto->category == "curso") {
                $ingresosCursos = $ingresosCursos + ($producto->sales * $producto->price);
            }
        }
        $ingresosLibros = 0;
        foreach ($productos as $producto) {
            if ($producto->category == "libro") {
                $ingresosLibros = $ingresosLibros + ($producto->sales * $producto->price);
            }
        }

        $chart3->labels(['Apuntes', 'Cursos', 'Libros']);
        $chart3->dataset('Ingresos totales por categoria', 'doughnut', [$ingresosApuntes, $ingresosCursos, $ingresosLibros])->color(["#fcc468", "#f17e5d", "#6bd098"])->backgroundColor(["#fcc468", "#f17e5d", "#6bd098"]);
        $chart3->height(354);
        $chart3->width(330);



        /* Datos destacados de la pagina principal */
        $nUsuarios = User::all()->count();
        $nVentas = Sale::all()->count();

        $ingresos = 0;
        $productos = Product::all();
        foreach ($productos as $producto) {
            if ($producto->category == "apuntes") {
                $ingresos = $ingresos + ($producto->sales * ($producto->price / 2));
            } else {
                $ingresos = $ingresos + ($producto->sales * $producto->price);
            }
        }
        $ingresos = number_format((float)$ingresos, 2, '.', '');


        $nProdVistos = 0;
        $productos = Product::all();
        foreach ($productos as $producto) {
            $nProdVistos = $nProdVistos + $producto->views;
        }


        $top5ProductosMasVendidos = Product::all()->sortByDesc('sales')->take(5);






        return view('admin.dashboard', compact('chart1', 'chart2', 'chart3', 'nUsuarios', 'nVentas', 'ingresos', 'nProdVistos', 'top5ProductosMasVendidos'));
    }
}
