{{-- <p><a class="nav-link" href="{{ route('visite') }}"> faire une visiteTechnique </a></p> --}}
{{-- <p><a class="nav-link" href="{{ route('listPointage') }}"> Liste pointage voiture</a></p> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">

        <p>Vous avez rouler a : {{ $moyenne }} km/h</p>

      </div>
      <div class="col-sm">
      </div>
    </div>
  </div>
@endsection
