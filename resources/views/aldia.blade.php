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
                                <h2 class="pageheader-title">Usuarios al Día</h2>
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
                                    <h5 class="card-header">Lista de Usuarios al Día: <p style="color: green; font-size: 1.5em;">{{ count($aldia) }}</p></h5> 
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Apartamento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach($aldia as $al)
                                                        @foreach($users as $user)
                        
                                                            @if($al == $user->apartamento)
                                                            <tr>
                                                            <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                            <td><span class="badge-dot badge-success mr-1"></span> {{ $al }}</td>
                                                            </tr>
                                                            @endif
                                                        
                                                        @endforeach
                                                    @endforeach
                                                    
                                                        
                                                    @if($validate == 0)
                                                        <tr>
                                                            <td>No hay usuarios</td>
                                                            <td>
                                                                al día aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
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