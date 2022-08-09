@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                    <form method="POST" action="{{ route('insertTrajet', ['id' => $chauffeur->id]) }}"
                        enctype="multipart/form-data">
                <h1>Trajet du vehicule </h1>
                @csrf
                <p>Trajet de : <input type="text" name="lieu" placeholder="debut-fin" class="border-gray-600 border-2">
                </p>
                <p>Type de Trajet :
                    <select name="type" id="select">
                        <option value="Aller">Aller</option>
                        <option value="Retour">Retour</option>
                    </select>
                </p>
                <p>Debut du kilometrage : <input type="text" name="kilo" class="border-gray-600 border-2"></p>
                <p>Date de depart : <input type="date" name="date" class="border-gray-600 border-2"></p>
                <p>Heure de depart : <input type="time" name="heure" class="border-gray-600 border-2"></p>
                <p>Numero du vehicule :
                    <select name="idV">
                        @foreach ($voitures as $voiture)
                            <option value="{{ $voiture->id }}">{{ $voiture->numero }}</option>
                        @endforeach

                    </select>
                </p>
                <p>Montant du carburant : <input type="number" name="montant" class="border-gray-600 border-2"></p>
                <p>Quantite du carburant : <input type="number" name="quantite" class="border-gray-600 border-2"></p>
                <p>Motif du voyage : <input type="text" name="motif" class="border-gray-600 border-2"></p>

                <button type="submit" name="submit" class="bg-green-500"> inserer </button>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
