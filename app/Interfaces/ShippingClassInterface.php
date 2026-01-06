<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ShippingClassInterface extends BaseInterface{
        public function status($id);
}