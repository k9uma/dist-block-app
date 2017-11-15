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
                <h2>Distribution Block Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dp.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Street:</strong>
                    {{$distributionPoint->street}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City:</strong>
                    {{$distributionPoint->city}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    {{$distributionPoint->code}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>MDF Bar:</strong>
                    {{$distributionPoint->mdfBar}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>MDF Pair:</strong>
                    {{$distributionPoint->mdfPair}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Exchange Side:</strong>
                    {{$distributionPoint->exchangeSide}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cabinet Number:</strong>
                    {{$distributionPoint->cabinetNo}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Distribution Side:</strong>
                    {{$distributionPoint->distributionSide}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DP Number:</strong>
                    {{$distributionPoint->dpNo}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DP Pair Number:</strong>
                    {{$distributionPoint->dpPairNo}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{$distributionPoint->description}}
                </div>
            </div>
        </div>
    </div>
@endsection
