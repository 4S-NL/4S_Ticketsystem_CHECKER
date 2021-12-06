@extends('base')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Evenementen beheer</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Startdatum</th>
                    <th>Prijs</th>
                    <th>Adres</th>
                    <th>Locatie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><a href="{{route('events.show', $event->id)}}">{{$event->title}}</a></td>
                        <td>{{$event->start_date}}</td>
                        <td>€ {{$event->ticket_price}}</td>
                        <td>{{$event->address}}</td>
                        <td>{{$event->city}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{route('events.create')}}" class="btn btn-primary">Nieuw evenement aanmaken</a>
    </div>
@endsection
