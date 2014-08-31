@extends('template.base')



@section('content')
    @parent

            <div class="container">
                <div class="signin-form row-fluid">
                    <div class="span4"></div>
                    <!--Sign In-->
                    <div class="span4">
                        <div class="box corner-all">
                            <div class="box-header grd-teal color-white corner-top">
                                <span>Acceso al sistema:</span>
                            </div>
                            <div class="box-body bg-white">
                                <form id="sign-in" method="post" action="{{ route('post.login') }}">
                                    <div class="control-group">
                                        <label class="control-label">Usuario</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" 
                                            data-validate="{required: true, messages:{required:'Please enter field username'}}" name="email" id="login_username" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Contraseña</label>
                                        <div class="controls">
                                            <input type="password" class="input-block-level"
                                             data-validate="{required: true, messages:{required:'Please enter field password'}}" name="password" id="login_password" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-block btn-large btn-primary" 
                                        value="Ingresar" />
                                        <p class="recover-account">
                                        <a href="#modal-recover" class="link" data-toggle="modal">¿Olvidaste tu contraseña?</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--/Sign In-->

                    <div class="span4"></div>
                  
                </div><!-- /row -->
            </div><!-- /container -->
            
            <!-- modal recover -->
            <div id="modal-recover" class="modal hide fade" tabindex="-1" role="dialog" 
            aria-labelledby="modal-recoverLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-recoverLabel">¿Olvidaste tu contraseña?</h3>
                </div>
                <div class="modal-body">
                    <form id="form-recover" method="post">
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" data-validate="{required: true, email:true, messages:{required:'Please enter field email', email:'Please enter a valid email address'}}" name="recover" />
                                <p class="help-block helper-font-small">
                                Ingresa tu correo electrónico para cambiar la contraseña.</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                    <input type="submit" form="form-recover" class="btn btn-primary" value="Enviar" >
                </div>
            </div><!-- /modal recover-->
@stop
                                        @section('customscript')
                                          @parent

                      


                                          <script type="text/javascript">
                                            $(document).ready(function() {

                                              $('#form-validate').validate();
                              

                                            });
                                          </script>


                                          @stop

