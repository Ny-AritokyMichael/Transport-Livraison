@extends('admin.header.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <h2>Information du vehicule </h2>

                <table>
                    <tr>
                        <th class="card-body">Marque du vehicule</th>
                        <th class="card-body">Numero du vehicule</th>
                        <th class="card-body">Nombre de km parcourue</th>
                        <th class="card-body">durete du maintenance</th>
                        <th class="card-body">Km restant</th>
                    </tr>


                    @foreach ($voitures as $voiture)
                        @if (($restV > 250 && $restV < 500) || ($restP > 250 && $restP < 500))
                            <tr style="background-color: yellow">
                                <td class="card-body">{{ $voiture->marque }}</td>
                                <td class="card-body">{{ $voiture->numero }}</td>
                                <td class="card-body">{{ $distance }} km</td>
                                @if ($kmV < $kmP)

                                    <td class="card-body">{{ $kmV }} km </td>
                                    <td class="card-body">{{ $restV }} km</td>
                                @else
                                    <td class="card-body">{{ $kmP }} km</td>
                                    <td class="card-body">{{ $restP }} km</td>
                                @endif
                            </tr>

                        @elseif ($restV < 250 || $restP < 250)
                            <tr style="background-color: red">
                                <td class="card-body">{{ $voiture->marque }}</td>
                                <td class="card-body">{{ $voiture->numero }}</td>
                                <td class="card-body">{{ $distance }} km</td>
                                @if ($kmV < $kmP)

                                    <td class="card-body">{{ $kmV }} km</td>
                                    <td class="card-body">{{ $restV }} km</td>
                                @else
                                    <td class="card-body">{{ $kmP }} km</td>
                                    <td class="card-body">{{ $restP }} km</td>
                                @endif
                            </tr>

                        @else
                            <tr style="background-color: rgb(0, 255, 0)">
                                <td class="card-body">{{ $voiture->marque }}</td>
                                <td class="card-body">{{ $voiture->numero }}</td>
                                <td class="card-body">{{ $distance }}</td>
                                @if ($kmV < $kmP)
                                    <td class="card-body">{{ $kmV }} km</td>
                                    <td class="card-body">{{ $restV }} km</td>
                                @else
                                    <td class="card-body">{{ $kmP }} km</td>
                                    <td class="card-body">{{ $restP }} km</td>
                                @endif
                            </tr>
                        @endif
                    @endforeach





                </table>


            </div>


            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
