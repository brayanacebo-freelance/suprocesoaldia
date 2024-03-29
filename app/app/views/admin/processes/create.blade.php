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
    </li>
  </ul>
  <h2><i class="icofont-table"></i> Clientes</h2>
</div><!-- /content-header -->

<!-- content-breadcrumb -->
<div class="content-breadcrumb">
 <!--breadcrumb-->
 <ul class="breadcrumb">
  <li><a href="{{ route('clients.index') }}"><i class="icofont-circle-arrow-right"></i> Clientes</a> <span class="divider">&rsaquo;</span></li>

  <li>
    <!-- {{ route('clients.processes.index',$client->id) }} -->
    <a href="javascript:void(0)">
      <i class="icofont-circle-arrow-right"></i> Procesos
    </a> 
    <span class="divider">&rsaquo;</span>
  </li>
  
  <li class="active">Nuevo proceso</li>
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
                                   <span>Nuevo proceso</span>
                                 </div><!--/box header-->
                                 <!--box body-->
                                 <div class="box-body">
                                  <!--validation-->
                                  <div class="row-fluid">
                                   {{ Form::open(array('route' => array('clients.processes.store', $client->id),'id'=>'form-validate')) }}
                                   <fieldset>
                                    <legend>Ingresa los siguientes datos</legend>
                                    <div class="row-fluid">
                                     <div class="span6">
                                      <div class="control-group">
                                       <label class="control-label req" for="required">Carpeta</label>
                                       <div class="controls">
                                        <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="folder_number" id="required" />
                                      </div>
                                    </div>                                    <div class="control-group">
                                    <label class="control-label req" for="required">Radicación</label>
                                    <div class="controls">
                                      <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="creation_number" id="required" />
                                    </div>
                                  </div>
                                  <div class="control-group">
                                   <label class="control-label req" for="inputSelect">Departamento</label>
                                   <div class="controls">
                                    {{ Form::select('department_id', $departments, null, array('id'=>"departamentId", 'onchange'=>"filterDepartament(this.value)")); }}
                                  </div>
                                </div>
                                <div class="control-group">
                                 <label class="control-label req" for="inputSelect">Ciudad</label>
                                 <div class="controls">
                                  <select id="cityId" name="city_id" class="valid" onchange="filterOffices(this.value)"></select>
                                </div>
                              </div>
                              <div class="control-group">
                               <label class="control-label req" for="inputAuto">Despacho</label>
                               <div class="controls">
                                <select id="officeId" name="office_id" class="valid"></select>
                              </div>
                            </div>
                            <div class="control-group">
                             <label class="control-label" for="inputAuto">Obligación</label>
                             <div class="controls">
                              <input type="text" class="grd-white" name="obligation"/>
                             </div>
                            </div>
                          <div class="control-group">
                           <label class="control-label" for="inputAuto">Datos adicionales</label>
                           <div class="controls">
                            <textarea type="text" class="grd-white" name="data" rows="4"></textarea>
                          </div>
                        </div>

                      </div>
                      <div class="span6">
                        <div class="control-group">
                         <label class="control-label req" for="inputSelect">Tipo de proceso</label>
                         <div class="controls">
                          {{ Form::select('process_type', $types, array('style'=>"width:200px", 'data-placeholder'=>"Seleccione un tipo de proceso")) }}
                        </div>
                      </div>
                      <div id="content_demand">
                        <div class="control-group">
                         <label class="control-label" for="required">Demandante - Numero de documento</label>
                         <div class="controls">
                          <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="claimant[]" id="required" />
                        </div>
                      </div>
                      <div class="control-group">
                       <label class="control-label" for="required">Demandando - Numero de documento</label>
                       <div class="controls">
                        <input type="text" class="grd-white" data-validate="{required: true, messages:{required:'Campo obligatorio'}}" name="defendant[]" id="required" />
                      </div>

                    </div>

                  </div>
                  <div class="span6">
                    <a href="#" class="btn" id="add_new_demant">Agregar Demandante</a> <br/>
                    <a href="#" class="btn" id="add_new_de">Agregar Demandado</a>
                  </div>
                </div>
              </div>
              <div class="form-actions">
               <button type="submit" class="btn btn-primary">Crear proceso</button>
             </div>
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
<!--{{HTML::script('admin/js/stilearn-base.js');}}-->

<script type="text/javascript">

/* Filtrar las ciudades por departamentos */
function filterDepartament(departamentId){
  $.ajax({
    type: "GET",
    url: "http://app.suprocesoaldia.com/selectToCities/"+departamentId
  }).done(function( data ) {

    if(data !== 0){
      $("#cityId").html("");
      $("#officeId").html("");
      $("<option value='0'> Selecciona una ciudad </option>").appendTo("#cityId");
      $.each( data, function( key, $item ) {
        $("<option value='"+$item.id+"'>"+$item.name+"</option>").appendTo("#cityId");
      });
    }

  });
}

/* Filtrar las oficinas por ciudades */
function filterOffices(cityId){
  $.ajax({
    type: "GET",
    url: "http://app.suprocesoaldia.com/selectToOffices/"+cityId
  }).done(function( data ) {

    console.log(data);

    if(data !== 0){
      $("#officeId").html("");
      $("<option value='0'> Selecciona un despacho </option>").appendTo("#officeId");
      $.each( data, function( key, $item ) {
        $("<option value='"+$item.id+"'>"+$item.name+"</option>").appendTo("#officeId");
      });
    }

  });
}


$(document).ready(function() {

  $( "#departamentId" ).prepend( "<option value='0' selected>Seleccione un departamento</option>" );

  $('#add_new_demant').click(function(){
    $('#content_demand').append('<div class="control-group"><label class="control-label" for="required">Demandante - Numero de documento</label><div class="controls"><input type="text" class="grd-white" data-validate="{required: true, messages:{required:\'Campo obligatorio\'}}" name="claimant[]" id="required" /></div> </div>');
  });
  $('#add_new_de').click(function(){
    $('#content_demand').append('<div class="control-group"><label class="control-label" for="required">Demandando - Numero de documento</label> <div class="controls"> <input type="text" class="grd-white" data-validate="{required: true, messages:{required:\'Campo obligatorio\'}}" name="defendant[]" id="required" /> </div>');
  });

                // try your js
                $('#form-validate').validate();

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
