@extends('template.baseclients')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}
{{HTML::style('admin/css/datepicker.css');}}
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
<!-- <li class="divider"></li>
<li>
    <a href="#">
        <div class="badge-circle color-white">
            <div class="grd-red">
                <i class="icofont-folder-open-alt"></i>
            </div>
        </div>
        <div class="action-text color-red">6 <span class="helper-font-small color-silver-dark">movimientos</span></div>
    </a>
  </li> -->
</ul>
<h2><i class="icofont-table"></i> Movimientos</h2>
</div><!-- /content-header -->

<!-- content-breadcrumb -->
<div class="content-breadcrumb">
<!--breadcrumb-->
<ul class="breadcrumb">
  <li><a href="#"><i class="icofont-circle-arrow-right"></i> Movimientos</a> <span class="divider">&rsaquo;</span></li>
  <li class="active">Reporte de movimientos</li>
</ul><!--/breadcrumb-->
</div><!-- /content-breadcrumb -->

<!-- content-body -->
<div class="content-body">
<div class="row-fluid">
  <div class="span12">
    <div class="box corner-all">
      <div class="box-header grd-teal color-white corner-top">
        <div class="header-control">
          <a data-box="collapse"><i class="icofont-caret-up"></i></a>
        </div>
        <span>Reporte de movimientos</span>
      </div>
      <div class="box-body">
        <form class="form-horizont" id="form-validate">
          <fieldset>
            <legend>Ingresa los siguientes datos</legend>
            <div class="row-fluid">
              <div class="span6">
                <div class="control-group">
                  <label class="control-label" for="inputDate">Desde</label>
                  <div class="controls">
                    <div class="input-append date" data-form="datepicker" data-date="{{ date('d-m-Y') }}" data-date-format="dd/mm/yyyy">
                      <input id="from" class="grd-white" readonly data-form="datepicker" size="16" type="text" value="">
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputDate">Hasta</label>
                  <div class="controls">
                    <div class="input-append date" data-form="datepicker" data-date="{{ date('d-m-Y') }}" data-date-format="dd/mm/yyyy">
                      <input id="until" class="grd-white" readonly data-form="datepicker" size="16" type="text" value="">
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-actions">
              <button id="submit" type="submit" class="btn btn-primary">Generar reporte</button>
            </div>
          </div>
        </fieldset>
      </form>
      <div style="height:30px"></div>
      <table id="datatable" class="table table-bordered table-striped responsive">
        <thead>
          <tr>
            <th>Cód.</th>
            <th>Notificación</th>
            <th>Demandante</th>
            <th>Demandado</th>
            <th>Comentario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div><!-- /box-body -->
  </div><!-- /box -->
</div><!-- /span -->
</div><!--/datatables-->

<!--/tables-->
</div><!--/content-body -->
</div><!-- /content -->
</div><!-- /span content -->

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
<!-- {{HTML::script('admin/js/stilearn-base.js');}} -->

{{HTML::script('admin/js/datepicker/bootstrap-datepicker.js');}}

<script type="text/javascript">
  $(document).ready(function() {
// try your js
$('[data-form=datepicker]').datepicker();

  var url = "{{ route('client.movements.json') }}";


  $('#submit').on('click', function(e) {
    e.preventDefault();
    var $this = $(this), dataTable = $('#datatable').dataTable();

    $('#datatable_wrapper').css('display', 'none');

    $.getJSON(url, {
      from: $('#from').val(),
      until: $('#until').val(),
    }).then(function(data) {
      // datatables
      dataTable.fnClearTable();
      dataTable.fnAddData(data);
      dataTable.fnDraw();

      $('#datatable_wrapper').css('display', 'block');

    }, function() {
      console.log(arguments);
    });

  });
  $('#datatable').dataTable( {
    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ records per page"
    }
  });
  $('#datatable_wrapper').css('display', 'none');
});
</script>
@stop
