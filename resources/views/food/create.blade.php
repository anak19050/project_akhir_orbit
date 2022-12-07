@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('food.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-6">
                <a href="{{ route('food.index') }}">
                <div class="small-box bg-orange">
                    <div class="inner text-center">
                        <h4> <b style="color: rgb(255, 255, 255);"> INGRIDIENT </b> <i class="fas fa-angle-double-right" style="color: rgb(255, 255, 255);"></i> </h4>
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
        <div class="form-group row">
            <div class="col-md-12">
                <label> Nama Makanan </label>
                <input type="text" name="food_name" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label> Bahan Makanan </label>
                <input type="text" name="ingredient" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label> Cara Membuat </label>
                <input type="text" name="step" class="form-control">
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('food.create') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </div>

</form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
