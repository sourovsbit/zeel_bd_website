<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface DistrictSetupInterface extends BaseInterface{
        public function status($id);

        public function GetDivision($id);
}
        