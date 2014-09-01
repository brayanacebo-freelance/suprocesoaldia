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
          <!-- <li class="divider"></li>
          <li>
              <a href="#">
                  <div class="badge-circle color-white">
                      <div class="grd-teal">
                          <i class="icofont-folder-open-alt"></i>
                      </div>
                  </div>
                  <div class="action-text color-teal">83 <span class="helper-font-small color-silver-dark">procesos</span></div>
              </a>
            </li> -->
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
          <h2><i class="icofont-table"></i> Procesos</h2>
        </div><!-- /content-header -->

        <!-- content-breadcrumb -->
        <div class="content-breadcrumb">
          <!--breadcrumb-->
          <ul class="breadcrumb">
            <li> <a href="{{ route('clients.show', $client->id) }}"><i class="icofont-circle-arrow-right"></i> Procesos</a> <span class="divider">&rsaquo;</span></li>
            <li class="active">Hoja de vida</li>
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
          <!-- span12-->
          <div class="row-fluid">
            <div class="span12">
              <div class="box corner-all">
                <div class="box-header grd-teal color-white corner-top">
                  <div class="header-control">
                    <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                  </div>
                  <span>Datos del proceso</span>
                </div>
                <div class="box-body">
                  <div class="row-fluid">
                    <div class="span6">
                      <p>
                        <span class="color-teal">Número carpeta</span><br><span class="label label-info">{{ $process->folder_number }}</span>
                      </p>
                      <p>
                        <span class="color-teal">Número radicación</span><br><span class="label label-info">{{ $process->creation_number }}</span>
                      </p>
                      <div class="divider-content2"></div>
                      <p>
                        <span class="color-teal">Departamento</span><br>{{ $process->department->name }}
                      </p>
                      <div class="divider-content2"></div>
                      <p>
                        <span class="color-teal">Ciudad</span><br>{{ $process->city->name }}
                      </p>
                      <div class="divider-content2"></div>
                      <p>
                        <span class="color-teal">Despacho</span><br>{{ $process->office->name }}
                      </p>
                      <div class="divider-content2"></div>
                    </div>
                    <div class="span6">
                      <p>
                        <span class="color-teal">Tipo de proceso</span><br>{{ $process->type->name }}
                      </p>
                      <div class="divider-content2"></div>
                      <p>
                        <span class="color-teal">Demandante (s)</span><br>{{ $process->claimant }}
                      </p>
                      <div class="divider-content2"></div>
                      <p>
                        <span class="color-teal">Demandando(s)</span><br>{{ $process->defendant }}
                      </p>
                      <div class="divider-content2"></div>
                    </div>
                  </div>
                  @if( !Auth::user()->isClient() )
                  <div class="form-actions">
                    <a href="{{ route('clients.processes.edit', array($client->id, $process->id)) }}" class="btn btn-success"><i class="icofont-pencil"></i> Editar</a>
                  </div>
                  @endif

                </div>
              </div>
            </div>
          </div><!-- span12-->
          <!-- span12-->
          <div class="row-fluid">
            <div class="span12">
              <div class="span9"></div>
              <div class="span3">
              @if( !Auth::user()->isClient() )
                <p>
                  <a href="{{ route('clients.processes.movements.create', array($client->id, $process->id)) }}" class="btn btn-block btn-primary">Nuevo movimiento</a>
                </p>
                @endif
              </div>
            </div>
          </div>
          <div class="row-fluid">

            <div class="span12">
              <div class="box corner-all">
                <div class="box-header grd-teal color-white corner-top">
                  <div class="header-control">
                    <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                  </div>
                  <span>Movimientos</span>
                </div>
                <div class="box-body">

      <!-- =========================================
                      ACCORDION
                      =========================================== -->
                      <div class="row-fluid">
                        <div class="span12">
                          <div class="accordion" id="accordion">

                            <div class="accordion-group">
                            @foreach($process->movements as $key => $movement)
                              <div class="accordion-heading">
                                <a class="accordion-toggle {{$key === 0 ? "bg-orange color-white" : "bg-silver color-black"}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $movement->id }}">
                                  Código: {{ $movement->notification_date }}
                                </a>
                              </div>
                              <div id="collapse{{ $movement->id }}" class="accordion-body {{$key === 0 ? "in" : "collapse"}}">
                                <div class="accordion-inner">
                                  <table class="table table-bordered table-striped invoice responsive">
                                    <tbody>
                                      <tr>
                                        <td><span class="color-teal">Fecha creación</span></td>
                                        <td>{{ $movement->created_at->format('Y-m-d-H:i:s') }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Actuación</span></td>
                                        <td>{{ $movement->action->name }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Tipo notificación</span></td>
                                        <td>{{ $movement->notification->name }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Fecha notificación</span></td>
                                        <td>{{ with(new DateTime($movement->notification_date))->format('d-m-Y') }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Fecha auto</span></td>
                                        <td>{{ with(new DateTime($movement->auto_date))->format('d-m-Y') }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Comentario</span></td>
                                        <td>{{ $movement->comments }}</td>
                                      </tr>
                                      <tr>
                                        <td><span class="color-teal">Acctiones</span></td>
                                        <td>
                                          <a href="{{ route('clients.processes.movements.gallery', array($client->id, $process->id, $movement->id)) }}" class="btn btn-success btn-mini"><i class="icofont-camera"></i> Ver</a>
                                          @if( !Auth::user()->isClient() )
                                          <a href="{{ route('clients.processes.movements.edit', array($client->id, $process->id, $movement->id)) }}" class="btn btn-success btn-mini"><i class="icofont-camera"></i> Editar</a>
                                          @endif
                                        </td>

                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            @endforeach
                            </div>
                          </div>
                        </div>
                      </div>


      <!-- =========================================
                      END ACCORDION
                      =========================================== -->
                    </div>
                  </div>
                </div>
              </div><!-- span12-->
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

            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-mini btn-block"><i class="icofont-pencil"></i> Editar</a>

            <div class="divider-content"><span></span></div> <!--divider-->
          </div><!--/alternative 1-->

        </div>
      </div><!-- /sidebar-right-content -->
    </div><!-- /sidebar-right -->
  </aside><!-- /side-right -->
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
