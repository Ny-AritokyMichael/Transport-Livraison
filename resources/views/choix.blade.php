{{-- <p><a class="nav-link" href="{{ route('visite') }}"> faire une visiteTechnique </a></p> --}}
{{-- <p><a class="nav-link" href="{{ route('listPointage') }}"> Liste pointage voiture</a></p> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <h1>A quel echeance avez-vous besoin?</h1>


                <form method="get" action="{{ route('assurance') }}"
                    enctype="multipart/form-data">
                    <button type="submit" name="submit" class="bg-green-500"> Assurance </button>
                </form>

                <form method="get" action="{{ route('visite') }}"
                    enctype="multipart/form-data">
                    <button type="submit" name="submit" class="bg-green-500"> Visite technique </button>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
