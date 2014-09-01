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
            <div class="action-text color-teal">{{ count($assistants) }} <span class="helper-font-small color-silver-dark">Auxiliares</span></div>
          </a>
        </li>
      </ul>
      <h2><i class="icofont-table"></i> Auxiliares </h2>
    </div><!-- /content-header -->

    <!-- content-breadcrumb -->
    <div class="content-breadcrumb">
      <!--breadcrumb-->
      <ul class="breadcrumb">
        <li><a href="#"><i class="icofont-circle-arrow-right"></i> Auxiliares</a> <span class="divider">›</span></li>
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
          <a href="{{ route('assistants.create') }}" class="btn btn-block btn-primary">Nuevo auxiliar</a>
        </p>
      </div>
      <!-- tables -->
      <!--datatables-->
      <div class="row-fluid">
        <div class="span12">
          <div class="box corner-all">
            <div class="box-header grd-teal color-white corner-top">
              <span>Lista de auxiliares</span>
            </div>
            <div class="box-body">
              <div id="datatables_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div id="datatables_length" class="dataTables_length"><label><select size="1" name="datatables_length" aria-controls="datatables"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records per page</label></div></div><div class="span6"><div class="dataTables_filter" id="datatables_filter"><label>Search: <input type="text" aria-controls="datatables"></label></div></div></div><table id="datatables" class="table table-bordered table-striped responsive dataTable" aria-describedby="datatables_info">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Cód: activate to sort column descending" style="width: 107px;">Cód</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 242px;">Nombre</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Documento: activate to sort column ascending" style="width: 207px;">Documento</th>                  
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Documento: activate to sort column ascending" style="width: 207px;">Teléfono</th>
                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Tipo documento: activate to sort column ascending" style="width: 276px;">Tipo documento</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 170px;">Acciones</th></tr>
              </thead>

              <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="gradeA odd">
                @foreach($assistants as $assistant)
                  <td class=" sorting_1"><a href="#" class="btn btn-link btn-small">{{ $assistant->id }}</a></td>
                  <td class=" ">{{ $assistant->name }}</td>
                  <td class=" ">{{ $assistant->nit }}</td>
                  <td class=" ">{{ $assistant->phone }}</td>
                  <td class=" ">CC</td>
                  <td class="center ">
                  <a a href="{{ route('assistants.edit', $assistant->id) }}" class="btn btn-success btn-small">Editar <i class="icofont-angle-right"></i></a>
                  <button href="" data-route="{{ route('assistants.destroy', $assistant->id) }}"  class='btn btn-danger btn-small btn-delete'>
                      <span>
                          <i class="icofont-angle-right"></i>
                      </span> Eliminar
                  </button>
                  </td>
                  </tr>
                @endforeach

                </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="datatables_info">Showing 1 to 1 of 1 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li class="next disabled"><a href="#">Next → </a></li></ul></div></div></div></div>

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
  {{HTML::script('admin/js/responsive-tables/responsive-tables.js');}}
  {{HTML::script('admin/js/holder.js');}}
  <!--{{HTML::script('admin/js/stilearn-base.js');}}-->

  <script type="text/javascript">
    $(document).ready(function() {
                // try your js
                
                $('.btn-delete').on('click', function(event) {
                  event.preventDefault();
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

              });

</script>
@stop
