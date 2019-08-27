<?php
namespace App\Support;
use Illuminate\Support\Arr;


class FilterControl
{

    public $data;
    public $controlData = [];
    public $allowedControls;

    public function __construct($data, $allowedControls)
    {
        $this->data = $data;
        $this->allowedControls = $allowedControls;

    }

    public function process()
    {
        return $this->data;
    }

    public function getControls()
    {

        foreach ($this->allowedControls as $control) {
            $this->controlData[$control] = $this->data->get()->groupBy($control);
        }



        return $this->controlData;

    }


}
