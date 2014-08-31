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
                                            <div class="grd-teal">
                                                <i class="icofont-thumbs-up"></i>
                                            </div>
                                        </div>
                                        <div class="action-text color-teal">{{ count($departments) }} <span class="helper-font-small color-silver-dark">Departamentos</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-table"></i> Departamentos</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="{{ route('departments.index') }}"><i class="icofont-circle-arrow-right"></i> Departamentos</a> <span class="divider">&rsaquo;</span></li>
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
                            <div class="span9"></div>
                            <div class="span3">
                                <p>
                                    <a href="{{ route('departments.create') }}" class="btn btn-block btn-primary">Nuevo departamento</a>
                                </p>
                            </div>
                            <!-- tables -->
                            <!--datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box corner-all">
                                        <div class="box-header grd-teal color-white corner-top">
                                            <span>Lista de departamentos</span>
                                        </div>
                                        <div class="box-body">
                                            <table id="datatables" class="table table-bordered table-striped responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Cód</th>
                                                        <th>Nombre</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($departments as $department) 
                                                    <tr class="odd gradeA">
                                                        <td>{{ $department->id }}</td>
                                                        <td>{{ $department->name }}</td>
                                                        <td class="center"><a href="{{ route('departments.edit', $department->id) }}" class="btn btn-success btn-small">Editar <i class="icofont-angle-right"></i></a> <a href="{{ route('departments.cities.index', $department->id) }}" class="btn btn-success btn-small">Ciudades <i class="icofont-angle-right"></i></a></td>
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
@stop


@section('customscript')
    @parent
        
        {{HTML::script('admin/js/peity/jquery.peity.js');}}

        {{HTML::script('admin/js/datepicker/bootstrap-datepicker.js');}}
        {{HTML::script('admin/js/colorpicker/bootstrap-colorpicker.js');}}
        {{HTML::script('admin/js/select2/select2.js');}}
        {{HTML::script('admin/js/wysihtml5/wysihtml5-0.3.0.js');}}
        {{HTML::script('admin/js/wysihtml5/bootstrap-wysihtml5.js');}}
        {{HTML::script('admin/js/wizard/jquery.ui.widget.js');}}
        {{HTML::script('admin/js/wizard/jquery.wizard.js');}}
        {{HTML::script('admin/js/responsive-tables/responsive-tables.js');}}


        {{HTML::script('admin/js/datatables/jquery.dataTables.min.js');}}
        {{HTML::script('admin/js/datatables/extras/ZeroClipboard.js');}}
        {{HTML::script('admin/js/datatables/extras/TableTools.js');}}
        {{HTML::script('admin/js/datatables/DT_bootstrap.js');}}
        {{HTML::script('admin/js/pnotify/jquery.pnotify.js');}}
        {{HTML::script('admin/js/pnotify/jquery.pnotify.demo.js');}}


        <script type="text/javascript">
            $(document).ready(function() {

                $('form').validate();
                                                        $("form").removeAttr("novalidate");
                $('form').validate();
                                                        $("form").removeAttr("novalidate");
                // try your js

                //Select
                $('[data-form=select2]').select2();
                
                // peity chart
                $("span[data-chart=peity-bar]").peity("bar");
                
                // uniform
                $('[data-form=uniform]').uniform();
                
            });
      
        </script>
@stop
