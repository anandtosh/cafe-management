<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromQuery, WithMapping
{

    // public function __construct($from,$to)
    // {
    //     $this->from = $from;
    //     $this->to = $to;
    // }

    public function query()
    {
        return Order::query();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($order): array
    {
        return [
            $order->id,
            $order->franchise->name,
            $order->created_at->format('d-M-Y'),
            $order->amount,
            $order->requestwork->name,
            $order->customer_name,
            $order->current_status,
        ];
    }
}
