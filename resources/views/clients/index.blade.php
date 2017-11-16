<?php
/**
 * Created by PhpStorm.
 * User: Kuma
 * Date: 9/24/2017
 * Time: 5:57 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Customer</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="table_id" class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    Customer
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('clients.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('clients.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        } );
    </script>
@endsection
