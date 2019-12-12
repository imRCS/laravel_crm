@extends('layouts.adminLayout')

@section('title')
Edit-Registered | CRM
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
                            <form action="/product-edit-update/{{ $product->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name='name' value="{{ $product->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de producto</label>
                                    <select name="category" class="custom-select">

                                        <option selected hidden>{{ $product->category }}</option>

                                        <option>libro</option>
                                        <option>apuntes</option>
                                        <option>curso</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="number" step="any" name='price' value="{{ $product->price }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" name='description' value="{{ $product->description }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="/product-list" class="btn btn-danger">Cancelar</a>
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