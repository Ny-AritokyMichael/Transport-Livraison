@extends('admin.header.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <h2>Listes des trajets des vehicules</h2>

                <table>
                    <tr>
                        <th class="card-body">Nom du chauffeur</th>
                        <th class="card-body">Carte d'identite</th>
                        <th class="card-body">Nom du vehicule</th>
                        <th class="card-body">Numero du vehicule</th>
                        <th class="card-body">Carte d'identite</th>
                        <th class="card-body">Trajet</th>
                        <th class="card-body">Type de Trajet</th>
                        <th class="card-body">Debut de kilometrage</th>
                        <th class="card-body">Date de depart</th>
                        <th class="card-body">Heure de depart</th>
                        <th class="card-body">Montant du carburant</th>
                        <th class="card-body">Quantite du carburant</th>
                        <th class="card-body">Motif du transport</th>
                    </tr>

                        @foreach ($carnets as $carnet)
                            <tr>
                                <td class="card-body">{{ $carnet->chauffeur->nomChauffeur }}</td>
                                <td class="card-body">{{ $carnet->chauffeur->cin }}</td>
                                <td class="card-body">{{ $carnet->voiture->marque }}</td>
                                <td class="card-body">{{ $carnet->voiture->marque }}</td>
                                <td class="card-body">{{ $carnet->lieuTrajet }}</td>
                                <td class="card-body">{{ $carnet->typeTrajet }}</td>
                                <td class="card-body">{{ $carnet->debutKilometrage }} Km</td>
                                <td class="card-body">{{ $carnet->dateDepart }}</td>
                                <td class="card-body">{{ $carnet->heureDepart }}</td>
                                <td class="card-body">{{ $carnet->montantCarburant }} ariary</td>
                                <td class="card-body">{{ $carnet->quantiteCarburant }} litre(s)</td>
                                <td class="card-body">{{ $carnet->motif }}</td>
                                <td class="card-body">
                                    <form action="{{ route('trajet.destroy', ['id' => $carnet->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit"> Supprimer </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach

                </table>

                <p>
                    <form action="{{ route('export') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"> Export pdf </button>
                    </form>
                </p>

                <p>
                    <form action="{{ route('csv') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-success" type="submit"> Export csv </button>
                    </form>
                </p>

                <p>
                    <form action="{{ route('excel') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-success" type="submit"> Export Excel xlsx </button>
                    </form>
                </p>

            </div>


            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
