@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Tipo</h2>
      <br>
      </div>
    </div>
  </div>
      <div>
        <a href="{{route('tipoInvestigacion.create')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> NUEVO</i>
        </a>
        {!! Form::open(['route'=>'tipoInvestigacion.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombreTipo', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
            {!! Form::close()!!}
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre tipo de Investigación</th>
       <th style="text-align:center">Descripción de tipo de Investigación</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($tipoInvestigaciones as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->nombreTipo }}</td>
        <td>{{ $value->descripcionTipo }}</td>
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('tipoInvestigacion.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt"></i></a>
          <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('tipoInvestigacion.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['tipoInvestigacion.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-lg" onclick="return confirm('¿Esta seguro de eliminar este Registro?')"><i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!!$tipoInvestigaciones->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente esta colección?',
    /*text: "You won't be able to revert this!",*/
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar'

  }).then((result) => {
    if (result.isConfirmed) {
     this.submit();
    }
})
});

    </script>
@endsection


  