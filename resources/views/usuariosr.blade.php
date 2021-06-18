@extends('layouts.dashboard')

@section('content')
<!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 style="text-align: center;" class="pageheader-title">Crear Usuario</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                         <form style="margin: 0 auto;" class="form-login" method="POST" action="{{ route('usuariosr') }}">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-user"></i>
                                        </span>
                                    </div>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre..." value="{{ old('nombre') }}" required>
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                    <span class="input-group-addon">_</span>
                                    <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido..." value="{{ old('apellido') }}" required>
                                    @if ($errors->has('apellido'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('apellido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-phone"></i>
                                        </span>
                                    </div>
                                    <input id="telefono" name="telefono" type="number" class="form-control" placeholder="Teléfono..." min="0" value="{{ old('telefono') }}" required>
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Correo Electrónico..." value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('piso') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-home"></i>
                                        </span>
                                    </div>
                                    <input id="apartamento" name="apartamento" type="number" class="form-control" placeholder="Apartamento..." min="0" value="{{ old('apartamento') }}" required>
                                    @if ($errors->has('apartamento'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('apartamento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('alicuota') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-percent"></i>
                                        </span>
                                    </div>
                                    <input id="alicuota" name="alicuota" type="number" class="form-control" placeholder="Alícuota..." min="0" step="any" value="{{ old('alicuota') }}" required>
                                    @if ($errors->has('alicuota'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('alicuota') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Rol del usuario</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-cog"></i>
                                        </span>
                                    </div>
                                    <select type="text" id="rol" name="rol" class="form-control">
                                            <option value="User" selected>Usuario</option>
                                            <option value="Admin">Administrador</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-outline-primary">Registrar</button>
                        </div>
                      </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
@endsection