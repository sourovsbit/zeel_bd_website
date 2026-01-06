<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface CerficatesInterface extends BaseInterface{
    public function status($id);
}
