@extends('client.template')
@section('contenu')
<div class="container">
    <h2>Formulaire</h2>
     <form>
        <div class="form-group">
            <label for="nom">Champs 1:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
        </div>
        <div class="form-group">

            <label for="email">Champs 2:</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
        </div>

        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Select</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <div class="form-group">
            <label for="message">Champs 3 :</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Entrez votre message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">OK</button>
    </form>
</div>
@endsection
