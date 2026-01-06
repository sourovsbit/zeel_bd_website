<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface NewsEventInterface extends BaseInterface{
    public function status($id);

}
