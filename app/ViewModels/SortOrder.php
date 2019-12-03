<?php
namespace App\ViewModels;

class SortOrder
{
    public $columnName;
    public $columnDirection;

    public function __construct($columnName, $columnDirection)
    {
        $this->columnName = $columnName;
        $this->columnDirection = $columnDirection;
    }
}