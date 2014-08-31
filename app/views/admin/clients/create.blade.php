@extends('template.base')

@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
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
            <div class="action-text color-teal">{{ $clients_count }} <span class="helper-font-small color-silver-dark">Clientes</span></div>
          </a>
        </li>
      </ul>
      <h2><i class="icofont-table"></i> Clientes</h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> <span class="divider">&rsaquo;</span></li>
        <li class="active">Nuevo cliente</li>
      </ul><!--/breadcrumb-->
    </div><!-- /content-breadcrumb -->

    <!-- content-body -->
    <div class="content-body">
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
                                                        <span>Nuevo cliente</span>
                                                      </div><!--/box header-->
                                                      <!--box body-->
                                                      <div class="box-body">  
                                                        <!--validation-->
                                                        <div class="row-fluid">
                                                          {{ Form::open(array('route' => 'clients.store','id'=>'form-validate')) }}
                                                            <fieldset>
                                                              <legend>Ingresar los siguientes datos</legend>
                                                              <div class="span5">
                                                                <div class="control-group">
                                                                  <label class="control-label" for="required">Empresa</label>
                                                                  <div class="controls">
                                                                   
                                                                      <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="enterprise" id="enterprise">
                                                                
                                                                  </div>
                                                                </div>
                                                                <div class="control-group">
                                                                  <label class="control-label" for="minlength">Responsable</label>
                                                                  <div class="controls">
        
                                                                    <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="in_charge" id="in_charge">
                                                                
                                                                  </div>
                                                                </div>
                                                                <div class="control-group">
                                                                  <label class="control-label" for="number">Teléfono</label>
                                                                  <div class="controls">
                                                                  
                                                                   <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="phone" id="phone">
                                                                
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="control-group">
                                                                <label class="control-label" for="email">Email</label>
                                                                <div class="controls">
                                                                 <input type="email" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="email" id="email">
                                                                </div>
                                                              </div>
                                                              <div class="control-group">
                                                                <label class="control-label" for="password">Password</label>
                                                                <div class="controls">
                                                                  
                                                                  <input type="password" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="password" id="password">
                                                                </div>
                                                              </div>
                                                              <div class="control-group">
                                                                <label class="control-label" for="cpassword">Confirm Password</label>
                                                                <div class="controls">
                                                                   <input type="password" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="password_confirm" id="password_confirm">
                                                                </div>
                                                              </div>
                                                              <div class="form-actions">
                                                                {{ Form::submit('Crear cliente', array('class'=>"btn btn-primary btn-password")) }}
                                                                <button type="button" class="btn">Cancelar</button>
                                                              </div>
                                                            </fieldset>
                                                          {{ Form::close() }}<!--/validation-->
                                                        </div>
                                                      </div><!--/box body-->
                                                    </div><!--/box-->
                                                  </div><!--/span--> 
                                                </div><!--/validation-->
                                              </div><!--/content-body -->
                                            </div><!-- /content -->
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
                                          {{HTML::script('admin/js/stilearn-base.js');}}


                                          <script type="text/javascript">
                                            $(document).ready(function() {

                                                $('#form-validate').validate();
                                                // peity chart
                                                $("span[data-chart=peity-bar]").peity("bar");
                                                
                                                // uniform
                                                $('[data-form=uniform]').uniform();
                                              

                                                $(".btn-password").click(function()
                                                {
                                                   if($("#password").val() != $("#password_confirm").val())
                                                   {
                                                      alert("Las contraseñas con coinciden!");
                                                      return false;
                                                   }
                                                });
                                                
                                      
                                              });

                                          </script>


                                          @stop
