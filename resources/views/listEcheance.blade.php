{{-- <p><a class="nav-link" href="{{ route('visite') }}"> faire une visiteTechnique </a></p> --}}
{{-- <p><a class="nav-link" href="{{ route('listPointage') }}"> Liste pointage voiture</a></p> --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <h2>Visite technique</h2>

                <table>
                    <tr>
                        <th class="card-body">Nom du vehicule</th>
                        <th class="card-body">Numero du vehicule</th>
                        <th class="card-body">Date de peruption</th>
                        <th class="card-body">Jour reste</th>
                        <th class="card-body">Renouveller</th>

                    </tr>
                    @foreach ($voitures as $voiture)
                        @foreach ($voiture->visites as $visite)
                            {{-- @if (App\Models\Assurance::fn($visite->dateFinV) > 15 && App\Models\Assurance::fn($visite->dateFinV) < 30) --}}
                                <tr style="background-color: yellow">
                                    <td class="card-body">{{ $voiture->marque }}</td>
                                    <td class="card-body">{{ $voiture->numero }}</td>
                                    <td class="card-body">{{ $visite->dateFinV }}</td>
                                    {{-- <td class="card-body">{{ App\Models\Assurance::fn($visite->dateFinV) }}</td> --}}

                                    <td class="card-body"></td>
                                    </td>
                                </tr>
                            {{-- @elseif(App\Models\Assurance::fn($visite->dateFinV) < 15)
                                <tr style="background-color: red">
                                    <td class="card-body">{{ $voiture->marque }}</td>
                                    <td class="card-body">{{ $voiture->numero }}</td>
                                    <td class="card-body">{{ $visite->dateFinV }}</td>
                                    <td class="card-body">{{ App\Models\Assurance::fn($visite->dateFinV) }}</td>

                                    <td class="card-body"></td>
                                    </td>
                                </tr>
                            @elseif(App\Models\Assurance::fn($visite->dateFinV) > 30)
                                <tr style="background-color: rgb(33, 255, 25)">
                                    <td class="card-body">{{ $voiture->marque }}</td>
                                    <td class="card-body">{{ $voiture->numero }}</td>
                                    <td class="card-body">{{ $visite->dateFinV }}</td>
                                    <td class="card-body">{{ App\Models\Assurance::fn($visite->dateFinV) }}</td>

                                    <td class="card-body"></td>
                                    </td>
                                </tr>
                            @endif --}}
                        @endforeach
                    @endforeach


                </table>
            </div>
            <div class="col-sm-6">
                <h2>Assurance</h2>

                <table>
                    <tr>
                        <th class="card-body">Nom du vehicule</th>
                        <th class="card-body">Numero du vehicule</th>
                        <th class="card-body">Nom de l'assurance</th>
                        <th class="card-body">Date de peruption</th>
                        <th class="card-body">Jour reste</th>
                        {{-- <th class="card-body">couleur Marquage</th> --}}
                        <th class="card-body">Renouveller</th>

                    </tr>


                    {{-- @if ($voitures->count() > 0) --}}
                    @foreach ($assurances as $assurance)
                        {{-- @if (App\Models\Assurance::fn($assurance->dateFinA) > 15 && App\Models\Assurance::fn($assurance->dateFinA) < 30) --}}
                            <tr style="background-color: yellow">
                                <td class="card-body">{{ $assurance->voiture->marque }}</td>
                                <td class="card-body">{{ $assurance->voiture->numero }}</td>
                                <td class="card-body">{{ $assurance->nomAssurance }}</td>
                                <td class="card-body">{{ $assurance->dateFinA }}</td>
                                {{-- <td class="card-body">{{ App\Models\Assurance::fn($assurance->dateFinA) }}</td> --}}
                                <td class="card-body"></td>


                                </td>
                            </tr>
                        {{-- @elseif(App\Models\Assurance::fn($assurance->dateFinA) < 15)
                            <tr style="background-color: red">
                                <td class="card-body">{{ $assurance->voiture->marque }}</td>
                                <td class="card-body">{{ $assurance->voiture->numero }}</td>
                                <td class="card-body">{{ $assurance->nomAssurance }}</td>
                                <td class="card-body">{{ $assurance->dateFinA }}</td>
                                <td class="card-body">{{ App\Models\Assurance::fn($assurance->dateFinA) }}</td>
                                <td class="card-body"></td>


                                </td>
                            </tr>

                            @else
                            <tr style="background-color: rgb(9, 255, 0)">
                                <td class="card-body">{{ $assurance->voiture->marque }}</td>
                                <td class="card-body">{{ $assurance->voiture->numero }}</td>
                                <td class="card-body">{{ $assurance->nomAssurance }}</td>
                                <td class="card-body">{{ $assurance->dateFinA }}</td>
                                <td class="card-body">{{ App\Models\Assurance::fn($assurance->dateFinA) }}</td>
                                <td class="card-body"></td>


                                </td>
                            </tr>
                        @endif --}}
                    @endforeach
                </table>


                {{-- <div class="col-sm">
                    <form action="{{ route('lien') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit"> lien </button>
                    </form>
                </div> --}}
            </div>
        </div>
    @endsection
