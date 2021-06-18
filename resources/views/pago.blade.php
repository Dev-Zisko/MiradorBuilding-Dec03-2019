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
                                <h2 style="text-align: center;" class="pageheader-title">Registrar Pago</h2>
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
                            
                            <p>Monto transferido: </p>
                            <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input id="monto" name="monto" type="text" class="form-control" placeholder="Monto de la transferencia..." value="{{ $bill->monto }}" required>
                                    @if ($errors->has('monto'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('monto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <p>N° de transferencia: </p>
                            <div class="form-group{{ $errors->has('transferencia') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input id="transferencia" name="transferencia" type="number" class="form-control" placeholder="N° de Transferencia..." min="0" value="{{ old('transferencia') }}" required>
                                    @if ($errors->has('transferencia'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('transferencia') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <p>Fecha de la transferencia: </p>
                            <div class="form-group{{ $errors->has('fechatrans') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input id="fechatrans" name="fechatrans" type="date" class="form-control" placeholder="Fecha de la Transferencia..." value="{{ old('fechatrans') }}" required>
                                    @if ($errors->has('fechatrans'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('fechatrans') }}</strong>
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