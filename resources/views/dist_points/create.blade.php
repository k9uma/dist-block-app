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
                <h2>Create Distribution Block</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dp.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'dp.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Street:</strong>
                {!! Form::text('street', null, array('placeholder' => 'Street Location of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {!! Form::text('city', null, array('placeholder' => 'City Location of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {!! Form::text('code', null, array('placeholder' => 'Code of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>MDF Bar:</strong>
                {!! Form::text('mdfBar', null, array('placeholder' => 'MDF Bar of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>MDF Pair:</strong>
                {!! Form::text('mdfPair', null, array('placeholder' => 'MDF Pair of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Exchange Side:</strong>
                {!! Form::text('exchangeSide', null, array('placeholder' => 'Exchange Side of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cabinet Number:</strong>
                {!! Form::text('cabinetNo', null, array('placeholder' => 'Cabinet Number of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Distribution Side:</strong>
                {!! Form::text('distributionSide', null, array('placeholder' => 'Code of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DP Number:</strong>
                {!! Form::text('dpNo', null, array('placeholder' => 'DP Number of the Distribution Block','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DP Pair Number:</strong>
                {!! Form::text('dpPairNo', null, array('placeholder' => 'DP Pair Number of the Distribution Block','class' => 'form-control')) !!}
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
