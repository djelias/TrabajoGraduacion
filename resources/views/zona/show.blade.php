@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la zona</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $zonas->nombreZona}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('zona.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
