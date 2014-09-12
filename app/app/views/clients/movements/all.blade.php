@extends('template.baseclients')

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
                          <div class="grd-red">
                              <i class="icofont-folder-open-alt"></i>
                          </div>
                      </div>
                      <div class="action-text color-red">{{ count($movements) }} <span class="helper-font-small color-silver-dark">movimientos</span></div>
                  </a>
              </li>
          </ul>
          <h2><i class="icofont-table"></i> Movimientos</h2>
      </div><!-- /content-header -->
      
      <!-- content-breadcrumb -->
      <div class="content-breadcrumb">
          <!--breadcrumb-->
          <ul class="breadcrumb">
              <li><a href="#"><i class="icofont-circle-arrow-right"></i> Movimientos</a> <span class="divider">&rsaquo;</span></li>
              <li class="active">Movimientos</li>
          </ul><!--/breadcrumb-->
      </div><!-- /content-breadcrumb -->
      
      <!-- content-body -->
      <div class="content-body">
          <div class="row-fluid">
              <div class="span8"><h3>Movimientos durante la última semana</h3></div>
              <div class="span4">
                  <p>
                      <a href="{{ route('client.movements.report') }}?id={{$client->id}}" class="btn btn-block btn-primary">Reporte de movimientos</a>
                  </p>
              </div>
          </div>
          <div class="row-fluid">
              <div class="span12">
                  <div class="box corner-all">
                      <div class="box-header grd-teal color-white corner-top">
                          <div class="header-control">
                              <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                          </div>
                          <span>Lista de movimientos </span>
                      </div>
                      <div class="box-body">
                          <table id="datatables" class="table table-bordered table-striped responsive">
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

                              @foreach($movements as $movement)
                                  <tr>
                                      <td>{{ $movement->id }}</a></td>
                                      <td>{{ $movement->date }}</td>
                                      <td>{{ $movement->process->claimant }}</td>
                                      <td>{{ $movement->process->defendant }}</td>
                                      <td>{{ $movement->comments }}</td>
                                      <td class="center"><a href="{{ route('clients.processes.show', array($client->id, $movement->process->id)) }}" class="btn btn-success btn-small">Ver <i class="icofont-angle-right"></i></a></td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                          <!--{{ route('clients.processes.show', $client->id, $movement->process->id) }}-->
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
<<<<<<< HEAD
<!-- {{HTML::script('admin/js/stilearn-base.js');}} -->
=======
<!--{{HTML::script('admin/js/stilearn-base.js');}}-->
>>>>>>> 21ebd01ed18e0ee611719ea883f54505b7debf59

<script type="text/javascript">
$(document).ready(function() {
    // try your js
    
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
