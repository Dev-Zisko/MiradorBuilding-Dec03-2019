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
                                <h2 style="text-align: center;" class="pageheader-title">Confirmar Pago</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                        <form style="margin: 0 auto;" class="form-login" method="POST">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">
                            <h3>Recibo del mes: {{ $bill->mes }}/{{ $bill->año }}</h3>
                            <h3>Monto: Bs. {{ number_format($bill->monto, 2, ',', '.') }}</h3>
                            @if($bill->dolares == "-")
                                <h3>Monto: $ {{ $bill->dolares }}</h3>
                                <h3>Tasa de cambio del día de la emisión de este recibo: Bs. {{ $bill->tasa }}</h3>
                            @endif
                            @if($bill->dolares != "-")
                                <h3>Monto: $ {{ number_format($bill->dolares, 2, ',', '.') }}</h3>
                                <h3>Tasa de cambio del día de la emisión de este recibo: Bs. {{ number_format($bill->tasa, 2, ',', '.') }}</h3>
                            @endif
                            <h3>Recibo de: {{ $user->nombre }} {{ $user->apellido }}</h3>
                            <h3>Apartamento: {{ $user->apartamento }}</h3>
                            <h3>Monto transferido: {{ $bill->pagado }}</h3>
                            <h3>N° de Confirmación: {{ $bill->transferencia }}</h3>
                            <h3>Fecha del Pago: {{ $bill->fechatrans }}</h3>

                            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Estado del Recibo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <select type="text" id="estado" name="estado" class="form-control">
                                        @if($bill->estado == "Sin Pagar")
                                            <option value="Sin Pagar" selected>Sin Pagar</option>
                                            <option value="Procesando">Por Verificar</option>
                                            <option value="Pagada">Pagado</option>
                                            <option value="Sin Validez">Sin Validez</option>
                                        @endif
                                        @if($bill->estado == "Procesando")
                                            <option value="Sin Pagar">Sin Pagar</option>
                                            <option value="Procesando" selected>Por Verificar</option>
                                            <option value="Pagada">Pagado</option>
                                            <option value="Sin Validez">Sin Validez</option>
                                        @endif
                                        @if($bill->estado == "Pagada")
                                        <option value="Sin Pagar">Sin Pagar</option>
                                        <option value="Procesando">Por Verificar</option>
                                            <option value="Pagada" selected>Pagado</option>
                                            <option value="Sin Validez">Sin Validez</option>
                                        @endif
                                        @if($bill->estado == "Sin Validez")
                                            <option value="Sin Pagar">Sin Pagar</option>
                                            <option value="Procesando">Por Verificar</option>
                                            <option value="Pagada">Pagado</option>
                                            <option value="Sin Validez" selected>Sin Validez</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            @if($bill->estado == "Sin Pagar")
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i style="color: #4267FF;" class="fa fa-fw fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input id="transferencia" name="transferencia" type="number" class="form-control" placeholder="N° de Transferencia..." min="0" value="{{ old('transferencia') }}">
                                        @if ($errors->has('transferencia'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('transferencia') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <p>Fecha de la transferencia: </p>
                            <div class="form-group{{ $errors->has('fechatrans') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-calendar"></i>
                                        
                                        </span>
                                    </div>
                                    <input id="fechatrans" name="fechatrans" type="date" class="form-control" placeholder="Fecha de la Transferencia..." value="{{ old('fechatrans') }}">
                                    @if ($errors->has('fechatrans'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('fechatrans') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                          </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
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