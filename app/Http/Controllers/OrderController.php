<?php

namespace App\Http\Controllers;

use App\Models\Order;
use chillerlan\QRCode\QRCode;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirmOrder($order_id) {
        $order = Order::findOrFail($order_id);
        foreach($order->tickets as $ticket) {
            $qr = (new QRCode)->render($ticket->id);
            $ticket->qr = $qr;
        }
        return view('pages/orders/confirm')->with('order', $order);
    }
}
