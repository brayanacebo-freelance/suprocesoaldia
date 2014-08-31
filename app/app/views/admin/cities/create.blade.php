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
            <div class="action-text color-teal">{{ count($department->cities) }} <span class="helper-font-small color-silver-dark">Ciudades</span></div>
          </a>
        </li>
      </ul>
      <h2><i class="icofont-table"></i> Ciudades</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="{{ route('departments.index') }}"><i class="icofont-circle-arrow-right"></i> Departamentos</a> <span class="divider">&rsaquo;</span></li>
        <li><a href="{{ route('departments.cities.index', array($department->id)) }}"><i class="icofont-circle-arrow-right"></i> Ciudades</a> <span class="divider">&rsaquo;</span></li>
        <li class="active">Nueva ciudad</li>
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
    <span>Nueva ciudad </span>
  </div><!--/box header-->
  <!--box body-->
  <div class="box-body">
    <!--validation-->
    <div class="row-fluid">
      {{ Form::open(array('route' => array('departments.cities.store', $department->id,'id'=>'form-validate'))) }}
        <fieldset>
          <!-- <legend>Datos básicos</legend> -->
          <div class="control-group">
            <label class="control-label" for="required">Nombre</label>
            <div class="controls">
              <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="name" id="required"  />
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Crear ciudad
            </button>
          </div>
        </fieldset>
      
              {{ Form::close() }}
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
