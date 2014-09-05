@extends('template.base')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}
@stop



@section('content')
@parent

<div class="span9">
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
            <div class="action-text color-teal">{{ count($client->processes) }} <span class="helper-font-small color-silver-dark">procesos</span></div>
          </a>
        </li>
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
      <h2><i class="icofont-table"></i>  Procesos</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">

        <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i>  Procesos</a> <span class="divider">&rsaquo;</span></li>
        <li class="active">Información del cliente</li>
      </ul><!--/breadcrumb-->
    </div><!-- /content-breadcrumb -->

    <!-- content-body -->
    <div class="content-body">
      @if(Session::has('notifications'))
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert">×</button>
       {{Session::get('notifications')}}
     </div>
     @endif

     <div class="span6">
      @if( !Auth::user()->isClient() )
      <p>
        <a href="{{ route('client.movements.processreport') }}?id={{$client->id}}" class="btn btn-block btn-success">Generar informe</a>
      </p>
      @endif
    </div>
    <div class="span6">
      @if( !Auth::user()->isClient() )
      <p>
        <a href="{{ route('clients.processes.create', $client->id) }}" class="btn btn-block btn-primary">Nuevo proceso</a>
      </p>
      @endif
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="box corner-all">
          <div class="box-header grd-teal color-white corner-top">
            <div class="header-control">
              <a data-box="collapse"><i class="icofont-caret-up"></i></a>
            </div>
            <span>Lista de procesos</span>
          </div>
          <div class="box-body">
            <table id="datatables" class="table table-bordered table-striped responsive">
              <thead>
                <tr>
                  <th>Cód.</th>
                  <th>Carpeta</th>
                  <th>Radicación</th>
                  <th>Demandante</th>
                  <th>Demandado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($client->processes as $process)
                <tr class="odd gradeA">
                  <td><a href="#" class="btn btn-link btn-small">{{ $process->id }}</a></td>
                  <td>{{ $process->folder_number }}</td>
                  <td>{{ $process->creation_number }}</td>
                  <td>{{ $process->claimant }}</td>
                  <td>{{ $process->defendant }}</td>
                  <td class="center">
                    <a href="{{ route('clients.processes.show', array($client->id, $process->id)) }}" class="btn btn-success btn-small">Ver <i class="icofont-angle-right"></i></a>

                    @if (Auth::user()->isAdmin())
                      @if ($process->archived === 1)
                      <a href="{{ route('clients.pnoarchive', $process->id) }}" class='btn btn-info btn-small'>Sacar de archivados
                      </a>
                      @endif
                      @if ($process->archived !== 1)
                      <a href="{{ route('clients.parchive', $process->id) }}" class='btn btn-warning btn-small'>Archivar 
                      </a>
                      @endif
                    @endif


                    @if($process->isDeletable())
                    <button data-route="{{ route('clients.processes.destroy', array($client->id, $process->id))}}" class='btn btn-danger btn-small btn-delete'>
                      <span>
                        <i class="icofont-angle-right"></i>
                      </span> Eliminar
                    </button>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div><!-- /box-body -->
        </div><!-- /box -->
      </div><!-- /span -->
    </div><!--/datatables-->

    <!--/tables-->
  </div><!--/content-body -->
</div><!-- /content -->
</div>
<div class="span2">
  <!-- side-right -->
  <aside class="side-right" style="top: 60px;">
    <!-- sidebar-right -->
    <div class="sidebar-right">
      <!--sidebar-right-header-->
      <div class="sidebar-right-header">
                                <!-- <div class="sr-header-right">
                                    <h2><span class="label label-info">254849</span></h2>
                                  </div> -->
                                  <div class="sr-header-left">
                                    <p class="bold">Datos básicos</p>
                                    <small class="muted">22 Dic 2013</small>
                                  </div>
                                </div><!--/sidebar-right-header-->
                                <!--sidebar-right-control-->
                                <div class="sidebar-right-control">
                                  <ul class="sr-control-item">
                                    <li class="active"><a href="#alt1" data-toggle="tab" title="alternative 1"><i class="icofont-file-alt"></i></a></li>
                                  </ul>
                                </div><!-- /sidebar-right-control-->
                                <!-- sidebar-right-content -->
                                <div class="sidebar-right-content">
                                  <div class="tab-content">
                                    <!--alternative 1-->
                                    <div class="tab-pane fade active in" id="alt1">

                                      <p>
                                        <span class="color-teal">Empresa</span><br>{{ $client->enterprise }}
                                      </p>
                                      <div class="divider-content2"></div>
                                      <p>
                                        <span class="color-teal">Responsable</span><br>{{ $client->in_charge }}
                                      </p>
                                      <div class="divider-content2"></div>
                                      <p>
                                        <span class="color-teal">Teléfono</span><br>{{ $client->phone }}
                                      </p>
                                      <div class="divider-content2"></div>
                                      <p>
                                        <span class="color-teal">Email</span><br>{{ $client->user->email }}
                                      </p>

                                      <a href="{{ route('clients.edit' , array($client->id)) }}" class="btn btn-primary btn-mini btn-block"><i class="icofont-pencil"></i> Editar</a>

                                      <div class="divider-content"><span></span></div> <!--divider-->
                                    </div><!--/alternative 1-->

                                  </div>
                                </div><!-- /sidebar-right-content -->
                              </div><!-- /sidebar-right -->
                            </aside><!-- /side-right -->
                          </div>

                          <!--box body-->
                          <div class="box-body">
                           <!-- Modal -->
                           <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                               <h3 id="myModalLabel">Eliminar</h3>
                             </div>
                             <div class="modal-body">
                               <p>¿Estás seguro de eliminar el proceso?</p>
                             </div>
                             <div class="modal-footer">
                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                               <button class="btn btn-primary" id="modal_confirm">Confirmar</button>
                             </div>
                           </div>
                         </div><!--/box body-->
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
                // try your js
                $('.btn-delete').on('click', function() {
                  var $modal = $('#modal');
                  $('#modal_confirm').data('route', $(this).data('route'));
                  $modal.modal();
                });
                $('#modal_confirm').on('click', function() {
                  var $this = $(this), route = $this.data('route');

                  $.ajax(route, {
                    method: 'POST',
                    data: {
                      _method: 'DELETE'
                    }
                  }).then(function() {
                    location.reload();
                  }, function () {
                    location.reload();
                  });
                });
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
