{{-- <p><a class="nav-link" href="{{ route('visite') }}"> faire une visiteTechnique </a></p> --}}
{{-- <p><a class="nav-link" href="{{ route('listPointage') }}"> Liste pointage voiture</a></p> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <form method="POST" action="{{ route('calcul') }}" enctype="multipart/form-data">
            <h1>De quel trajet vous-parlez?</h1>
            @csrf
            <p>Depart :
                <select class="select" name="debut">
                    @foreach ($carnets as $carnet)
                            <option value="{{ $carnet->debutKilometrage }}">{{ $carnet->lieuTrajet }}</option>
                    @endforeach

                </select>
            </p>

            <p>Arrive :
                <select class="select" name="fin">
                    @foreach ($carnets as $carnet)
                            <option value="{{ $carnet->debutKilometrage }}">{{ $carnet->lieuTrajet }}</option>
                    @endforeach

                </select>
            </p>
            <button type="submit" name="submit" class="bg-green-500"> valider la distance </button>
        </form>

      </div>
      <div class="col-sm">
      </div>
    </div>
  </div>
@endsection
