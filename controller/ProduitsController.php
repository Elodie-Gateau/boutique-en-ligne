<?php
class ProduitsController
{

    public function addProduct()
    {
        ProduitsRepository::addProduct();
    }
}
