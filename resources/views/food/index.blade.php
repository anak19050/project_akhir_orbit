@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-6">
                <a href="{{ route('home') }}">
                <div class="small-box bg-success">
                    <div class="inner text-center">
                        <h1> <b style="color: rgb(255, 255, 255);"> HOME </b> <i class="fas fa-angle-double-right" style="color: rgb(255, 255, 255);"></i> </h1>
                    </div>
                    <div class="icon">
                        <i class="fas fa-home" style="color: rgb(255, 255, 255);"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-12 col-6">
                <a href="{{ route('food.create') }}">
                <div class="small-box bg-orange">
                    <div class="inner text-center">
                        <h1> <b style="color: rgb(255, 255, 255);"> ADD FOOD </b> <i class="fas fa-angle-double-right" style="color: rgb(255, 255, 255);"></i> </h1>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice" style="color: rgb(255, 255, 255);"></i>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="inner text-center">
            <h1> <b> FOOD INGREDIENTS </b> </h1>
        </div>
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Nama Makanan </th>
                    <th> Bahan </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <td>{{ $food->id }}</td>
                        <td>{{ $food->title }}</td>
                        <td>{{ $food->ingredients }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
