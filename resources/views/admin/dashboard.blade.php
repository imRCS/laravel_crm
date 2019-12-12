@extends('layouts.adminLayout')

@section('title')
Dashboard | CRM
@endsection


@section('content')

<div class="content">
    <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats" style="height: 102px;">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-02 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Usuarios</p>
                                <p class="card-title">{{ $nUsuarios }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats"  style="height: 102px;">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-shop text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ventas</p>
                                <p class="card-title">{{ $nVentas }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats"  style="height: 102px;">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ingresos</p>
                                <p class="card-title">{{ $ingresos }}€
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats"  style="height: 102px;">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-glasses-2 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Productos vistos</p>
                                <p class="card-title">{{ $nProdVistos }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Productos vendidos ultimos 3 meses</h4>
                </div>
                <div class="card-body">

                    {!! $chart1->container() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ingresos 2019</h4>
                </div>
                <div class="card-body">

                    {!! $chart2->container() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ingresos por categoria</h4>
                </div>
                <div class="card-body">

                    {!! $chart3->container() !!}

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top 5 productos mas vendidos</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th height="90">
                                    Nombre
                                </th>
                                <th height="90">
                                    Categoria
                                </th>
                                <th class="text-center" height="90">
                                    Ventas
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($top5ProductosMasVendidos as $producto)
                                <tr>
                                    <td>
                                        {{ $producto->name }}
                                    </td>
                                    <td>
                                        {{ $producto->category }}
                                    </td>
                                    <td class="text-center" >
                                       <h6> {{ $producto->sales }} </h6>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



    @endsection




    @section('scripts')
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    {!! $chart1->script() !!}
    {!! $chart2->script() !!}
    {!! $chart3->script() !!}
    @endsection