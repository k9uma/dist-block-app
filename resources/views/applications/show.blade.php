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
                <h2>Subscriber Line Application Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dp.application.index') }}">Back</a>
            </div>
        </div>
    </div>
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
    <div class="panel panel-default">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Applicant:</strong>
                        {{$application->name}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Service Type:</strong>
                        {{$application->service}}
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
                        <strong>Street:</strong>
                        {{$application->streetName}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>City:</strong>
                        {{$application->city}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Province:</strong>
                        {{$application->province}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DP Number:</strong>
                        @if($application->dist_block == null)
                            {!! Form::open(array('route' => ['dp.application.edit',$application->id],'method'=>'POST')) !!}
                            <select name="assigned_to">
                                @foreach($blocks as $block)
                                    <option value={{$block->id}}>{{$block->dpNo}}</option>
                                @endforeach
                            </select>
                            @ability('technician')
                                <button type="submit" class="btn btn-sm btn-primary">Assign DP</button>
                            @endability
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(array('route' => ['dp.application.edit',$application->id],'method'=>'POST')) !!}
                            <select name="assigned_to">
                                <option value={{$application->dist_block}}>{{$application->dist_block}}</option>
                                @foreach($blocks as $block)
                                    <option value={{$block->id}}>{{$block->dpNo}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Reassign DP</button>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{$application->description}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4>Technicians Report</h4>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if($application->assessment != null)
                        {{$application->assessment}}
                    @else
                        @role('technician')
                        {!! Form::open(array('route' => ['dp.application.update',$application->id],'method'=>'POST')) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description of Resolution:</strong>
                                {!! Form::textarea('assessment', null, array('placeholder' => 'Describe the resolution.','class' => 'form-control','style'=>'height:100px')) !!}
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
