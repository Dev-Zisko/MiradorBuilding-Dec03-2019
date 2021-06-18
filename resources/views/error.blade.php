@extends('layouts.home')

@section('content')
<section class="hero-wrap js-fullheight">
    <div class="container">
        <div class="row description js-fullheight align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <div class="text">
                    <h1>Ocurrió un error inesperado.</h1>
                    <h4 class="mb-5">{{ $mensaje }}</h4>
                    <a href="javascript:history.back(-1);" style="font-size: 1.5em; font-weight: bold; color: white; border: 1px solid #d0d0d0;" class="nav-link icon d-flex align-items-center"><i class="ion-ios-arrow-back"></i> / Volver</a>
                    <img src="{{ url('images/edificiomain.png') }}" alt="condominio-grano">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection