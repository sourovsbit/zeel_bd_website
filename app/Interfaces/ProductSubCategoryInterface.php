<?php
namespace App\Interfaces;
use App\Interfaces\BaseInterface;
interface ProductSubCategoryInterface extends BaseInterface
{
    public function status($id);

    public function GetCategorie($id);
}
