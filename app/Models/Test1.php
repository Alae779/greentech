<?php
// I
interface Chragable{
    public function charge();
}


// Liskov
 class Vehicle
{
    // echo
    abstract public function move();
}


class Car extends Vehicle implements Chragable
{
    // echo / return
    public function move() 
    {
        return "Move1";
    }
    public function charge(){

    }
}


class ICar extends Vehicle
{
    // echo / return
    public function move() 
    {
        return "Move1";
    }
}

class B extends Vehicle
{
    public function move()
    {
        // echo "Move2";
        return "Move2";
    }
}


$arr = [new Car(), new B];

foreach ($arr as $obj) {
    $obj->move();// poly
}