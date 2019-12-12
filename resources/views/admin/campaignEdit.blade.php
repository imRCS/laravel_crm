@extends('layouts.adminLayout')

@section('title')
Edit-Campaigns | CRM
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Editar datos del producto</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/campaign-update/{{ $campaign->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name='name' value="{{ $campaign->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Ganancias objetivo</label>
                                    <div class="input-group">
                                        <input type="number" name="expectedrevenue" class="form-control" value="{{ $campaign->expectedrevenue }}" step="0.01" min="0" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">€</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="custom-select">

                                        <option selected hidden>{{ $campaign->status }}</option>

                                        <option>activa</option>
                                        <option>finalizada</option>
                                        <option>cancelada</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="month">Mes de inicio</label>
                                            <select name="beginning_month" type=number class="custom-select" id="monthSelect" required>
                                            <option selected value="{{ $campaign->beginning_month }}">{{ $campaign->beginning_month }}</option>
                                                <option value="1">Enero</option>
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
                                            <input type="number" name="beginning_year" class="form-control" value="{{ $campaign->beginning_year }}" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="month">Mes de finalizacion</label>
                                            <select name="ending_month" type=number class="custom-select" id="monthSelect" required>
                                                <option selected value="{{ $campaign->ending_month }}">{{ $campaign->ending_month }}</option>
                                                <option value="1">Enero</option>
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
                                            <input type="number" name="ending_year" class="form-control" value="{{ $campaign->ending_year }}" required>
                                           
                                        </div>


                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" name='description' value="{{ $campaign->description }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="/campaigns" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection