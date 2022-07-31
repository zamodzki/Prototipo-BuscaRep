@extends('layouts.main')

@section('title', $rep->cidade )

@section('content')

    <div class="col-md10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/reps/{{ $rep->image }}" class="img-fluid" alt="{{ $rep->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$rep->title}}</h1>
                <p class="rep-city"><ion-icon name="location-outline"></ion-icon>{{ $rep->bairro }} - {{ $rep->city }}</p>
                <p class="reps-vacancies"><ion-icon name="person-add-outline"></ion-icon>{{$rep->vacancies}} Vagas</p>
                <p class="rep-owner"><ion-icon name="star-outline"></ion-icon>{{ $repOwner['name'] }} </p>
                <a href="#"class="btn btn-primary" id="rep-submit">Agendar uma visita</a>
                <h3>A republica conta com:</h3>
                <ul id="items-list">
                    @foreach($rep->items as $item)
                        <li><ion-icon name="play-outline"></ion-icon><span>{{ $item }}</span></li>

                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre a Republica:</h3>
                <p class="rep-description">{{$rep->description}}</p>
            </div>
        </div>
    </div>

@endsection
