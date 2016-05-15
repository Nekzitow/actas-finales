
 @extends('layouts.principal')
 @section('title', 'Actas')
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

      <?php 
        $fp = fopen ( "/home/osorio/Documentos/control escolar sistema/actafinal.CSV" , "r" ); 
          while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) { // Mientras hay líneas que leer...
            if (count(str_split($data[1])) > 2 && $data[1] != 'Nombre del Alumno(a)') {
              echo $data[1]."   ";
              echo $data[3]."<br>";   
            } 

          } 
        fclose ( $fp ); 
      ?>
    </section>
    <!-- /.content -->
  @endsection
  