@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Anúncios</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reps-container">
    @if(count($reps)>0)
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Vagas</th>
                <th scope='col'>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reps as $rep)
                <tr>
                    <td scope="row">{{ $loop->index +1 }}</td>
                    <td><a href="reps/{{ $rep->id }}">{{$rep->title}}</a></td>
                    <td>{{$rep->vacancies}}</td>
                    <td>
                        <a href="reps/edit/{{ $rep->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="/reps/{{ $rep->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem anúncios, <a href="reps/anunciar">Criar anúncio</a></p>
    @endif
</div>
@endsection
