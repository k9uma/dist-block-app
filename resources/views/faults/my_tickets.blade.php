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
                <h2>Faults Assigned to Me</h2>
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
                    <th>Date Submitted</th>
                    <th>Description</th>
                    <th>Customer Name</th>
                    <th>Resolution</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{$application->created_at}}</td>
                    <td>{{$application->description}}</td>
                    <td>{{$application->name}}</td>
                    <td>{{$application->resolution or 'Unavailable'}}</td>
                    <td>{{$application->technician or 'Unavailable'}}</td>
                    <td>{{$application->status}}</td>
                    <td>
                        <a href="{{route('fault.application.show',$application->id)}}" class="btn btn-primary">show</a>
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
