@extends('index')

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
@section('x')
<br>
<br>
<div class="container">
    <h2>Ajouter une offre</h2>
    <form method="POST" action="/ajoutOffre">
        @csrf
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" required name="nom">
      </div>
      <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" class="form-control" id="type" required name="type">
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" rows="4" required name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="example-search-input" class="col-md-2 col-form-label">Categorie:</label>
        <div class="col-md-10">


            <select class="form-control" name="idcategorie">
                @foreach ($data as $item)
                <option value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach
            </select>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>

@endsection
    </body>

</html>
