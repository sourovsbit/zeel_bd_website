<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ThanaInterface extends BaseInterface{
        public function status($id);

        public function GetDistrict($id);
}