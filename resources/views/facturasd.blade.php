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
                                <h2 style="text-align: center;" class="pageheader-title">Eliminar Recibo</h2>
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

                             <div class="form-group{{ $errors->has('mes') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Mes del Recibo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <select type="text" id="mes" name="mes" class="form-control" required>
                                        @foreach($meses as $mes)
                                            @if($mes->mes == "01")
                                                <option value="{{ $mes->mes }}" selected>Enero</option>
                                            @endif
                                            @if($mes->mes == "02")
                                                <option value="{{ $mes->mes }}" selected>Febrero</option>
                                            @endif
                                            @if($mes->mes == "03")
                                                <option value="{{ $mes->mes }}" selected>Marzo</option>
                                            @endif
                                            @if($mes->mes == "04")
                                                <option value="{{ $mes->mes }}" selected>Abril</option>
                                            @endif
                                            @if($mes->mes == "05")
                                                <option value="{{ $mes->mes }}" selected>Mayo</option>
                                            @endif
                                            @if($mes->mes == "06")
                                                <option value="{{ $mes->mes }}" selected>Junio</option>
                                            @endif
                                            @if($mes->mes == "07")
                                                <option value="{{ $mes->mes }}" selected>Julio</option>
                                            @endif
                                            @if($mes->mes == "08")
                                                <option value="{{ $mes->mes }}" selected>Agosto</option>
                                            @endif
                                            @if($mes->mes == "09")
                                                <option value="{{ $mes->mes }}" selected>Septiembre</option>
                                            @endif
                                            @if($mes->mes == "10")
                                                <option value="{{ $mes->mes }}" selected>Octubre</option>
                                            @endif
                                            @if($mes->mes == "11")
                                                <option value="{{ $mes->mes }}" selected>Noviembre</option>
                                            @endif
                                            @if($mes->mes == "12")
                                                <option value="{{ $mes->mes }}" selected>Diciembre</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('año') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Año del Recibo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-calendar"></i>
                                        </span>
                                    </div>
                                    <select type="text" id="año" name="año" class="form-control" required>
                                        @foreach($años as $año)
                                            <option value="{{ $año->año }}" selected>{{ $año->año }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-outline-primary">Eliminar</button>
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