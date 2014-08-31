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
@section('header')
	@parent
            <!--nav bar helper-->
            <div class="navbar-helper">
                <div class="row-fluid">
                    <!--panel site-name-->
                    <div class="span9">
                        <div class="panel-sitename">
                            <h2><a href="index.html"><span class="color-teal">Seguimiento</span> Judicial</a></h2>
                        </div>
                    </div>
                    <!--/panel name-->

                    <div class="span2">
                       
                    </div>
                    <div class="span1">
                        <!--panel button ext-->
                        <div class="panel-ext">
                            <div class="btn-group user-group">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                
                               		{{ HTML::image("admin/img/avatar-thumb.jpg", "avatar",array('class' =>'corner-all' , 'aling'=>'middle','title'=>'John Doe','alt'=>'John Doe')) }}
                                    <!--this for display on PC device-->
                                    <button class="btn btn-small btn-inverse">Javier Sanchez</button> <!--this for display on tablet and phone device-->
                                </a>
                                <ul class="dropdown-menu dropdown-user" role="menu" aria-labelledby="dLabel">
                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                           	 {{ HTML::image("admin/img/avatar.jpg", "avatar",
                                           	 array('class' =>'img-circle','aling'=>'middle','title'=>'profile','alt'=>'profile')) }}
                                                
                                            </a>
                                            <div class="media-body description">
                                                <p><strong>Javier Sanchez</strong></p>
                                                <p class="muted">javiersanchez@mail.com</p>
                                                <p class="muted">Administrador</p>
                                                <a class="btn btn-primary btn-small btn-block">Ver Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-footer">
                                        <div>
                                            <a class="btn btn-small" href="#">Cerrar sesión</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!--panel button ext-->
                    </div>
                </div>
            </div><!--/nav bar helper-->
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
                                        <div class="action-text color-teal">10 <span class="helper-font-small color-silver-dark">Departamentos</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-table"></i> Departamentos</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="departamentos.html"><i class="icofont-circle-arrow-right"></i> Departamentos</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Editar departamento</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">
                            <div class="span12">
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
                                                    <span>Editar departamento </span>
                                                </div><!--/box header-->
                                                <!--box body-->
                                                <div class="box-body">
                                                    <!--validation-->
                                                    <div class="row-fluid">
                                                        <form class="form-horizont" id="form-validate">
                                                            <fieldset>
                                                                <!-- <legend>Datos básicos</legend> -->
                                                                <div class="control-group">
                                                                    <label class="control-label" for="required">Nombre</label>
                                                                    <div class="controls">
                                                                        <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="required" id="required" value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn btn-primary">Editar departamento
                                                                    </button>
                                                                </div>
                                                            </fieldset>
                                                        </form><!--/validation-->
                                                    </div>
                                                </div><!--/box body-->
                                            </div><!--/box-->
                                        </div><!--/span--> 
                                    </div><!--/validation-->
                            </div>

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

                $('#form-validate').validate();
                $('#form-validate2').validate();
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
