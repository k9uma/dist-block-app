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
                <h2>Customer Fault Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('faults.tickets') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
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
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer:</strong>
                        {{$application->name}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Contact Number:</strong>
                        {{$application->phone}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Email:</strong>
                        {{$application->email}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer Address:</strong>
                        {{$application->physicalAddress}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fault ID:</strong>
                        {{$application->fault_id}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fault Description:</strong>
                        {{$application->description}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{$application->status}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Reported Date:</strong>
                        {{$application->created_at}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4>Technicians Report</h4>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if($application->resolution != null)
                        {{$application->resolution}}
                    @else
                        @role('technician')
                        {!! Form::open(array('route' => ['fault.application.resolution.update',$application->id],'method'=>'POST')) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description of Resolution:</strong>
                                {!! Form::textarea('resolution', null, array('placeholder' => 'Describe the resolution.','class' => 'form-control','style'=>'height:100px')) !!}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        {!! Form::close() !!}
                        @endrole
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
