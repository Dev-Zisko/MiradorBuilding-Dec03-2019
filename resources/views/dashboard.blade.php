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
                                <h2 class="pageheader-title">Elija una opción:</h2>
                            </div>
                        </div>
                    </div>
                    <a style="margin: 0 auto; width: 180px; margin-bottom: 20px;" href="{{ route('sinpagar') }}" class="btn btn-outline-primary"><span class="badge-dot badge-danger mr-1"></span> Recibos sin Pagar</a>
                    </br>
                    <a style="margin: 0 auto; width: 180px; margin-bottom: 20px;" href="{{ route('procesando') }}" class="btn btn-outline-primary"><span class="badge-dot badge-brand mr-1"></span> Recibos sin Verificar</a>
                    </br>
                    <a style="margin: 0 auto; width: 180px; margin-bottom: 20px;" href="{{ route('pagado') }}" class="btn btn-outline-primary"><span class="badge-dot badge-success mr-1"></span> Recibos Pagados</a>
                    </br>
                    <a style="margin: 0 auto; width: 180px; margin-bottom: 20px;" href="{{ route('sinvalidez') }}" class="btn btn-outline-primary"><span style="background-color: gray !important;" class="badge-dot badge-success mr-1"></span> Recibos sin Validez</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
@endsection