@extends('layouts.adminLayout')

@section('title')
Campañas | CRM
@endsection


@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Crear campaña</h5>
                <br>

                <form action="/save-campaign" method="POST">

                    {{ csrf_field() }}

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="validationCustom03">Nombre</label>
                            <input type="text" name="name" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Introduzca un nombre para la campaña.
                            </div>
                        </div>



                        <div class="form-group col-md-4">
                            <label>Ganancias objetivo</label>
                            <div class="input-group">
                                <input type="number" name="expectedrevenue" class="form-control" value="Precio" step="any" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="activa" readonly>
                        </div>


                     
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="month">Mes de inicio</label>
                            <select name="beginning_month" type=number class="custom-select" id="monthSelect" required>
                                <option selected value="1">Enero</option>
                                <option value="3">Febrero</option>
                                <option value="4">Marzo</option>
                                <option value="5">Abril</option>
                                <option value="6">Mayo</option>
                                <option value="7">Junio</option>
                                <option value="8">Julio</option>
                                <option value="9">Agosto</option>
                                <option value="10">Septiembre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label>Año de inicio</label>
                            <input type="number" name="beginning_year" class="form-control" value="2019" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="month">Mes de finalizacion</label>
                            <select name="ending_month" type=number class="custom-select" id="monthSelect" required>
                                <option selected value="1">Enero</option>
                                <option value="3">Febrero</option>
                                <option value="4">Marzo</option>
                                <option value="5">Abril</option>
                                <option value="6">Mayo</option>
                                <option value="7">Junio</option>
                                <option value="8">Julio</option>
                                <option value="9">Agosto</option>
                                <option value="10">Septiembre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label>Año de finalizacion</label>
                            <input type="number" name="ending_year" class="form-control" value="2019" required>
                        </div>


                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="validationTextarea">Descripcion</label>
                            <textarea class="form-control" name="description" rows="3" id="validationTextarea" placeholder="Introduzca aquí una descripción de la campaña" required></textarea>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary float-right" type="submit">Añadir</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div><br>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Campañas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Campaña
                            </th>
                            <th class="text-right">
                                Editar
                            </th>
                            <th class="text-right">
                                Eliminar
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($campaigns as $data)
                            <tr>
                                <td>

                                    <div class="card" style="background-color: #f0f0f0;">
                                        <div class="card-header">
                                            <h4 class="card-title">{{$data->name}}</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Ganancias objetivo</label>
                                                    {{$data->expectedrevenue}}
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Ganancias obtenidas</label>
                                                    {{$data->currentrevenue}}
                                                </div>

                                                @if ($data->status === "activa")
                                                <div class="col-md-4  text-success">

                                                    {{$data->status}}
                                                </div>
                                                @elseif ($data->status === "finalizada")
                                                <div class="col-md-4 text-muted">

                                                    {{$data->status}}
                                                </div>
                                                @else
                                                <div class="col-md-4 text-danger ">

                                                    {{$data->status}}
                                                </div>
                                                @endif

                                            </div>
                                            <br>
                                            <hr>

                                            <div class="row">


                                                <div class="col-md-12 text-left">
                                                    <label>Inicio:</label>
                                                    {{$data->beginning_month}}
                                                    <label>/</label>
                                                    {{$data->beginning_year}}

                                                    <label> </label>
                                                    <label> - </label>
                                                    <label> </label>


                                                    <label>Fin:</label>
                                                    {{$data->ending_month}}
                                                    <label>/</label>
                                                    {{$data->ending_year}}
                                                </div>

                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{$data->description}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="{{ url('/campaign-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td class="text-right">
                                    <form action="/campaign-delete/{{ $data->id }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
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

@endsection