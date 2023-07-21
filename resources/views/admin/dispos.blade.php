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
                            @foreach ($dispos as $dispo)
                            <tr>
                                <td class="card-body">{{ $dispo->marque }}</td>
                                <td class="card-body">{{ $dispo->numero }}</td>

                            </tr>
                        @endforeach

                </table>

            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
