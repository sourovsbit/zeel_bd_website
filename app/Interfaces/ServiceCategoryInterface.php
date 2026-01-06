<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ServiceCategoryInterface extends BaseInterface{
        public function status($id);
}