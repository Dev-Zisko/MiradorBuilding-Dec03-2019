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
                                <h2 style="text-align: center;" class="pageheader-title">Editar gastos extras del recibo</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                         <form style="margin: 0 auto; width: 30%;" class="form-login" method="POST">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                          <div class="social-line">
                            <h3>Recibo del mes: {{ $bill->mes }}/{{ $bill->año }}</h3>
                            <h3>Recibo de: {{ $user->nombre }} {{ $user->apellido }}</h3>
                            <h3>Apartamento: {{ $user->apartamento }}</h3>
                            <div class="form-group{{ $errors->has('gastos') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" style="text-align: center;">Seleccione los gastos a eliminar:</label>
                                <div class="input-group mb-3">
                                    <select type="text" id="gastos" name="gastos[]" class="standardSelect"
                                    multiple required>
                                        @foreach($details as $detail)
                                            <option value="{{ $detail->id }}">{{ $detail->gasto }} | Bs. {{ $detail->monto }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gastos'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('gastos') }}</strong>
                                        </span>
                                    @endif
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