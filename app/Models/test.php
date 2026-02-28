<?php

interface Transactionable{
    public function deposit(int $amount);
    public function withdraw(int $amount);
}

abstract class Account{
    public readonly string $accountNumber;
    protected int $solde;
    final public function getSold(){
        return $this->solde;
    }
    public function __construct(string $accountNumber, int $solde)
    {
        $this->accountNumber = $accountNumber;
        $this->solde = $solde;
    }
    abstract public function calculFees();
}
class SavingsAccount extends Account implements Transactionable{
    public function __construct(string $accountNumber, int $solde) {
        parent::__construct($accountNumber, $solde);
    }
    public function deposit(int $amount){
        $this->solde += $amount;
    }
    public function withdraw(int $amount){
        $this->solde -= $amount;
    }
    public function calculFees(){
        return 0;
    }
}
class CurrentAccount extends Account implements Transactionable{
    public function __construct(string $accountNumber, int $solde) {
        parent::__construct($accountNumber, $solde);
    }
    public function deposit(int $amount){
        $this->solde += $amount;
    }
    public function withdraw(int $amount){
        $this->solde -= $amount;
    }
    public function calculFees(){
        return 10;
    }
}


abstract class Vehicule{
    public $engine;
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }
    abstract public function calculateFuelConsumption(int $distance);
}
class Car extends Vehicule{
    public string $name;
    public function __construct(string $name, Engine $engine)
    {
        $this->name = $name;
        parent::__construct($engine);
    }
    public function calculateFuelConsumption(int $distance){
        return $distance * 0.09;
    }
}
class Motocycle extends Vehicule{
    public string $name;
    public function __construct(string $name, Engine $engine)
    {
        $this->name = $name;
        parent::__construct($engine);
    }
    public function calculateFuelConsumption(int $distance){
        return $distance * 0.04;
    }
}
class Engine{
    public readonly string $type;
    public readonly int $horsepower;
    public function __construct(string $type, int $horsepower)
    {
        $this->type = $type;
        $this->horsepower = $horsepower;
    }
}
$vehicules = [
    new Car('toyota', new Engine("high", 4)),
    new Motocycle("R1", new Engine("medium", 2))
];
foreach($vehicules as $vehicule){
    $vehicule->calculateFuelConsumption(20);
}



abstract class User{
    public readonly int $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    final public function getId(){
        return $this->id;
    }
    public function getRole(){
        return "unknown";
    }
}
class Student extends User{
    public string $name;
    public function __construct(string $name, int $id)
    {
        $this->name = $name;
        parent::__construct($id);
    }
    public function getRole()
    {
        return "Student";
    }
    public function enroll(Course $course){
        return $course->addStudent($this);
    }
}
class Teacher extends User{
    public string $name;
    public function __construct(string $name, int $id)
    {
        $this->name = $name;
        parent::__construct($id);
    }
    public function getRole()
    {
        return "Teacher";
    }
}
class Course{
    public string $title;
    public array $students = [];
    public function __construct(string $title)
    {
        $this->title = $title;
    }
    public function addStudent(Student $student){
        return $this->students[] = $student;
    }
}






interface Payable{
    public function pay();
}


class Product{
    public string $name;
    public float $price;
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}
class Order{
    public int $id;
    public array $products = [];
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function addProuct(Product $product){
        $this->products[] = $product;
    }
}
class CreditCardPayment implements Payable{
    public function pay()
    {
        return "payment by credit card";
    }
}
$payments = [
    new CreditCardPayment(),
    new CreditCardPayment(),
    new CreditCardPayment(),
];
foreach($payments as $payment){
    echo $payment->pay();
}