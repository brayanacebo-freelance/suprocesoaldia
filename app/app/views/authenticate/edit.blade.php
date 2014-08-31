@extends('template.base')


@section('content')
@parent
<div class="span11">
	<div class="content">
    <!-- content-header -->
    <div class="content-header">
      <ul class="content-header-action pull-right">
<!-- <li class="divider"></li>
<li>
<a href="#">
<div class="badge-circle color-white">
<div class="grd-teal">
<i class="icofont-thumbs-up"></i>
</div>
</div>
<div class="action-text color-teal">1437 <span class="helper-font-small color-silver-dark">Perfil</span></div>
</a>
</li> -->
</ul>
<h2><i class="icofont-table"></i> Perfil</h2>
</div><!-- /content-header -->

<!-- content-breadcrumb -->
<div class="content-breadcrumb">
<!--breadcrumb-->
<ul class="breadcrumb">
<li><a href="perfil-editar.html"><i class="icofont-circle-arrow-right"></i> Perfil</a> <span class="divider">›</span></li>
<li class="active">Editar perfil</li>
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
              
              <form class="form-horizont" id="form-validate" novalidate="novalidate" action="{{ route('post.profile') }}" method="POST">
                @if($user->isClient())
                <fieldset>
                <fieldset>
                    <!-- <legend>Datos básicos</legend> -->
                    <div class="control-group">
                        <label class="control-label" for="required">Empresa</label>
                        <div class="controls">
                            <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="enterprise" id="required" value="{{$loggeable->enterprise}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="minlength">Responsable</label>
                        <div class="controls">
                            <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="in_charge" id="minlength" value="{{$loggeable->in_charge}}" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="number">Teléfono</label>
                        <div class="controls">
                            <input type="text" class="grd-white" data-validate="{required: true, maxlength: 6, messages:{required:'Please enter field max length', maxlength:'Please enter a maximum of 6 characters.'}}" name="phone" id="maxlength" value="{{$loggeable->phone}}" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </fieldset>
                @elseif($user->isAssistant())
                  <fieldset>
                    <!-- <legend>Datos básicos</legend> -->
                    <div class="control-group">
                      <label class="control-label" for="required">Nombre</label>
                      <div class="controls">
                        <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field required'}}" name="name" id="required" value="{{$loggeable->name}}">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="minlength">Documento</label>
                      <div class="controls">
                        <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="nit" id="minlength" value="{{$loggeable->nit}}">
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
                      <input type="text" class="grd-white" data-validate="{required: true, minlength: 2, messages:{required:'Please enter field min length', minlength:'Please enter at least 2 characters.'}}" name="phone" id="minlength" value="{{$loggeable->phone}}">
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Editar</button>
                  </div>
                </fieldset>
              @endif
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
              <form class="form-horizont" id="form-validate2" novalidate="novalidate" method="POST" action="{{route('post.profile.user')}}">
                <fieldset>
                  <!-- <legend>Datos básicos</legend> -->
                  <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                      <input type="text" class="grd-white" data-validate="{required: true, email:true, messages:{required:'Please enter field email', email:'Please enter a valid email address'}}" name="email" id="email" value="{{ $user->email }}" disabled="true">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="password">Contraseña</label>
                    <div class="controls">
                      <input type="password" class="grd-white" data-validate="{required: true, messages:{required:'Please enter field password'}}" name="password" id="password">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="cpassword">Confirmar contraseña</label>
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
</div>
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
                // try your js
                
                // peity chart
                $('#form-validate').validate();

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
