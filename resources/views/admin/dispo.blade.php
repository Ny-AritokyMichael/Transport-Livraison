@extends('admin.header.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <h2>Listes des vehicules disponibles</h2>

                <table>
                    <tr>
                        <th class="card-body">Marque vehicule</th>
                        <th class="card-body">Numero vehicule</th>

                    </tr>
                        @if($total > 0)
                            {{-- @foreach ($voitures as $voiture) --}}
                            <tr>
                                <td class="card-body">{{ $voitures->marque }}</td>
                                <td class="card-body">{{ $voitures->numero }}</td>

                            </tr>
                        {{-- @endforeach --}}

                        @else
                        <tr>
                            <td class="card-body">vide</td>
                            <td class="card-body">vide</td>

                    </tr>

                        @endif

                </table>

            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
