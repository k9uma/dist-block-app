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
                <h2>System Reports</h2>
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
                    <th>Name of Report</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Number of Registered Customers</td>
                    <td>{{$registeredCustomers}}</td>
                </tr>
                <tr>
                    <td>Number of Pending Fault Resolutions</td>
                    <td>{{$pendingFaults}}</td>
                </tr>
                <tr>
                    <td>Number of Resolved Faults</td>
                    <td>{{$resolvedFaults}}</td>
                </tr>
                <tr>
                    <td>Total Number of Faults</td>
                    <td>{{$faults}}</td>
                </tr>
                <tr>
                    <td>Total Staff Compliment</td>
                    <td>{{$staff}}</td>
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
