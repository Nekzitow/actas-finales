
@extends('layouts.principal')
@section('title', 'Actas')
@section('menuLateral')
  <li class="active">
    <a href="/modules/agregar/acta">
      <i class="fa fa-files-o"></i></i> <span>Generar Acta</span></i>
    </a>   
  </li>
@endsection
@section('contenido')
    <section class="content-header">
      <h1>
        Control Escolar
        <small>Actas Finales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Modulos</a></li>
        <li > <a href="#">Control Escolar</a></li>
        <li class="active">Actas Finales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-sm-3">&nbsp;</div>
      <div class="col-sm-6">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Generar Acta</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="ciclo">Ciclo</label>
                    <select class="form-control" id="idCiclo">
                      <option>Elige un ciclo</option>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="ciclo">Grupo</label>
                    <select class="form-control" id="idCiclo">
                      <option>Elige un grupo</option>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="ciclo">Materia</label>
                    <select class="form-control" id="idCiclo">
                      <option>Elige una materia</option>
                    </select>
                  </div>
            
                  <div class="form-group">
                    <label for="exampleInputFile">Subir Archivo</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Favor de subir el archivo en formato CSV.</p>
                  </div>                 
                </div>
      

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Generar Acta</button>
                </div>
              </form>
        </div>
      </div>
      <div class="col-sm-3">&nbsp;</div>
    </section>
    <!-- /.content -->
@endsection
  