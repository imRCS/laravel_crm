@extends('layouts.storeLayout')

@section('title')
Store
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Añadir apuntes</h5>
                    <br>

                    <form action="/save-product" method="POST">

                        {{ csrf_field() }}

                        <div class="form-row">

                            <!-- <div class="form-group col-md-4">
                                <label for="categoria">Tipo de producto</label>
                                <select name="category" class="custom-select" id="validationDefault04" required>
                                    <option selected disabled value="">Elige...</option>
                                    <option>libro</option>
                                    <option>apuntes</option>
                                    <option>curso</option>
                                </select>
                            </div> -->


                            <input style="display:none" name="category" value="apuntes" />

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
                                    <input type="number" name="price" class="form-control" value="Precio" step="any" required>
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
    </div>
</div>
<br>



<div class="container">
    <div class="row">

        @foreach ($products as $data)
        <div class="col-sm-4" style="background-color:lavender;">

            <form action="{{ url('/buy-product/'.$data->id) }}" method="POST">

                {{ csrf_field()}}

                <!-- style="display:none" -->
                <input style="display:none"name="productname" value="{{ $data->name }}" />
                <input style="display:none" name="vendor_id" value="{{ $data->vendor_id }}" />
                <input style="display:none" name="category" value="{{ $data->category }}" />
                <input style="display:none" name="price" value="{{ $data->price }}" />


                <div class="panel panel-primary">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="month">Mes</label>
                                            <select name="month" type=number class="custom-select" id="monthSelect" required>
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


                                        <div class="form-group col-md-6">
                                            <label>Año</label>
                                            <input type="number" name="year" class="form-control" value="2019" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">{{ $data->name }}</div>
                    <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">
                        <p>Categoria: {{ $data->category}}</p>
                        <div class="overflow-auto" style="max-width: 300px; max-height: 100px">{{ $data->description}}</div>
                        <br>
                        <div>
                            <label>{{ $data->price}}€</label>


                           

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">COMPRAR</button>
            </form>


            <form action="{{ url('/view-product/'.$data->id) }}" method="POST">
                {{ csrf_field()}}
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#{{ $data->id }}">
                    VER PRODUCTO
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $data->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ $data->description}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        </div>
        @endforeach

    </div>
</div><br>



@endsection



@section('scripts')

@endsection