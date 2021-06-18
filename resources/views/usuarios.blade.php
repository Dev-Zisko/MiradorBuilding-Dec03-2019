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
                                <h2 class="pageheader-title">Usuarios</h2>
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
                                    <a style="margin: 0 auto; width: 150px; margin-top: 10px;" href="{{ route('usuariosr') }}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Crear usuario</a>
                                    <h5 class="card-header">Usuarios registrados</h5> 
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Nombre y Apellido</th>
                                                        <th class="border-0">Teléfono</th>
                                                        <th class="border-0">Correo</th>
                                                        <th class="border-0">Apartamento</th>
                                                        <th class="border-0">Alícuota</th>
                                                        <th class="border-0">Rol</th>
                                                        <th class="border-0">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td>{{ $user->nombre }} {{ $user->apellido }}</td>
                                                        <td>{{ $user->telefono }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->apartamento }}</td>
                                                        <td>{{ $user->alicuota }}</td>
                                                        @if($user->rol == "User")
                                                            <td>Usuario</td>
                                                        @endif
                                                        @if($user->rol == "Admin")
                                                            <td>Administrador</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{url('usuariosu',Crypt::encrypt($user->id))}}"><i class="fa fa-fw fa-edit"></i></a>
                                                            <a href="{{url('usuariosd',Crypt::encrypt($user->id))}}"><i class="fa fa-fw fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @if(count($users) == 0)
                                                        <tr>
                                                            <td>No hay usuarios</td>
                                                            <td>
                                                                registrados aún.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <br>
                                            <div>{{ $users->links() }}</div>
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