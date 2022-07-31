@extends('layouts.main')

@section('title', 'Editando: ' . $rep->title)

@section('content')
<div id="reps-anunciar-container" class="col-md-6 offset-md-3">
    <h1>Editano: {{$rep->title}}</h1>
    <form action="/reps/update/{{$rep->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Fotos do imóvel:</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <img src="/img/reps/{{ $rep->image }}" alt="{{ $rep->image }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Titulo do anuncio</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo do anuncio" value="{{ $rep->title }}">
        </div>
    <div class="form-group">
        <label for="city">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do imóvel" value="{{ $rep->city }}">
    </div>
    <div class="form-group">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro do imóvel" value="{{ $rep->bairro }}">
    </div>
    <div class="form-group">
        <label for="rua">Rua:</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua do imóvel" value="{{ $rep->rua }}">
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="Descrição do imóvel">{{ $rep->description }}</textarea>
    </div>
       <div class="form-group">
        <label for="type">Vagas disponiveis:</label>
        <select name="vacancies" id="vacancies" class="form-control" value="{{ $rep->vacancies }}">
            <option value="0"{{ $rep->vacancies ==0 ? "selected='selected'" : ""}}>0</option>
            <option value="1"{{ $rep->vacancies ==1 ? "selected='selected'" : ""}}>1</option>
            <option value="2"{{ $rep->vacancies ==2 ? "selected='selected'" : ""}}>2</option>
            <option value="3+"{{ $rep->vacancies ==3 ? "selected='selected'" : ""}}>3+</option>
        </select>
    <div class="form-group">
        <label for="type">Tipo:</label>
        <select name="type" id="type" class="form-control" value="{{ $rep->type }}">
            <option value="Masculino" {{ $rep->type =='Masculino' ? "selected='selected'" : ""}}>Masculino</option>
            <option value="Feminino" {{ $rep->type =='Feminino' ? "selected='selected'" : ""}}>Feminino</option>
            <option value="Unissex" {{ $rep->type =='Unissex' ? "selected='selected'" : ""}}>Unissex</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Adicione itens de infraestrutura:</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Piscina"<?php if (in_array("Piscina", $rep->items)) { echo "checked"; } ?>> Piscina
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Churrasqueira" <?php if (in_array("Churrasqueira", $rep->items)) { echo "checked"; } ?>> Churrasqueira
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Garagem" <?php if (in_array("Garagem", $rep->items)) { echo "checked"; } ?>> Vaga de Garagem
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Ar-condicionado" <?php if (in_array("Ar-condicionado", $rep->items)) { echo "checked"; } ?>> Ar-condicionado
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Ventilador-de-teto" <?php if (in_array("Ventilador-de-teto", $rep->items)) { echo "checked"; } ?>> Ventilador de teto
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Wi-fi" <?php if (in_array("Wi-fi", $rep->items)) { echo "checked"; } ?>> Wi-fi
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Anuncio">

</div>
    </form>

@endsection
