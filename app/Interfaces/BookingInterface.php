<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface BookingInterface extends BaseInterface{
    public function status($id);
}
