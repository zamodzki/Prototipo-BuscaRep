@extends('layouts.main')

@section('title', 'Anunciar Vaga')

@section('content')
<div id="reps-anunciar-container" class="col-md-6 offset-md-3">
    <h1>Anuncie sua Republica</h1>
    <form action="/reps" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Fotos do imóvel:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Titulo do anuncio</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo do anuncio">
        </div>
    <div class="form-group">
        <label for="city">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do imóvel">
    </div>
    <div class="form-group">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro do imóvel">
    </div>
    <div class="form-group">
        <label for="rua">Rua:</label>
        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua do imóvel">
    </div>
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="Descrição do imóvel"></textarea>
    </div>
       <div class="form-group">
        <label for="type">Vagas disponiveis:</label>
        <select name="vacancies" id="vacancies" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3+">3+</option>
        </select>
    <div class="form-group">
        <label for="type">Tipo:</label>
        <select name="type" id="type" class="form-control">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Unissex">Unissex</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Adicione itens de infraestrutura:</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Piscina"> Piscina
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Churrasqueira"> Churrasqueira
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Garagem"> Vaga de Garagem
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Ar-condicionado"> Ar-condicionado
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Ventilador-de-teto"> Ventilador de teto
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Wi-fi"> Wi-fi
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Anuncio">

</div>
    </form>

@endsection
