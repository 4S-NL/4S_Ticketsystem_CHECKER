<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\OrderTicket;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * @param $eventId
     *
     * Display the order page to order a ticket for an event
     */
    public function order( $eventId ) {
        $event = Event::findOrFail($eventId);
        return view('pages/events/orderTicket')->with('event', $event);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store($eventId, Request $request)
    {
        // eerst even het event uit de db ophalen, we hebben wat van die data straks nodig.
        $event = Event::findOrFail($eventId);
        $order = null;
        // even valideren:
        $request->validate([
            'amount' => ['numeric']
        ]);
        \DB::transaction( function() use ($request, $event, &$order) {
            $order = new Order();
            // \Auth::id() geeft je het id van de ingelogde gebruiker
            $order->customer_id = \Auth::id();
            $order->event_id = $event->id; // of $eventId gebruiken natuurlijk
            // voor het aanmaken van een order nummer maken we gebruik van een simpel systeem:
            // we pakken de datum van de dag in een bepaald format, en daarachter plakken we een nummer
            // wat gelijk staat aan de hoeveelheid orders + 1.
            // Niet geheel waterdicht, maar voor nu prima.
            $order->order_number = Date('Ymd') . ( Order::all()->count() + 1);
            $order->status = 'paid'; // we gaan er even voor het gemak van uit dat iedere order gelijk betaald is
            $order->order_date = Date('Y-m-d h:m:s'); // huidige datum en tijd
            $order->save();
            $this->order = $order;

            // het aantal tickets wat de klant wenste te bestellen
            $amountOfTickets = $request->amount; // deze data komt uit het form wat is doorgestuurd

            // voor al die tickets moeten we een nieuwe ticket aanmaken, dus
            // een for loop is hier wel even handig!
            for ($i = 0; $i < $amountOfTickets; $i++) {
                // let op: use \App\Models\Ticket bovenaan in deze file zetten!!
                // aanmaken van de nieuwe tickets:
                $ticket = new Ticket();
                $ticket->status = 0; // status is of de ticket al gescand is, in dit geval uiteraard niet, dus 0.
                // geen korting of wat dan ook, dus klant betaald gewoon voor de prijs
                // zoals is vastgelegd in de events tabel
                $ticket->price_per_ticket = $event->ticket_price;
                // $ticket->type staat als default in de database op 'regular' dus dat hoeven we nu niet aan teggeven.
                // opslaan van de ticket:
                $ticket->save();

                // dan de entry in de koppeltabel:
                $orderTicket = new OrderTicket();
                $orderTicket->order_id = $order->id; // het id van de aangemaakte order
                $orderTicket->ticket_id = $ticket->id; // het id van de aangemaakte ticket in deze for loop
                $orderTicket->save();
            }
            // hier zijn we de for loop uit, en hebben we dus net zoveel tickets aangemaakt als dat een klant heeft ingevoerd.
        });

        return redirect()->route('events.confirmOrder', $order->id)->with('message', 'Uw tickets zijn besteld!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
