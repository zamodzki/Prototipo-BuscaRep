@extends('layouts.main')

@section('title', 'BuscaRep')

@section('content')

<div id="search-container" class="col-md12">
    <h1>Busque uma Republica</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="reps-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Republicas</h2>
    <p class="subtitle">Veja Republicas com vagas disponíveis:</p>
    @endif

    <div id="cards-container" class="row">
        <?php $i =0; ?>
        @foreach ($reps as $rep)
            @if(($rep->vacancies) > 0)
                <?php $i = $i +1; ?>
            <div class="card col-md-3">
                <img src="/img/reps/{{ $rep->image }}" alt=" {{ $rep->title }}">
                <div class="card-body">
                    <p class="card-city">{{ $rep->city }}<br>{{$rep->bairro}} </p>
                <h5 class="card-title">{{ $rep->title }}</h5>
                    <p class="card-participants">Número de Vagas: {{$rep->vacancies}}</p>
                    <p class="card-participants">{{$rep->type}}</p>
                    <a href="/reps/{{$rep->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endif
        @endforeach
        @if(count($reps)==0 && $search)
            <p>Não foi possível encontrar nenhuma republica em: {{$search}}! <br><a href="/">Veja todas!</a></p>
        @elseif(count($reps)==0 or $i == 0)
            <p><b>Não há vagas disponíveis</b></p>
        @endif
    </div>
</div>

@endsection
