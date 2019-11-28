@extends('layouts.master')

@section('title')
    Dashboard | CRM
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tabla simple</h4>
            </div> 
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thread class="text-primary">
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                        </thread>
                        <tbody>
                            <tr>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td>
                                <td>Dakota Rice</td>
                            </tr>
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