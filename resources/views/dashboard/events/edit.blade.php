@extends('base')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Evenement aanpassen</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('events.update', $event->id)}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" value="{{$event->title}}" name="title" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Beschrijving</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$event->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="">Adres</label>
                <input type="text" name="address" class="form-control" value="{{$event->address}}" id="">
            </div>

            <div class="form-group">
                <label for="">Postcode</label>
                <input type="text" name="zip" class="form-control" id="" value="{{$event->zip}}">
            </div>

            <div class="form-group">
                <label for="">Plaats</label>
                <input type="text" name="city" class="form-control" id="" value="{{$event->city}}">
            </div>
            <div class="form-group">
                <label for="">Ticketprijs</label>
                <input type="number" min="0" step="any" name="ticket_price" class="form-control" value="{{$event->ticket_price}}" id="">
            </div>
            <div class="form-group">
                <label for="">Startdatum</label>
                <input type="date" name="start_date" class="form-control" value="{{date('Y-m-d', strtotime($event->start_date))}}" id="">
            </div>

            <div class="form-group">
                <label for="">Einddatum</label>
                <input type="date" name="end_date" value="{{date('Y-m-d', strtotime($event->end_date))}}" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Servicekosten</label>
                <input type="number" min="0" step="any" value="{{$event->service_costs}}" name="service_costs" class="form-control" id="">
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Updaten">
            </div>
        </form>

    </div>
@endsection
