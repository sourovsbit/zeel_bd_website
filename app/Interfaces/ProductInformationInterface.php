<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ProductInformationInterface extends BaseInterface{
        public function status($id);

        public function GetSubCategorie($id);
}