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
                                <h2 class="pageheader-title">Gastos</h2>
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
                                    <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{ route('gastosr') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Crear gasto</a>
                                    <h5 class="card-header">Gastos para los Recibos</h5> 
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Nombre</th>
                                                        <th class="border-0">Monto</th>
                                                        <th class="border-0">Prioridad</th>
                                                        <th class="border-0">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($expenses as $expense)
                                                        <tr>
                                                            <td>{{ $expense->nombre }}</td>
                                                            <td>Bs. {{ number_format($expense->monto, 2, ',', '.') }}</td>
                                                            <td>{{ $expense->prioridad }}</td>
                                                            <td>
                                                                <a href="{{url('gastosu',Crypt::encrypt($expense->id))}}"><i class="fa fa-fw fa-edit"></i></a>
                                                                <a href="{{url('gastosd',Crypt::encrypt($expense->id))}}"><i class="fa fa-fw fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @if(count($expenses) == 0)
                                                        <tr>
                                                            <td>No hay gastos</td>
                                                            <td>
                                                                registrados aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $expenses->links() }}</div>
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