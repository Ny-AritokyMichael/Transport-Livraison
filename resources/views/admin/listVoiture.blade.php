@extends('admin.header.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <h2>Listes voitures</h2>

                <table>
                    <tr>
                        <th class="card-body">Numero</th>
                        <th class="card-body">Marque</th>
                        <th class="card-body">Modele</th>
                        <th class="card-body">Type</th>
                        <th class="card-body">Details</th>
                        <th class="card-body"></th>
                    </tr>


                    @foreach ($voitures as $voiture)
                            <tr>
                                <td class="card-body">{{ $voiture->numero }}</td>
                                <td class="card-body">{{ $voiture->marque }}</td>
                                <td class="card-body">{{ $voiture->modele }}</td>

                                <td class="card-body">{{ $voiture->type->type }}</td>
                                {{-- <td class="card-body">{{ $voiture->dispo->voiture_id }}</td> --}}
                                <td class="card-body">
                                    <p><a href="{{ route('info', ['id' => $voiture->id]) }}" class="btn btn-danger">information</a>
                                        <p><a href="{{ route('dispo', ['id' => $voiture->id]) }}" class="btn btn-success">Disponibilite</a>
                                        </td>
                                   <td> <form action="{{ route('voiture.destroy', ['id' => $voiture->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit"> Supprimer </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach

                </table>

            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
@endsection
