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
                <h2>Distribution Blocks</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
                <a class="btn btn-success" href="{{ route('dp.create') }}"> Create New Distribution Block</a>
                @endpermission
            </div>
        </div>
    </div>
    <div class="row">
        <p class="alert-dismissable">
        @if(session()->has('warning'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                {!! session()->get('warning') !!}
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                {!! session()->get('success') !!}
            </div>
            @endif
            </p>
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
            @foreach($points as $point)
                <tr>
                    <td>{{$point->created_at}}</td>
                    <td>{{$point->street}},{{$point->city}}</td>
                    <td>{{$point->availableSlots}}</td>
                    <td>{{$point->maxSlots}}</td>
                    <td>
                        <a href="{{route('dp.show',$point->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('dp.edit',$point->id)}}" class="btn btn-primary">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['dp.destroy', $point->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
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
