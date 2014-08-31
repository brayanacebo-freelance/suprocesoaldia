@extends('template.base')
@section('customstyle')
@parent
{{HTML::style('admin/css/DT_bootstrap.css');}}
{{HTML::style('admin/css/responsive-tables.css');}}

@stop


@section('content')
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
        <div class="action-text color-orange">{{ $process->id }} <span class="helper-font-small color-silver-dark">Cód. Proceso</span></div>
      </a>
    </li>
  </ul>
  <h2><i class="icofont-table"></i> Procesos</h2>
</div><!-- /content-header -->

<!-- content-breadcrumb -->
<div class="content-breadcrumb">
  <!--breadcrumb-->
  <ul class="breadcrumb">
    <li><a href="{{ route('clients.processes.index', array($client->id)) }}"><i class="icofont-circle-arrow-right"></i> Procesos</a> <span class="divider">&rsaquo;</span></li>
    <li><a href="{{ route('clients.processes.show', array($client->id, $process->id)) }}"><i class="icofont-circle-arrow-right"></i> Hoja de vida</a> <span class="divider">&rsaquo;</span></li>
    <li class="active">Fotos</li>
  </ul><!--/breadcrumb-->
</div><!-- /content-breadcrumb -->

<!-- content-body -->
<div class="content-body">
  <!-- gallery -->
  <div class="row-fluid">
    <div class="span12">
      <div class="gallery">
        <div class="gallery-content">
          <ul class="thumbnails" id="portfolio-list">
          @foreach($movements as $movement)
            @foreach($movement->images as $image)
              <li class="design">
                <!-- use checkbox for helper event -->
                <input class="selecter" type="checkbox" name="item[]" value="1.jpg" />
                <div class="thumbnail">
                  <img src="{{ $image }}" width="120" height="184" alt=""/>
                  <div class="thumbnail-control">
                    <div class="controls">
                      <a href="{{ $image }}" rel="prettyPhoto[gallery]" title="Lorem ipsum dolor sit amet"><i class="icofont-search"></i></a>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          @endforeach
          </ul>
        </div>
      </div>
      <!-- Modal Confirm -->
      <div id="modalConfirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">Confirm</h3>
        </div>
        <div class="modal-body">
          <p>Are you sure want to delete this images?</p>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-danger">Yes</button>
        </div>
      </div>
    </div>
  </div>
  <!--/gallery-->
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
          <span class="color-teal">Empresa</span><br>{{ $client->enterprise }}
        </p>
        <div class="divider-content2"></div>
        <p>
          <span class="color-teal">Responsable</span><br>{{ $client->in_charge }}
        </p>
        <div class="divider-content2"></div>
        <p>
          <span class="color-teal">Teléfono</span><br>{{ $client->phone }}
        </p>
        <div class="divider-content2"></div>
        <p>
          <span class="color-teal">Email</span><br>{{ $client->user->email }}
        </p>

        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-mini btn-block"><i class="icofont-pencil"></i> Editar</a>

        <div class="divider-content"><span></span></div> <!--divider-->
      </div><!--/alternative 1-->
      
    </div>
  </div><!-- /sidebar-right-content -->
</div><!-- /sidebar-right -->
</aside><!-- /side-right -->
</div><!-- /span side-right -->
@parent

@stop
