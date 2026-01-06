<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface ProductCategoryInterface extends BaseInterface{
    public function status($id);
}
