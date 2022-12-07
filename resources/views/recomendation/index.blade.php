@extends('adminlte::page')

@section('title', 'Ingridient')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('recom.store') }}" method="POST">
    {{ csrf_field() }}
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
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-12">
                <label>Nama Makanan</label>
                <select name="food" class="select2 form-control" required>
                    <option>...</option>
                    @foreach ($foods as $food)
                    <option value="{{ $food->id }}">{{ $food->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('recom.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                <i class="fas fa-save"></i> Simpan
            </button>
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
                    <th> Cari </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($titles as $title)
                    <tr>
                        <td>{{ $title->id }}</td>
                        <td>{{ $title->titles }}</td>
                        <td><a href="{{ route('recom.create', $title->id) }}"
                            class="btn btn-success"> Cari <i class="fas fa-angle-right"></i></a>
                        </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.js-select2').select2();
        });
    </script>
@stop
