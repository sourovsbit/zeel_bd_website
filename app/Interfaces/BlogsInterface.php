<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface BlogsInterface extends BaseInterface{
    public function status($id);
}
