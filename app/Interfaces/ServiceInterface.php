<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ServiceInterface extends BaseInterface{
    public function status($id);
}
