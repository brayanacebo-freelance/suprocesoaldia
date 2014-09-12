@extends('template.base')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}

@stop



@section('content')
@parent
<div class="span11">
    <div class="content">
        <!-- content-header -->
        <div class="content-header">
            <ul class="content-header-action pull-right">
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div class="badge-circle color-white">
                            <div class="grd-teal">
                                <i class="icofont-thumbs-up"></i>
                            </div>
                        </div>
                        <div class="action-text color-teal">{{ count($clients) }}<span class="helper-font-small color-silver-dark">Clientes</span></div>
                    </a>
                </li>
            </ul>
            <h2><i class="icofont-table"></i> Clientes</h2>
        </div><!-- /content-header -->

        <!-- content-breadcrumb -->
        <div class="content-breadcrumb">
            <!--breadcrumb-->
            <ul class="breadcrumb">

                <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> 
                    <span class="divider">&rsaquo;</span></li>
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
                    @if (!Auth::user()->isAssistant())
                        <div class="span9"></div>
                        <div class="span3">
                            <p>
                                <a href="{{ route('clients.create') }}" class="btn btn-block btn-primary">
                                    Nuevo cliente
                                </a>
                            </p>
                        </div>
                    @endif
                
                <!-- tables -->
                <!--datatables-->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box corner-all">
                            <div class="box-header grd-teal color-white corner-top">
                                <span>Lista de clientes</span>
                            </div>
                            <div class="box-body">
                                <table id="datatables" class="table table-bordered table-striped responsive">
                                    <thead>
                                        <tr>
                                            <th>Cód</th>
                                            <th>Nombre</th>
                                            <th>Responsable</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    @foreach($clients as $client)
                                        <tr class="odd gradeA">
                                            <td><a href="{/seguimiento/judicial"} class="btn btn-link btn-small">{{ $client->id }}</a></td>
                                            <td>{{ $client->enterprise }}</td>
                                            <td>{{ $client->in_charge }}</td>
                                            <td class="center">
                                                <a href="{{ route('clients.show', $client->id) }}" class='btn btn-success btn-small'>
                                                    <span>
                                                        <i class="icofont-angle-right"></i>
                                                    </span> Ver 
                                                </a>

                                                @if (Auth::user()->isAdmin())
                                                    @if ($client->user->archived === 1)
                                                        <a href="{{ route('clients.noarchive', $client->id) }}" class='btn btn-info btn-small'>Sacar de archivados
                                                        </a>
                                                    @endif
                                                    @if ($client->user->archived !== 1)
                                                        <a href="{{ route('clients.archive', $client->id) }}" class='btn btn-warning btn-small'>Archivar 
                                                        </a>
                                                    @endif
                                                @endif

                                                @if (Auth::user()->isAdmin())
                                                    @if ($client->user->suspended === 1)
                                                        <a href="{{ route('clients.nosuspended', $client->id) }}" class='btn btn-info btn-small'>Sacar de suspendidos
                                                        </a>
                                                    @endif
                                                    @if ($client->user->suspended !== 1)
                                                        <a href="{{ route('clients.suspended', $client->id) }}" class='btn btn-warning btn-small'>Suspender 
                                                        </a>
                                                    @endif
                                                @endif

                                                @if($client->isDeletable())
                                                <button  data-route="{{route('clients.destroy', $client->id)}}" class='btn btn-danger btn-small btn-delete'>
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

        <!--box body-->
         <div class="box-body">    
             <!-- Modal -->
             <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h3 id="myModalLabel">Eliminar</h3>
                 </div>
                 <div class="modal-body">
                     <p>¿Estás seguro de eliminar el cliente?</p>
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
