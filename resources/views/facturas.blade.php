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
                                <h2 class="pageheader-title">Recibos</h2>
                                <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{ route('facturasd') }}" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Eliminar Recibos</a>
                                <!--
                                <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{url('facturamail', 1)}}" class="btn btn-outline-primary"><i class="fa fa-envelope"></i> Enviar (1-27)</a>
                                <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{url('facturamail', 2)}}" class="btn btn-outline-primary"><i class="fa fa-envelope"></i> Enviar (28-53)</a>
                                -->
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="text-align: center;">
                                <div class="card">
                                    <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{ route('facturasr') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Crear recibo</a>
                                    <h5 class="card-header">Recibo</h5>
                                    <p style="color: #007F0E; font-size: 1.5em;">{{ $mensaje }}</p>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Mes</th>
                                                        <th class="border-0">Año</th>
                                                        <th class="border-0">Fecha de Vencimiento</th>
                                                        <th class="border-0">Apartamento</th>
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Monto (Bs)</th>
                                                        <th class="border-0">Monto ($)</th>
                                                        <th class="border-0">Tasa de cambio (Bs)</th>
                                                        <th class="border-0">Agregar gasto o abono</th>
                                                        <th class="border-0">Editar gastos o abonos</th>
                                                        <th class="border-0">Ver PDF</th>
                                                        <th class="border-0">Envíar por correo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bills as $bill)
                                                        @foreach($users as $user)
                                                        <tr>
                                                            @if($user->id == $bill->id_user)
                                                                <td>{{ $bill->mes }}</td>
                                                                <td>{{ $bill->año }}</td>
                                                                <td>{{ $bill->fechavencimiento }}</td>
                                                                <td>{{ $user->apartamento }}</td>
                                                                <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                                <td>{{ number_format($bill->monto, 2, ',', '.') }}</td>
                                                                @if($bill->dolares == "-")
                                                                <td>{{ $bill->dolares }}</td>
                                                                <td>{{ $bill->tasa }}</td>
                                                                @endif
                                                                @if($bill->dolares != "-")
                                                                <td>{{ number_format($bill->dolares, 2, ',', '.') }}</td>
                                                                <td>{{ number_format($bill->tasa, 2, ',', '.') }}</td>
                                                                @endif
                                                                <td><a href="{{url('gastoextra',Crypt::encrypt($bill->id))}}"><i class="fa fa-fw fa-plus"></i></a></td>
                                                                <td>
                                                                <a href="{{url('gastoextrau',Crypt::encrypt($bill->id))}}"><i class="fa fa-fw fa-edit"></i></a></td>
                                                                <td><a class="nav-link" href="{{url('factura',Crypt::encrypt($bill->id))}}" target="_blank"><i class="fa fa-fw fa-eye"></i></a></td>
                                                                @if($bill->fondo != "1")
                                                                <td><a href="{{url('facturamail',Crypt::encrypt($bill->id))}}"><i style="color: orange;" class="fa fa-fw fa-envelope"></i></a></td>
                                        @endif
                                        @if($bill->fondo == "1")
                                                                <td><a href="{{url('facturamail',Crypt::encrypt($bill->id))}}"><i style="color: green;" class="fa fa-fw fa-check"></i></a></td>
                                        @endif
                                                                
                                                             @endif
                                                        </tr>
                                                        @endforeach
                                                    @endforeach
                                                    @if(count($bills) == 0)
                                                        <tr>
                                                            <td>No hay recibos</td>
                                                            <td>
                                                                registrados aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $bills->links() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            <!-- ============================================================== -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
@endsection