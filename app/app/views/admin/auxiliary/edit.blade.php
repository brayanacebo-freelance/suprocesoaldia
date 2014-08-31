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
            <div class="action-text color-teal">{{ $count }} <span class="helper-font-small color-silver-dark">Auxiliares</span></div>
          </a>
        </li>
      </ul>
      <h2><i class="icofont-table"></i> Auxiliares</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="{{ route('assistants.index') }}"><i class="icofont-circle-arrow-right"></i> Auxiliares</a> <span class="divider">›</span></li>
        <li class="active">Editar auxiliares</li>
      </ul><!--/breadcrumb-->
    </div><!-- /content-breadcrumb -->

    <!-- content-body -->
    <div class="content-body">
      <div class="span12">
        <div class="span6">
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
          <span>Datos básicos</span>
        </div><!--/box header-->
        <!--box body-->
        <div class="box-body">
          <!--validation-->
          <div class="row-fluid">
            {{ Form::open(array('route' => array('assistants.update', $assistant->id, 'id'=>'form-validate'))) }}
            <input type="hidden" name="_method" value="PUT">
              <fieldset>
                <!-- <legend>Datos básicos</legend> -->
                <div class="control-group">
                  <label class="control-label" for="required">Nombre</label>
                  <div class="controls">
                    <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="name" id="required" value="{{$assistant->name}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="minlength">Documento</label>
                  <div class="controls">
                    <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="nit" id="minlength" value="{{$assistant->nit}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputSelect">Tipo documento</label>
                  <div class="controls">
                    <select id="inputSelect"  data-placeholder="Seleccione un departamento">
                    <option>Seleccionar</option>
                    <option>CC</option>
                    <option>CE</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="minlength">Teléfono</label>
                <div class="controls">
                  <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="phone" id="minlength" value="{{$assistant->phone}}">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </fieldset>
          </form><!--/validation-->
        </div>
      </div><!--/box body-->
    </div><!--/box-->
  </div><!--/span--> 
</div><!--/validation-->
</div>

<div class="span6">
<!-- =========================================
  VALIDATION
  =========================================== -->
  <!--validation-->
  <div id="validation2" class="row-fluid">
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
          <span>Datos de acceso</span>
        </div><!--/box header-->
        <!--box body-->
        <div class="box-body">
          <!--validation-->
          <div class="row-fluid">
            <form class="form-horizont" id="form-validate2" novalidate="novalidate" action="{{ route('assistants.user.edit', $assistant->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
              <fieldset>
                <!-- <legend>Datos básicos</legend> -->
                <div class="control-group">
                  <label class="control-label" for="email">Email</label>
                  <div class="controls">
                    <input type="text" class="grd-white" data-validate="{required: true, email:true, messages:{required:'Please enter field email', email:'Please enter a valid email address'}}" name="email" id="email" value="{{$assistant->user->email}}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input type="password" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field password'}}" name="password" id="password">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="cpassword">Confirm Password</label>
                  <div class="controls">
                    <input type="password" class="grd-white" data-validate="{required: true, equalTo: '#password', messages:{required:'Please enter field confirm password', equalTo: 'confirmation password does not match the password'}}" name="cpassword" id="cpassword">
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Editar</button>
                </div>
              </fieldset>
            </form><!--/validation-->
          </div>
        </div><!--/box body-->
      </div><!--/box-->
    </div><!--/span--> 
  </div><!--/validation-->
</div>
</div>

</div><!--/content-body -->
</div><!-- /content -->
</div>
@stop


@section('customscript')
@parent


{{HTML::script('admin/js/datepicker/bootstrap-datepicker.js');}}
{{HTML::script('admin/js/colorpicker/bootstrap-colorpicker.js');}}
{{HTML::script('admin/js/select2/select2.js');}}
{{HTML::script('admin/js/wysihtml5/wysihtml5-0.3.0.js');}}
{{HTML::script('admin/js/wysihtml5/bootstrap-wysihtml5.js');}}
{{HTML::script('admin/js/wizard/jquery.ui.widget.js');}}
{{HTML::script('admin/js/wizard/jquery.wizard.js');}}
{{HTML::script('admin/js/pnotify/jquery.pnotify.js');}}
{{HTML::script('admin/js/pnotify/jquery.pnotify.demo.js');}}

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

  //Select
  $('[data-form=select2]').select2();

  // peity chart
  $("span[data-chart=peity-bar]").peity("bar");

  // uniform
  $('[data-form=uniform]').uniform();
$('#form-validate').validate();
});

</script>
@stop
