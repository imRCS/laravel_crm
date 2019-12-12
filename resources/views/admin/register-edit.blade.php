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
                    <h1>Editar roles de usuarios registrados</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/role-register-update/{{ $users->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name='username' value="{{ $users->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Cambiar rol</label>
                                    @if($users->is_admin)
                                    <select name="is_admin" class="form-control custom-select">
                                        <option value="1" selected>admin</option>
                                        <option value="0">cliente</option>
                                    </select>
                                    @else
                                    <select name="is_admin" class="form-control custom-select">
                                        <option value="0" selected>cliente</option>
                                        <option value="1">admin</option>
                                    </select>
                                    @endif


                                </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="/role-register" class="btn btn-danger">Cancelar</a>
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