<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistema de vigilancia judicial</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="stilearning">

  <!-- google font -->
  <link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" />

  <!-- styles -->
  {{HTML::style('admin/css/bootstrap.css');}}
  {{HTML::style('admin/css/bootstrap-responsive.css');}}
  <!-- default theme -->
  {{HTML::style('admin/css/stilearn.css',array('id'=>"style-base"));}}
  {{HTML::style('admin/css/stilearn-responsive.css',array('id'=>"stilearn-responsive"));}}
  {{HTML::style('admin/css/stilearn-helper.css',array('id'=>"style-helper"));}}
  <!-- usage -->
  {{HTML::style('admin/css/stilearn-icon.css');}}
  {{HTML::style('admin/css/font-awesome.css');}}
  {{HTML::style('admin/css/animate.css');}}
  {{HTML::style('admin/css/uniform.default.css');}}
  @section('customstyle')
  <!--This is the master header.-->
  @show
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <![endif]-->
        </head>

        <body>
          <!-- section header -->
          <header class="header" data-spy="affix" data-offset-top="0">
            <!--nav bar helper-->

              <!--nav bar helper-->
              <div class="navbar-helper">
                <div class="row-fluid">
                  <!--panel site-name-->
                  <div class="span9">
                    <div class="panel-sitename">
                      <h2><a href="#"><span class="color-teal">Seguimiento</span> Judicial</a></h2>
                    </div>
                  </div>
                  <!--/panel name-->

                  <div class="span2">

                  </div>
                  @if(Auth::check())
                  <div class="span1">
                    <!--panel button ext-->
                    <div class="panel-ext">
                      <div class="btn-group user-group">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                         {{ HTML::image("admin/img/user-thumb.jpg", "avatar",array('class' =>'corner-all' , 'aling'=>'middle','title'=>'John Doe','alt'=>'John Doe')) }}
                         <!--this for display on PC device-->
                         <button class="btn btn-small btn-inverse">Javier Sanchez</button> <!--this for display on tablet and phone device-->
                       </a>
                       <ul class="dropdown-menu dropdown-user" role="menu" aria-labelledby="dLabel">
                        <li>
                          <div class="media">
                            <a class="pull-left" href="#">
                             {{ HTML::image("admin/img/user-thumb.jpg", "avatar",
                             array('class' =>'img-circle','aling'=>'middle','title'=>'profile','alt'=>'profile')) }}
                           </a>
                           <div class="media-body description">
                            
                            @if (Auth::user()->isAssistant())
                             <p><strong>{{Auth::user()->aux()->name}}</strong></p>
                            <p class="muted">Auxiliar</p>
                            @elseif(Auth::user()->isAdmin())
                            <p><strong>{{Auth::user()->email}}</strong></p>
                            <p class="muted">Administrador</p>
                            @elseid(Auth::user()->isClient())
                            <p><strong>{{Auth::user()->client()->name}}</strong></p>
                            <p class="muted">Cliente</p>
                            @endif
                             <p class="muted">{{Auth::user()->email}}</p>
                            <a href="{{ route('get.profile') }}" class="btn btn-primary btn-small btn-block">Ver Perfil</a>
                          </div>
                        </div>
                      </li>
                      <li class="dropdown-footer">
                        <div>
                           <form method="post" action="{{ route('logout') }}">
                        <input type="submit" class="btn btn-small" href="#" value="Cerrar sesión"/>
                      </form>
                        </div>
                      </li>
                    </ul>
                  </div>
                  @endif
                </div><!--panel button ext-->
              </div>
              </div>
              </div><!--/nav bar helper-->


          </header>

          <!-- section content -->


          <section class="section">

            <div class="row-fluid">

              <!-- span side-left -->
              @if (Auth::check())
              <div class="span1">
                <!--side bar-->
                           <aside class="side-left">
                        <ul class="sidebar">
                    <li>
                      <a href="{{ route('client.movements.all') }}" title="movimientos">
                        @if($movements !== 0)
                          <div class="badge badge-important">{{ count($movements) }}</div>
                        @endif
                        <div class="helper-font-24">
                          <i class="icofont-bullhorn"></i>
                        </div>
                        <span class="sidebar-text">Movimientos</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('clients.show', Auth::user()->client()->id) }}" title="procesos">
                        <div class="helper-font-24">
                          <i class="icofont-folder-open"></i>
                        </div>
                        <span class="sidebar-text">Procesos</span>
                      </a>
                    </li>
                        </ul>
                    </aside><!--/side bar -->
              </div><!-- span side-left -->
              @endif

              @section('content')
              <!--This is the master content.-->
              @show



            </div>
          </section>

        <!-- javascript
        ================================================== -->
        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        {{HTML::script('admin/js/jquery.js');}}
        

        {{HTML::script('admin/js/bootstrap.js');}}
        {{HTML::script('admin/js/uniform/jquery.uniform.js');}}
        {{HTML::script('admin/js/validate/jquery.metadata.js');}}
        {{HTML::script('admin/js/validate/jquery.validate.js');}}


        <script type="text/javascript">
          $(document).ready(function() {
                // try your js
                
                // uniform
                $('[data-form=uniform]').uniform();
                
                // validate
                $('#sign-in').validate();
                $('#sign-up').validate();
                $('#form-recover').validate();
              })
        </script>

        @section('customscript')
        <!-- custom scripts -->
        @show
      </body>
      </html>
