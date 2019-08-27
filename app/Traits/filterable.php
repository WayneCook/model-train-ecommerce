<?php

namespace App\Traits;
use App\Support\QueryBuilder;
use App\Support\FilterControl;


trait filterable
{

    public function scopeAdvancedFilter($query)
    {

        return $this->process($query, request()->all())
        ->orderBy(
            request('order_column', 'name'),
            request('order_direction', 'asc')
        )
        ->paginate(request('limit', 5));

    }

    public function process($query, $data): object
    {

        if(!empty($data['filters'])){

            return (new QueryBuilder($query, $data['filters']))->apply();
        }



        return $query;
    }


}
