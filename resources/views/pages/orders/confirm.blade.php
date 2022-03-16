@extends('base')

@section('content')
    <div class="container">
        <h1>Uw bestelling met id {{$order->order_number}}</h1>
        <div class="row">

            <div class="col">

                <h3>{{$order->event->title}}</h3>
                <ul>
                    <li>Locatie: {{$order->event->address}}, {{$order->event->city}}</li>
                    <li>Datum: {{Date('d-m-Y', strtotime($order->event->start_date))}} </li>
                </ul>
            </div>

            <div class="col">
                <h3>Klantgegevens:</h3>
                <ul>
                    <li>Naam: {{$order->customer->firstname}} {{$order->customer->insertion}} {{$order->customer->lastname}}</li>
                    <li>Email: {{$order->customer->user->email}}</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <h2>Bestelde tickets:</h2>
            @foreach($order->tickets as $ticket)
                <div class="card m-3">
                    <div class="card-header">
                        ID: #{{$ticket->id}}
                    </div>
                    <div class="card-body">
                        <a href="">
                            <img src="{{$ticket->qr}}" alt="">
                        </a>
                    </div>
                    <div class="card-footer">
                        <p><small>Ticket Type: {{$ticket->type}}</small></p>
                        <p><small>Ticket Price: {{$ticket->price_per_ticket}}</small></p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
