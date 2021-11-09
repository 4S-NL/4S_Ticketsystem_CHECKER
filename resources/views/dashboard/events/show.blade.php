@extends('base')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Event detailpagina</h2>
        <hr>
        <h3>{{$event->title}}</h3>
        <p><b>Start:</b> {{$event->start_date}}</p>
        <p><b>Adres:</b> {{$event->address}}</p>
        <p><b>Postcode:</b> {{$event->zipcode}}</p>
        <p><b>Locatie:</b> {{$event->city}}</p>
        <p><b>Ticketprijs:</b> {{$event->ticket_price}}</p>

        <div class="buttons">
            <a href="" class="btn btn-info">Aanpassen</a>
            <a href="" class="btn btn-danger">Verwijderen</a>
        </div>
    </div>


@endsection
