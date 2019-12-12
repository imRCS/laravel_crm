@extends('layouts.adminLayout')

@section('title')
Registered roles| CRM
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Roles registrados</h4>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thread class="text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thread>
                        <tbody>

                            @foreach($users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                @if($row->is_admin)
                                <td>admin</td>
                                @else
                                <td>cliente</td>
                                @endif                            
                                <td>
                                    <a href="/role-edit/{{ $row->id }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td>
                                    <form action="/role-delete/{{ $row->id }}" method="post">
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