<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTicket extends Model
{
    use HasFactory;
    protected $table = 'order_ticket';

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

}
