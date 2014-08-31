@extends('template.baseclients')
@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}

@stop


@section('content')
@parent

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
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
                                            <div class="grd-orange">
                                                <i class="icofont-tag"></i>
                                            </div>
                                        </div>
                                        <div class="action-text color-orange">21358 <span class="helper-font-small color-silver-dark">Cód. Proceso</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-table"></i> Procesos</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="procesos.html"><i class="icofont-circle-arrow-right"></i> Procesos</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Hoja de vida</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">
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
                                                        <span class="color-teal">Número radicación</span><br><span class="label label-info">2012-01029</span>
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                    <p>
                                                        <span class="color-teal">Departamento</span><br>Cundinamarca
                                                    </p>
                                                        <div class="divider-content2"></div>
                                                    <p>
                                                        <span class="color-teal">Ciudad</span><br>Bogotá
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                    <p>
                                                        <span class="color-teal">Despacho</span><br>Juzgado Laboral del Circuito No. 21
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                </div>
                                                <div class="span6">
                                                    <p>
                                                        <span class="color-teal">Tipo de proceso</span><br>Tutela
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                    <p>
                                                        <span class="color-teal">Demandante (s)</span><br>Carlos Antonio Correa Posada - 9456123<br>Eduardo García Lopez - 80234581
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                    <p>
                                                        <span class="color-teal">Demandando(s)</span><br>Instituto de Seguros Sociales ISS - 8600138161
                                                    </p>
                                                    <div class="divider-content2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- span12-->
                            <!-- span12-->
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
                                            <div class="accordion-heading">
                                                <a class="accordion-toggle bg-orange color-white" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Código: 2154
                                                </a>
                                            </div>
                                            <div id="collapse1" class="accordion-body collapse in">
                                                <div class="accordion-inner">
                                                    <table class="table table-bordered table-striped invoice responsive">
                                                        <tbody>
                                                            <tr>
                                                                <td><span class="color-teal">Actuación</span></td>
                                                                <td>Archiva Tutela</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="color-teal">Tipo notificación</span></td>
                                                                <td>Estado</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="color-teal">Fecha notificación</span></td>
                                                                <td>2013-12-20</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="color-teal">Fecha auto</span></td>
                                                                <td>2013-12-19</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="color-teal">Comentario</span></td>
                                                                <td>Auto que da por terminado incidente por verificar el cumplimiento se ordena el archivo de las diligencias</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="color-teal">Fotos</span></td>
                                                                <td><a href="ver-fotos.html" class="btn btn-success btn-mini"><i class="icofont-camera"></i> Ver</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
                </div><!-- /span content -->

                <!-- span side-right -->
                <div class="span2">
                    <!-- side-right -->
                    <aside class="side-right">
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
                                            <span class="color-teal">Empresa</span><br>Abogados Asociados
                                        </p>
                                        <div class="divider-content2"></div>
                                        <p>
                                            <span class="color-teal">Responsable</span><br>Juan Carlos Rodriguez
                                        </p>
                                        <div class="divider-content2"></div>
                                        <p>
                                            <span class="color-teal">Teléfono</span><br>2554367
                                        </p>
                                        <div class="divider-content2"></div>
                                        <p>
                                            <span class="color-teal">Email</span><br>juan.rodriguez@gmail.com
                                        </p>

                                        <a href="clientes-editar.html" class="btn btn-primary btn-mini btn-block"><i class="icofont-pencil"></i> Editar</a>
                                        
                                        <div class="divider-content"><span></span></div> <!--divider-->
                                    </div><!--/alternative 1-->
                                    
                                </div>
                            </div><!-- /sidebar-right-content -->
                        </div><!-- /sidebar-right -->
                    </aside><!-- /side-right -->
                </div><!-- /span side-right -->
                
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
{{HTML::script('admin/js/stilearn-base.js');}}

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
