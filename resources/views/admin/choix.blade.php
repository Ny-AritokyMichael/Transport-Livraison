

@extends('admin.header.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <h1>A quel maintenance souhaitez-vous??</h1>


            <form method="get" action="{{ route('vidange') }}"
                enctype="multipart/form-data">
                <button type="submit" name="submit" class="bg-green-500"> Vidange </button>
            </form>
            <br>

            <form method="get" action="{{ route('pneu') }}"
                enctype="multipart/form-data">
                <button type="submit" name="submit" class="bg-green-500"> Changement de pneu </button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>
@endsection

