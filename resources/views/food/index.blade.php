@extends('adminlte::page')

@section('title', 'Food')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('food.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-12">
                <label> Nama Makanan </label>
                <input type="text" name="food_name" placeholder="Food Name" class="form-control" >
            </div>

            <div class="col-md-12">
                <label> Ingridient </label>
                <select  name="ingridient_id[]" class="form-control" readonly>
                    @foreach ($ingridients as $ingridient)
                    <option value="{{ $ingridient->id }}">{{ $ingridient->ingridient }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('food.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </div>
    <div class="card-body">
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
                        <td>{{ $food->food_name }}</td>
                        <td>{{ $food->ingridient->ingridient }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
