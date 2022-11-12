@extends('adminlte::page')

@section('title', 'Ingridient')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('ingridient.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-12">
                <label> Nama Bahan </label>
                <input type="text" name="ingridient" class="form-control">
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('ingridient.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
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
                    <th> Nama Bahan </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingridients as $ingridient)
                    <tr>
                        <td>{{ $ingridient->id }}</td>
                        <td>{{ $ingridient->ingridient }}</td>
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
