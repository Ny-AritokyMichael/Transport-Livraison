

  @extends('admin.header.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm">
      </div>
      <div class="col-sm">
        <form method="POST" action="{{ route('insertPneu') }}" enctype="multipart/form-data">
            <h1>Remplacer les pneus :</h1>
            @csrf
            <p>A combien de kilonmetre: <input type="number" name="km" class="border-gray-600 border-2"></p>
            <p>Date de changement : <input type="date" name="dateP" class="border-gray-600 border-2"></p>
            <p>Numero du vehicule :
                <select class="select" name="id">
                    @foreach ($voitures as $voiture)
                            <option value="{{ $voiture->id }}">{{ $voiture->numero }}</option>
                    @endforeach

                </select>
            </p>
            <button type="submit" name="submit" class="bg-green-500"> insertion  </button>
        </form>

      </div>
      <div class="col-sm">
      </div>
    </div>
  </div>
@endsection
