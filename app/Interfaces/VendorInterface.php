<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface VendorInterface extends BaseInterface{
    public function status($id);
}