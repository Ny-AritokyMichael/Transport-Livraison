{{-- <p><a class="nav-link" href="{{ route('visite') }}"> faire une visiteTechnique </a></p> --}}
{{-- <p><a class="nav-link" href="{{ route('listPointage') }}"> Liste pointage voiture</a></p> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <form method="POST" action="{{ route('insertAssurance') }}" enctype="multipart/form-data">
            <h1>Mettre votre assurance</h1>
            @csrf
            <p>Nom de l'assurance : <input type="text" name="nom" class="border-gray-600 border-2"></p>
            <p>Date de peruption: <input type="date" name="date" class="border-gray-600 border-2"></p>
            <p>Numero du vehicule :
                <select class="select" name="id">
                    @foreach ($voitures as $voiture)
                            <option value="{{ $voiture->id }}">{{ $voiture->numero }}</option>
                    @endforeach

                </select>
            </p>
            <button type="submit" name="submit" class="bg-green-500"> inserer votre assurance </button>
        </form>

      </div>
      <div class="col-sm">
      </div>
    </div>
  </div>
@endsection
