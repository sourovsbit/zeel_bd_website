<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface AdministrativeInterface extends BaseInterface{
    public function status($id);
}
