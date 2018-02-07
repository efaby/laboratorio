@extends('backLayout.app')
@section('title')
Home
@stop

@section('content')
<h3 class="page-heading mb-4">Bienvenido</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    <div class="row">
        <div class="col-lg-12">
        <h3>Laboratorios M&eacute;dicos Asociados</h3>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 80px;">
                <img src="{{URL::asset('images/bannerLab.jpg')}}" alt="">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
