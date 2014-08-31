@extends('template.base')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}

@stop


@section('content')
@parent
<!-- span content -->
<div class="span11">
  <!-- content -->
  <div class="content">
    <!-- content-header -->
    <div class="content-header">
      <ul class="content-header-action pull-right">
        <li class="divider"></li>
        <li>
          <a href="#">
            <div class="badge-circle color-white">
              <div class="grd-teal">
                <i class="icofont-folder-open-alt"></i>
              </div>
            </div>
            <div class="action-text color-teal">{{ count($clients) }} <span class="helper-font-small color-silver-dark">correo por enviar</span></div>
          </a>
        </li>
      </ul>
      <h2><i class="icofont-table"></i> Enviar correo</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="#"><i class="icofont-circle-arrow-right"></i> Enviar correo</a> <span class="divider">&rsaquo;</span></li>
        <!-- <li class="active">Movimientos</li> -->
      </ul><!--/breadcrumb-->
    </div><!-- /content-breadcrumb -->

    <!-- content-body -->
    <div class="content-body">
<!-- <div class="row-fluid">
<div class="span8"><h3>Movimientos durante la última semana</h3></div>
</div> -->
<div class="row-fluid">
  <div class="span12">
  @foreach($clients as $client)
    <div class="box corner-all">
      <div class="box-header grd-teal color-white corner-top">
        <div class="header-control">
          <a data-box="collapse"><i class="icofont-caret-up"></i></a>
        </div>
        <span>Cliente: {{ $client->name }}</span>
      </div>
      <div class="box-body">
        <div class="row-fluid">
          <div class="span12">
            <table class="table table-bordered responsive">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Despacho</th>
                  <th>Demandante(s)</th>
                  <th>Demandado(s)</th>
                  <th>Actualización</th>
                </tr>
              </thead>
              <tbody>
                @foreach($client->processes as $process)
                  <tr>
                    <td>{{ $process->id }}</td>
                    <td>{{ $process->office->name }}</td>
                    <td>{{ $process->claimant }}</td>
                    <td>{{ $process->defendant }}</td>
                    <td>{{ $process->updated_at }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <p>
            <button type="button" data-id="{{ $client->id }}" data-url="{{ route('clients.notify', $client->id) }}" class="btn btn-large btn-success">Enviar Correo</button>
          </p>
          <!-- side-task -->
          <div class="side-task">
            <div class="task active">
              <span class="task-header">
                <img src="img/loader_16.gif" /> 
                <strong id="title_{{ $client->id }}">Enviar correo</strong>
              </span>
              <div class="progress progress-striped active" rel="tooltip" title="40%">
                <div class="bar bar-success" style="width: 0%;" id="progress_{{ $client->id }}"></div>
              </div>
            </div>
            <div class="task fade in" id="success_{{ $client->id }}" style="display:none">
              <i class="icofont-ok-sign color-green" title="success"></i>
              <span class="task-desc">Correo enviado exitosamente</span>
              <button data-dismiss="alert" class="close">&times;</button>
            </div>
            <div class="task fade in" id="error_{{ $client->id }}"style="display:none">
              <i class="icofont-remove-sign color-red" title="failed"></i>
              <span class="task-desc">Ha ocurrido un error, intente nuevamente</span>
              <button data-dismiss="alert" class="close">&times;</button>
            </div>
          </div><!-- /side-task -->
        </div>
      </div><!-- /box-body -->
    </div><!-- /box -->
  @endforeach
  </div><!-- /span -->
</div><!--/datatables-->

<!--/tables-->
</div><!--/content-body -->
</div><!-- /content -->
</div><!-- /span content -->
@stop


@section('customscript')
  @parent

  <script type="text/javascript">
    $('.btn-success').on('click', function() {
        var $this = $(this),
            client_id = $this.data('id');
            url = $this.data('url'), 
            $title = $('#title_' + client_id),
            $progress = $('#progress_' + client_id),
            fakeProgress = 0;

        $title.html('Enviando correo');
        $progress.css('width', '20%');
        
        var interval = setInterval(function() {
          fakeProgress = fakeProgress + 20;
          $progress.css('width', fakeProgress + '%');
        }, 1000);

        $.ajax(url,
          {
            method: 'POST'
          }
        ).then(function(){
          $('#title_' + client_id).html('Correo enviado');
          $('#success_' + client_id).fadeIn();
          $('#progress_' + client_id).css('width', '100%');

          clearInterval(interval);
          fakeProgress = 0;
        }, function() {
          $('#title_' + client_id).html('Error al enviar');
          $('#error_' + client_id).fadeIn();
          $('#progress_' + client_id).css('width', '0%');

          clearInterval(interval);
          fakeProgress = 0;
        });
    });
  </script>

@stop