<?php
namespace App\ViewModels;

class PagedData
{
    public $data;
    public $total;
    public $totalDisplay;

    public function __construct($data, $total, $totalDisplay)
    {
        $this->data = $data;
        $this->total = $total;
        $this->totalDisplay = $totalDisplay;
    }
}
