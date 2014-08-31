@extends('template.base')

@section('customstyle')
    @parent

        {{HTML::style('admin/css/DT_bootstrap.css');}}
    {{HTML::style('admin/css/datepicker.css');}}
    {{HTML::style('admin/css/colorpicker.css');}}
    {{HTML::style('admin/css/select2.css');}}
        {{HTML::style('admin/css/bootstrap-wysihtml5.css');}}
        {{HTML::style('admin/css/responsive-tables.css');}}

@stop


@section('content')
  @parent
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
  <div class="grd-green">
    <i class="icofont-tag"></i>
  </div>
</div>
<div class="action-text color-green">{{ $client->id }} <span class="helper-font-small color-silver-dark">Cód. Cliente</span></div>
</a>
</li>
<li class="divider"></li>
<li>
<a href="#">
<div class="badge-circle color-white">
  <div class="grd-orange">
    <i class="icofont-tag"></i>
  </div>
</div>
<div class="action-text color-orange">{{ $process->id }} <span class="helper-font-small color-silver-dark">Cód. Proceso</span></div>
</a>
</li>
</ul>
<h2><i class="icofont-table"></i> Clientes</h2>
</div><!-- /content-header -->

<!-- content-breadcrumb -->
<div class="content-breadcrumb">
<!--breadcrumb-->
<ul class="breadcrumb">
<li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> <span class="divider">›</span></li>
<li><a href="{{ route('clients.show', $client->id) }}"><i class="icofont-circle-arrow-right"></i> Información del cliente</a> <span class="divider">›</span></li>
<li><a href="{{ route('clients.processes.show', array($client->id, $process->id)) }}"><i class="icofont-circle-arrow-right"></i> Hoja de vida</a> <span class="divider">›</span></li>
<li class="active">Editar movimiento</li>
</ul><!--/breadcrumb-->
</div><!-- /content-breadcrumb -->

<!-- content-body -->
<div class="content-body">
<!-- =========================================
      VALIDATION
      =========================================== -->
      <!--validation-->
      <div id="validation" class="row-fluid">
        <!--span-->
        <div class="span12">
          <!--box-->
          <div class="box corner-all">
            <!--box header-->
            <div class="box-header grd-teal color-white corner-top">
              <div class="header-control">
                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                <!-- <a data-box="close">&times;</a> -->
              </div>
              <span>Editar movimiento</span>
            </div><!--/box header-->
            <!--box body-->
            <div class="box-body">
              <!--validation-->
              <div class="row-fluid">
          <form class="form-horizont" id="form-validate" action="{{route('clients.processes.movements.update', array($client->id, $process->id, $movement->id))}}" method="POST">
            <input type="hidden" value="PUT" name="_method">
                  <fieldset>
                    <legend>Ingresa los siguientes datos</legend>
                    <div class="row-fluid">
                      <div class="span6">
                        <div class="control-group">
                          <label class="control-label" for="inputSelect">Actuación</label>
                            <div class="select2-container" id="s2id_inputSelect" style="width: 200px">
                            {{ Form::select('action_type', $actions, $movement->action_type, array('style'=>"width: 200px; display: none;", 'data-placeholder'=>"Seleccione un tipo de acción", 'data-form'=>"select2")) }}
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputSelect">Tipo de notificación</label>
                        <div class="controls">
                          <div class="select2-container" id="s2id_inputSelect" style="width: 200px">
                          {{ Form::select('notification_type', $notifications, $movement->notification_type, array('style'=>"width: 200px; display: none;", 'data-placeholder'=>"Seleccione un tipo de notificación", 'data-form'=>"select2")) }}
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="inputDate">Fecha de notificación</label>
                      <div class="controls">
                        <div class="input-append date" data-form="datepicker" data-date="{{ with(new DateTime($movement->notification_date))->format('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                          <input data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="notification_date" class="grd-white" data-form="datepicker" size="16" type="text" value="{{ with(new DateTime($movement->notification_date))->format('d-m-Y') }}">
                          <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="inputDate">Fecha de auto</label>
                      <div class="controls">
                        <div class="input-append date" data-form="datepicker" data-date="{{ with(new DateTime($movement->auto_date))->format('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                          <input data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="auto_date" class="grd-white" data-form="datepicker" size="16" type="text" value="{{ with(new DateTime($movement->auto_date))->format('d-m-Y') }}">
                          <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="span6">
                    <div class="control-group">
                      <label class="control-label" for="inputSelect">Comentario</label>
                      <div class="controls">
                        <textarea type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="comments"rows="4">{{ $movement->comments }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  @foreach ($movement->images as $image)
                    <img src="{{ $image }}" width="120" height="184" alt=""/>
                  @endforeach
                </div>
                <div class="form-actions">
                  <div id="dropzone-id" class="dropzone"></div>
                  <button type="submit" class="btn btn-primary">Guardar movimiento</button>
                </div>
              </fieldset>

              {{ Form::close() }}
              </div>

              <!--/validation-->
            </div>
          </div><!--/box body-->
        </div><!--/box-->
      </div><!--/span-->
    </div><!--/validation-->
  </div><!--/content-body -->
</div>
@stop

@section('customscript')
    @parent

        {{HTML::script('admin/js/datepicker/bootstrap-datepicker.js');}}
        {{HTML::script('admin/js/colorpicker/bootstrap-colorpicker.js');}}
        {{HTML::script('admin/js/select2/select2.js');}}
        {{HTML::script('admin/js/wysihtml5/wysihtml5-0.3.0.js');}}
        {{HTML::script('admin/js/wysihtml5/bootstrap-wysihtml5.js');}}
        {{HTML::script('admin/js/wizard/jquery.ui.widget.js');}}
        {{HTML::script('admin/js/wizard/jquery.wizard.js');}}
        {{HTML::script('admin/js/stilearn-base.js');}}
        {{HTML::script('admin/js/pnotify/jquery.pnotify.js');}}
        {{HTML::script('admin/js/pnotify/jquery.pnotify.demo.js');}}

        {{HTML::script('admin/js/peity/jquery.peity.js');}}
        {{HTML::script('admin/js/datatables/jquery.dataTables.min.js');}}
        {{HTML::script('admin/js/datatables/extras/ZeroClipboard.js');}}
        {{HTML::script('admin/js/datatables/extras/TableTools.js');}}
        {{HTML::script('admin/js/datatables/DT_bootstrap.js');}}
        {{HTML::script('admin/js/responsive-tables/responsive-tables.js');}}


        {{HTML::script('admin/js/holder.js');}}
        {{HTML::script('admin/js/stilearn-base.js');}}
        {{HTML::script('admin/js/dropzone.js');}}

        <script type="text/javascript">
            $(document).ready(function() {

                  $('#form-validate').validate();
                //Select
                $('[data-form=select2]').select2();
                // try your js

                // datepicker
                $('[data-form=datepicker]').datepicker();

                // peity chart
                $("span[data-chart=peity-bar]").peity("bar");

                // uniform
                $('[data-form=uniform]').uniform();


                var myDropzone = new Dropzone("#dropzone-id",
                    {
                      url: "{{ route('clients.processes.movements.upload', array($client->id, $process->id, $movement->id)) }}",
                      dictDefaultMessage: 'Arrastra archivos o has click.',
                      acceptedFiles : 'image/*',
                    });

            });

        </script>
@stop
