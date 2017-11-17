@extends('layouts.app')

@section('title')
  BIENVENIDO 
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Sistema</a></li>
    <li class="active">Expedientes</li>
  </ol>
@endsection
@section('content')
  <div class="box">
    <div class="box-body">
      <div class="table-responsive">
        <a class="btn btn-success" role="button" data-toggle="collapse" href="#form0" aria-expanded="false" aria-controls="collapseExample">Crear Expediente</a>
        <div class="collapse" id="form0">
          <hr>
          <form method="POST" action="{{route('locations.store')}}" accept-charset="UTF-8">
            {{ csrf_field() }}
           
            <div class="form-group">
              <label for="codigo">Codigo</label>
              <input class="form-control" placeholder="Codigo" required="" name="codigo" type="text" id="codigo">
            </div>

            <div class="form-group">
              <label for="fecha_i">Fecha</label>
              <input class="form-control" placeholder="Fecha de expediente" required="" name="fecha_i" type="date" id="fecha_i">
            </div>


             <div class="form-group">
              <label for="emisor">Emisor</label>
              <select class="form-control" required="" name="emisor" id="emisor">
                <option value="select">Seleccione Emisor</option>
                <option value="unidad1">1</option>
                <option value="unidad2">2</option>
                <option value="unidad3">3</option>
              </select>
            </div>

            <div class="form-group">
              <label for="receptor">Receptor</label>
              <select class="form-control" required="" name="receptor" id="receptor">
                <option value="select">Seleccione Receptor</option>
                <option value="unidad1">1</option>
                <option value="unidad2">2</option>
                <option value="unidad3">3</option>
              </select>
            </div>

           <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Insertar Docuemento</label>
                              <input type="file" name="documento" class="form-control" id="images">
                          </div>
                      </div>
                  </div>

                   <div class="form-group">
              <label for="flujo_expediente">Asignar Flujo de trabajo</label>
              <select class="form-control" required="" name="flujo_expediente" id="flujo_expediente">
                <option value="select">Seleccione una opcion...</option>
                <option value="unidad1">1</option>
                <option value="unidad2">2</option>
                <option value="unidad3">3</option>
              </select>
            </div>
             <div class="form-group">
              <input class="btn btn-primary" type="submit" value="Registrar">
            </div>

            </div>
                
           
        </form>
        </div>
        <div class="container-fluid">
            <div class="col col-sm-8">
            </div>
  					<div class="col col-sm-4">
              <form method="GET" action="{{route('locations.index')}}" accept-charset="UTF-8">
                {{ csrf_field() }}
                  <div class="input-group">
                    <input class="form-control" placeholder="Buscar Expediente" required="" name="name" type="text" id="name">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                  </div>
              </form>
  					</div>
  			</div>
        <hr>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
              <tr>
                  <th>Description</th>
                  <th>Tipo</th>
                  <th>Accion</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($locales as $local)
              <tr class="odd gradeX">
                <td>{{$local->description}}</td>
                <td>{{$local->type}}</td>
                <td >
                  <a class="btn btn-warning" role="button" data-toggle="collapse" href="#form{{$local->id}}" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{ route('locations.destroy', $local->id) }}" onclick="return confirm('¿Seguro que deseas eliminar?')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr class="odd gradeX collapse"  id="form{{$local->id}}">
                <td COLSPAN=7>
                  <form method="POST" action="{{route('locations.update',$local->id)}}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Lugar</label>
                      <input class="form-control" placeholder="Nombres" required="" name="name" type="text" id="name" value="{{$local->description}}">
                    </div>
                    <div class="form-group">
                      <label for="type_user">Tipo</label>
                      <select class="form-control" required="" name="type" id="type">
                        @if ($local->type == 'aeropuerto')
                          <option selected value="aeropuerto">Aeropuerto</option>
                        @else
                          <option value="aeropuerto">Aeropuerto</option>
                        @endif
                        @if ($local->type == 'tour')
                          <option selected value="tour">Tour</option>
                        @else
                          <option value="tour">Tour</option>
                        @endif
                        @if ($local->type == 'hotel')
                          <option selected value="hotel">Hotel</option>
                        @else
                          <option value="hotel">Hotel</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <input class="btn btn-primary" type="submit" value="Editar">
                    </div>
                  </form>
              </tr>
              <tr class="odd gradeX collapse">
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $locales->render() !!}
      </div>
    </div>
  </div>
@endsection
