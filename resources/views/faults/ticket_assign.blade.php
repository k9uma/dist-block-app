<?php
/**
 * Created by PhpStorm.
 * User: Kuma
 * Date: 11/15/2017
 * Time: 8:28 PM
 */
?>
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Customer Reported Faults</h2>
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
                @role('customer-care')
                {!! Form::open(array('route' => ['faults.tickets.admin.update',$application->id],'method'=>'POST')) !!}
                <select name="assigned_to">
                    <option value={{$application->assigned_to}}>{{$application->technician}}</option>
                    @foreach($technicians as $technician)
                    <option value={{$technician->id}}>{{$technician->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary">Assign Technician</button>
                {!! Form::close() !!}
                @endrole
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