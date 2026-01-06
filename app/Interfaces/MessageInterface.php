<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;

interface MessageInterface extends BaseInterface{
        public function status($id);
}
        