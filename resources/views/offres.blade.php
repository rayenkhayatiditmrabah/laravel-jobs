@extends('index')
<html>
    <head>
    </head>
    <body>

@section('x')

@foreach ($offres as $offre)
    <div class="single-job-items mb-30">
        <div class="job-items">
            <div class="company-img">
                <!-- Vous pouvez personnaliser l'image en fonction de votre modèle -->
                <a href="job_details.html"><img src="assets/img/icon/job-list1.png" alt=""></a>
            </div>
            <div class="job-tittle">
                <a href="job_details.html"><h4>{{ $offre->nom }}</h4></a>
                <ul>
                    <li>{{ $offre->type }}</li>
                    <li><i class="fas fa-map-marker-alt"></i>{{ $offre->description }}</li>
                    <!-- Ajoutez d'autres champs ici selon votre modèle -->
                </ul>
            </div>
        </div>
        <div class="items-link f-right">
            @if(Auth::check() && Auth::user()->role == 'employee')
                <a href="/postuler/{{$offre->id}}">Postuler cet Offre</a>
            @endif
            <span>{{ $offre->created_at }}</span>
        </div>
    </div>
@endforeach



@endsection

    </body>
</html>
