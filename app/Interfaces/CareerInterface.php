<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface CareerInterface extends BaseInterface{
    public function status($id);
}
