@extends('base')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Evenement aanmaken</h2>

        <form action="">
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" name="title" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Adres</label>
                <input type="text" name="address" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Postcode</label>
                <input type="text" name="zipcode" class="form-control" id="">
            </div>

            <div class="form-group">
                <label for="">Plaats</label>
                <input type="text" name="city" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Ticketprijs</label>
                <input type="number" min="0" step="any" name="TicketPrijs" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Startdatum</label>
                <input type="date" name="city" class="form-control" id="">
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Opslaan">

            </div>
        </form>

    </div>
@endsection
