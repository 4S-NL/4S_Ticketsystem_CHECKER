@extends('base')

@section('content')
    <h1>Upcoming events</h1>
    @foreach($events as $event)
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-text"><b>Datum:</b> {{$event->start_date}} </p>
                    <a href="{{route('events.orderticket', $event->id)}}" class="btn btn-primary">Bestel Tickets!</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
