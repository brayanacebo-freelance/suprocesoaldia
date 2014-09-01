@extends('template.base')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
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
      </ul>
      <h2><i class="icofont-table"></i> Clientes</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> <span class="divider">&rsaquo;</span></li>
        <li><a href="{{ route('clients.processes.show', array($client->id, $process->id)) }}"><i class="icofont-circle-arrow-right"></i> Información del proceso</a> <span class="divider">&rsaquo;</span></li>
        <li class="active">Editar proceso</li>
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
        <span>Editar proceso</span>
      </div><!--/box header-->
      <!--box body-->
      <div class="box-body">

        <!--validation-->
        <div class="row-fluid">
          <form class="form-horizont" id="form-validate" action="{{route('clients.processes.update' , array($client->id , $process->id))}}" method="POST">

            <input type="hidden" value="PUT" name="_method">
            <fieldset>
              <legend>Ingresa los siguientes datos</legend>
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="required">Carpeta</label>
                    <div class="controls">
                      <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="creation_number" id="required" value="{{$process->folder_number}}" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="required">Radicación</label>
                    <div class="controls">
                      <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="creation_number" id="required" value="{{$process->creation_number}}" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputSelect">Departamento</label>
                    <div class="controls">
                     {{ Form::select('department_id', $departments, $process->department_id, array('style'=>"width:200px", 'data-placeholder'=>"Seleccione un departamento")) }}
                   </div>
                 </div>
                 <div class="control-group">
                  <label class="control-label" for="inputSelect">Ciudad</label>
                  <div class="controls">
                    {{ Form::select('city_id', $cities, $process->city_id ,array('style'=>"width:200px", 'data-placeholder'=>"Seleccione una ciudad")) }}
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputAuto">Despacho</label>
                  <div class="controls">
                      {{ Form::select('office_id', $offices, $process->office_id ,array('style'=>"width:200px", 'data-placeholder'=>"Seleccione un depacho")) }}
                    </div>
                </div>
              </div>
              <div class="span6">
                <div class="control-group">
                  <label class="control-label" for="inputSelect">Tipo de proceso</label>
                  <div class="controls">
                    {{ Form::select('process_type', $types, $process->process_type,  array('style'=>"width:200px", 'data-placeholder'=>"Seleccione un tipo de proceso")) }}
                  </div>
                </div>
                     <div id="content_demand">

                                @foreach(explode('<br>', $process->claimant) as $key => $claimant)
                                  <div id="claimant-{{ $key }}" class="control-group control-claimant">
                                     <label class="control-label" for="required">Demandante - Numero de documento</label>
                                     <div class="controls">
                                      <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="claimant[]" id="required" value="{{ $claimant }}"/>
                                      <a type="button" class="btn btn-danger delete-claimant" data-claimant="{{ $key }}" >Eliminar</a>
                                    </div>
                                  </div>
                                @endforeach

                                @foreach(explode('<br>', $process->defendant) as $key => $defendant)
                                <div id="defendant-{{ $key }}" class="control-group control-defendant">
                                 <label class="control-label" for="required">Demandando - Numero de documento</label>
                                 <div class="controls">
                                  <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="defendant[]" id="required"  value="{{ $defendant }}"  />
                                  <a type="button" class="btn btn-danger delete-defendant" data-defendant="{{ $key }}" >Eliminar</a>
                                </div>
                                </div>
                                @endforeach

                      </div>
                          <div class="span6">
                            <a href="#" class="btn" id="add_new_demant">Agregar Demandante</a> <br/>
                            <a href="#" class="btn" id="add_new_de">Agregar Demandado</a>
                           </div>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Editar proceso</button>
            </div>
          </div>
        </fieldset>
      </form><!--/validation-->
    </div>
  </div><!--/box body-->
</div><!--/box-->
</div><!--/span-->
</div><!--/validation-->
</div><!--/content-body -->
</div><!-- /content -->
</div>
@stop

                                      @section('customscript')
                                      @parent

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

                                                              $('#add_new_demant').click(function(){
                              $('#content_demand').append('<div class="control-group"><label class="control-label" for="required">Demandante - Numero de documento</label><div class="controls"><input type="text" class="grd-white" data-validate="{required: true, messages:{required:\'Campo obligatorio\'}}" name="claimant[]" id="required" /></div> </div>');
                    });
                    $('#add_new_de').click(function(){
                              $('#content_demand').append('<div class="control-group"><label class="control-label" for="required">Demandando - Numero de documento</label> <div class="controls"> <input type="text" class="grd-white" data-validate="{required: true, messages:{required:\'Campo obligatorio\'}}" name="defendant[]" id="required" /> </div>');
                    });
                    $('.delete-claimant').on('click', function () {
                        var $this = $(this);

                        if ($('.control-claimant').size() === 1) {
                          alert('Al menos un demandante es necesario');
                          return;
                        }

                        var claimant = $this.data('claimant');
                        $('#claimant-' + claimant).remove();
                    });
                    $('.delete-defendant').on('click', function () {
                        var $this = $(this);

                        if ($('.control-defendant').size() === 1) {
                          alert('Al menos un demandado es necesario');
                          return;
                        }

                        var defendant = $this.data('defendant');
                        $('#defendant-' + defendant).remove();
                    });
                // try your js
                  $('#form-validate').validate();

                // peity chart
                $("span[data-chart=peity-bar]").peity("bar");

                // uniform
                $('[data-form=uniform]').uniform();

                // datatables
                $('#datatables').dataTable( {
                  "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                  "sPaginationType": "bootstrap",
                  "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                  }
                });

                // datatables table tools
                $('#datatablestools').dataTable({
                  "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                  "oTableTools": {
                    "aButtons": [
                    "copy",
                    "print",
                    {
                      "sExtends":    "collection",
                      "sButtonText": 'Save <span class="caret" />',
                      "aButtons":    [
                      "xls",
                      "csv",
                      {
                        "sExtends": "pdf",
                        "sPdfOrientation": "landscape",
                        "sPdfMessage": "Your custom message would go here."
                      }
                      ]
                    }
                    ],
                    "sSwfPath": "js/datatables/swf/copy_csv_xls_pdf.swf"
                  }
                });
              });
</script>
@stop

