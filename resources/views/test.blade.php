@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <p>{{ $todos[0]->PRA_NOM . ' ' . $todos[0]->PRA_PRENOM }}</p>
            </div>
        </div>
    </div>
@endsection
