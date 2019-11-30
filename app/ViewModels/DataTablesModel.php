<?php

namespace App\ViewModels;

use Illuminate\Http\Request;

class DataTablesModel
{
    private $_request;

    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function getLength()
    {
        return $this->_request->input("length");
    }

    public function getStart()
    {
        return $this->_request->input("start");
    }

    public function getSearchText()
    {
        return $this->_request->input("search")['value'];
    }

    public function getSortOrder($columnNames)
    {
        $orders = $this->_request->input("order");
        if($orders != null && count($orders) > 0)
        {
            return new SortOrder($columnNames[$orders[0]['column']], $orders[0]['dir']);
        }
    }

    public function getPageIndex()
    {
        if ($this->getLength() > 0)
            return ($this->getStart() / $this->getLength()) + 1;
        else
            return 1;
    }

    public function getPageSize()
    {
        if ($this->getLength() == 0)
            return 10;
        else
            return $this->getLength();
    }

    public static function emptyResult()
    {
        return [
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => []
        ];
    }
}
