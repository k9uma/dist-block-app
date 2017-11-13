<?php
/**
 * Created by PhpStorm.
 * User: Kuma
 * Date: 9/24/2017
 * Time: 6:00 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Applications</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
                <a class="btn btn-success" href="{{ route('dp.create') }}"> Create New Distribution Block</a>
                @endpermission
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table  class="table table-bordered" id="table_id">
            <thead>
            <tr>
                <th>Date Created</th>
                <th>Location</th>
                <th>Available Slots</th>
                <th>Max Slots</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Jane Doe</td>
                <td>janedoe@example.com</td>
                <td>5</td>
                <td>Food Processing</td>
                <td>
                    <a href="{{url('')}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('')}}" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
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
