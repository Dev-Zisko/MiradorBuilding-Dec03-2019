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
                                <h2 style="text-align: center;" class="pageheader-title">Crear Recibo</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                         <form style="margin: 0 auto; width: 30%;" class="form-login" method="POST" action="{{ route('facturasr') }}">
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
                                            <option value="01" selected>Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                    </select>
                                    @if ($errors->has('mes'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('mes') }}</strong>
                                        </span>
                                    @endif
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
                                            <option value="2019" selected>2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                    </select>
                                    @if ($errors->has('año'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('año') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fechavencimiento') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Fecha de Vencimiento</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style=" width: 15%; color: #4267FF;" class="fa fa-fw fa-calendar-times"></i>
                                        </span>
                                    </div>
                                    <input style="width: 85%;" type="date" id="fechavencimiento" name="fechavencimiento"
                                       value="2019-12-01"
                                       min="2019-12-01" max="2030-12-31" required>
                                    @if ($errors->has('fechavencimiento'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('fechavencimiento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gastos') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Seleccionar gastos</label>
                                <div class="input-group mb-3">
                                    <select type="text" id="gastos" name="gastos[]" class="standardSelect"
                                    multiple required>
                                        @foreach($expenses as $expense)
                                            <option value="{{ $expense->id }}">{{ $expense->nombre }} | Bs. {{ $expense->monto }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gastos'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('gastos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tasa') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input id="tasa" name="tasa" type="number" class="form-control" placeholder="Tasa del día..." min="1" step="any" value="{{ old('tasa') }}" required>
                                    @if ($errors->has('tasa'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('tasa') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('newfondo') ? ' has-error' : '' }}">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i style="color: #4267FF;" class="fa fa-fw fa-archive"></i>
                                        </span>
                                    </div>
                                    <input id="newfondo" name="newfondo" type="number" class="form-control" placeholder="Fondo reparaciones del Edificio..." min="1" step="any" value="{{ old('newfondo') }}" required>
                                    @if ($errors->has('newfondo'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('newfondo') }}</strong>
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