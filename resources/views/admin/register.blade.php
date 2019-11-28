@extends('layouts.master')

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
                            <th>Usertype</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thread>
                        <tbody>

                            @foreach($users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>- {{ $row->usertype }}</td>
                                <td>
                                    <a href="/role-edit/{{ $row->id }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger">DELETE</a>
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