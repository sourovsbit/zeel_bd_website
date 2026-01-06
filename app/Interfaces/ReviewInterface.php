<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ReviewInterface extends BaseInterface{
    public function status($id);
}
