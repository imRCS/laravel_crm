@extends('layouts.adminLayout')

@section('title')
Productos | CRM
@endsection


@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Añadir producto</h5>
                <br>

                <form action="/save-product-admin" method="POST">

                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="categoria">Tipo de producto</label>
                            <select name="category" class="custom-select" id="validationDefault04" required>
                                <option selected disabled value="">Elige...</option>
                                <option>libro</option>
                                <option>curso</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5">

                            <label for="validationCustom03">Nombre</label>
                            <input type="text" name="name" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Introduzca un nombre.
                            </div>

                        </div>

                        <div class="form-group col-md-2">
                            <label>Precio</label>
                            <div class="input-group">
                                <input type="number" name="price" class="form-control" value="Precio" step="0.01" min="0"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationTextarea">Descripcion</label>
                            <textarea class="form-control" name="description" rows="3" id="validationTextarea" placeholder="Introduzca aquí una descripción del producto" required></textarea>
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
                <h4 class="card-title"> Listado de productos</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Categoria
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>
                                Descripcion
                            </th>
                            <th>
                                Visitas
                            </th>
                            <th>
                                Ventas
                            </th>
                            <th class="text-right">
                                Editar
                            </th>
                            <th class="text-right">
                                Eliminar
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($products as $data)
                            <tr>
                                <td>
                                    {{ $data->id }}
                                </td>
                                <td>
                                    {{ $data->name }}
                                </td>
                                <td>
                                    {{ $data->category }}
                                </td>
                                <td>
                                    {{ $data->price }}
                                </td>
                                <td>
                                    <div style="max-width: 300px; max-height: 60px; overflow: auto;">{{ $data->description}}</div>
                                </td>
                                <td>
                                    {{ $data->views }}
                                </td>
                                <td>
                                    {{ $data->sales }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ url('product-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td class="text-right">
                                <form action="/product-delete/{{ $data->id }}" method="post">
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