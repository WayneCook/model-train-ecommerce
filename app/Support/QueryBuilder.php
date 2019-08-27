<?php
namespace App\Support;

class QueryBuilder
{
    private $query;
    private $filters;

    public function __construct($query, $filters)
    {
        $this->query = $query;
        $this->filters = $filters;
    }

    public function apply()
    {
        $scales = json_decode($this->filters, true)['scale'];
        $brands = json_decode($this->filters, true)['brand'];
        $price = json_decode($this->filters, true)['price'];

        if (!empty($price)) {

            $this->query->whereBetween('price', [$price['start'], $price['end']]);

        }

        if (!empty($scales)) {
            $this->query->whereIn('scale', $scales);

        }

        if (!empty($brands)) {
            $this->query->whereIn('brand', $brands);

        }




        return $this->query;

    }



}
