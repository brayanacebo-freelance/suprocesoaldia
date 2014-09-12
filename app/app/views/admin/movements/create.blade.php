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

    @if(Session::has('notifications'))
      <div class="alert alert-error">
       <button type="button" class="close" data-dismiss="alert">×</button>
       {{Session::get('notifications')}}
      </div>
    @endif

   <!-- content-breadcrumb -->
   <div class="content-breadcrumb">
    <!--breadcrumb-->
    <ul class="breadcrumb">
      <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> <span class="divider">›</span></li>
      <li><a href="{{ route('clients.show', $client->id) }}"><i class="icofont-circle-arrow-right"></i> Información del cliente</a> <span class="divider">›</span></li>
      <li><a href="{{ route('clients.processes.show', array($client->id, $process->id)) }}"><i class="icofont-circle-arrow-right"></i> Hoja de vida</a> <span class="divider">›</span></li>
      <li class="active">Nuevo movimiento</li>
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
              <span>Nuevo movimiento</span>
            </div><!--/box header-->
            <!--box body-->
            <div class="box-body">
              <!--validation-->
              <div class="row-fluid">
                {{ Form::open(array('route' => array('clients.processes.movements.store', $client->id, $process->id), 'id'=>'form-validate')) }}
                <fieldset>
                  <legend>Ingresa los siguientes datos</legend>
                  <div class="row-fluid">
                    <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="inputSelect">Actuación</label>
                        <div class="select2-container" id="s2id_inputSelect" style="width: 200px">
                          {{ Form::select('action_type', $actions, null, array('style'=>"width: 200px; display: none;", 'data-placeholder'=>"Seleccione un tipo de acción", 'data-form'=>"select2")) }}
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputSelect">Tipo de notificación</label>
                        <div class="controls">
                          <div class="select2-container" id="s2id_inputSelect" style="width: 200px">
                            {{ Form::select('notification_type', $notifications, null, array('style'=>"width: 200px; display: none;", 'data-placeholder'=>"Seleccione un tipo de notificación", 'data-form'=>"select2")) }}
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputDate">Fecha de notificación</label>
                          <div class="controls">
                            <div class="input-append date" data-form="datepicker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                              <input name="notification_date" class="grd-white" data-form="datepicker" size="16" type="text" value="" data-validate="{required: true, messages:{required:'Campo obligatorio'}}">
                              <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="inputDate">Fecha de auto</label>
                          <div class="controls">
                            <div class="input-append date" data-form="datepicker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                              <input disabled name="auto_date" class="grd-white" data-form="datepicker" size="16" type="text" value="" data-validate="{required: true, messages:{required:'Campo obligatorio'}}">
                              <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="span6">
                        <div class="control-group">
                          <label class="control-label" for="inputSelect">Comentario</label>
                          <div class="controls">
                            <textarea type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="comments"rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Crear movimiento</button>
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
  <!-- {{HTML::script('admin/js/stilearn-base.js');}} -->
  {{HTML::script('admin/js/pnotify/jquery.pnotify.js');}}
  {{HTML::script('admin/js/pnotify/jquery.pnotify.demo.js');}}

  {{HTML::script('admin/js/peity/jquery.peity.js');}}
  {{HTML::script('admin/js/datatables/jquery.dataTables.min.js');}}
  {{HTML::script('admin/js/datatables/extras/ZeroClipboard.js');}}
  {{HTML::script('admin/js/datatables/extras/TableTools.js');}}
  {{HTML::script('admin/js/datatables/DT_bootstrap.js');}}
  {{HTML::script('admin/js/responsive-tables/responsive-tables.js');}}


  {{HTML::script('admin/js/holder.js');}}
  <!--{{HTML::script('admin/js/stilearn-base.js');}}-->

  <script type="text/javascript">
  $(document).ready(function() {

    $('#form-validate').validate();
                 // auto complete
                 $('#inputAuto').typeahead({
                  source : ["Juzgado Laboral del Circuito No. 1","Juzgado Laboral del Circuito No. 2","Juzgado Laboral del Circuito No. 3","Juzgado Laboral del Circuito No. 4","Juzgado Civil del Circuito No. 1","Juzgado Civil del Circuito No. 2","Juzgado Civil del Circuito No. 3","Juzgado Civil del Circuito No. 4"]
                });

                //Select
                $('[data-form=select2]').select2();
                // try your js

                // datepicker
                $('[data-form=datepicker]').datepicker();
                //$('[data-form=datepicker2]').datepicker();

                // $('[data-form=datepicker]').on('change', function() {
                //   $('[data-form=datepicker2]').datepicker({
                //     minDate: $('[data-form=datepicker]').val()
                //   });
                // });



                // peity chart
                $("span[data-chart=peity-bar]").peity("bar");

                // uniform
                $('[data-form=uniform]').uniform();

              });

</script>
@stop
