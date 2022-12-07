@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-6">
                <a href="{{ route('food.index') }}">
                <div class="small-box bg-warning">
                    <div class="inner text-center">
                        <p> <b> Food Recipe </b> </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 0.5);"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-12 col-6">
                <a href="{{ route('recom.index') }}">
                <div class="small-box bg-info">
                    <div class="inner text-center">
                        <p> <b> Food Recomendation </b> </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice" style="color: rgba(255, 255, 255, 0.5);"></i>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop

