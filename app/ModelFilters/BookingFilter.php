<?php

namespace App\ModelFilters;

use Carbon\Carbon;
use EloquentFilter\ModelFilter;

class BookingFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function kamar($id)
    {
        return $this->whereHas('bookings', function($query) use ($id)
        {
            return $query->where('kamar_id', $id);
        });
    }

    public function status($str)
    {
        return $this->whereHas('bookings', function($query) use ($str)
        {
            return $query->where('status', $str);
        });
    }

    public function tipekamar($id)
    {
        return $this->whereHas('bookings', function($query) use ($id)
        {
            return $query->whereHas('kamars', function($q) use ($id) {
                return $q->where('tipe_kamar_id', $id);
            });
        });
    }

    public function dateFrom($dateFrom)
    {
        $date = Carbon::parse($dateFrom)->format('Y-m-d');

        return $this->whereDate('created_at', '>=', $date);
    }

    public function dateTo($dateTo)
    {
        $date = Carbon::parse($dateTo)->format('Y-m-d');

        return $this->whereDate('created_at', '<=', $date);
    }


}
