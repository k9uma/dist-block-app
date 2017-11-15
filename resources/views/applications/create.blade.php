<?php
/**
 * Created by PhpStorm.
 * User: Kuma
 * Date: 9/24/2017
 * Time: 6:01 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Application to Connnect to Distribution Block</h2>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    {!! Form::open(array('route' => 'dp.application.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Service:</strong>
                {!! Form::select('service', ['Fixed Line'=>'Fixed Line', 'Fixed Broadband'=>'Fixed Broadband', 'Leased Data Service'=>'Leased Data Service'],null,['placeholder' => 'Select Service Required','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sketch Map:</strong>
                {!! Form::file('sketchMap', null) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
