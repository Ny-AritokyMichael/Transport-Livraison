@extends('admin.header.app')


@section('content')
    <div class="container">
        <div class="row">
          <div class="col-sm">
          </div>
          <div class="col-sm">
            <form method="POST" action="{{ route('insert') }}" enctype="multipart/form-data">
                <h1>inserer une nouvelle voiture</h1>
                @csrf
                <p>Numero d'immatriculation : <input type="text" name="numero" class="border-gray-600 border-2"></p>
                <p>Marque de la voiture : <input type="text" name="marque" class="border-gray-600 border-2"></p>
                <p>Sa modèle : <input type="text" name="modele" class="border-gray-600 border-2"></p>
                <p>Son type :
                    <select class="select" name="type">
                        @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach

                    </select>
                </p>
                <button type="submit" name="submit" class="bg-green-500"> inserer </button>
            </form>

          </div>
          <div class="col-sm">
          </div>
        </div>
      </div>
@endsection
