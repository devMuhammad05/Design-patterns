<?php

interface PaymentStrategy {
    public function pay(float $amount);
}

class CreditCardStrategy implements PaymentStrategy
{
    public function __construct(private string $cardNumber) {}

    public function pay(float $amount): void
    {
        echo "Paid {$amount} using Credit number {$this->cardNumber} \n";
    }
}


class PayPalStrategy implements PaymentStrategy {

    public function __construct(private string $email) {}

    public function pay($amount) {
        echo "Paid {$amount} using PayPal email {$this->email} \n";
    }
}


class ShoppingCart 
{
    private $paymentStrategy;

    public function setpaymentStrategy(PaymentStrategy $paymentStrategy): void
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout(float $amount): mixed 
    {
        return $this->paymentStrategy->pay($amount);
    }
}


$cart = new ShoppingCart();

$creditCard = new CreditCardStrategy("1234-5678-9876-5432");
$cart->setPaymentStrategy($creditCard);
$cart->checkout(100);


$payPal = new PayPalStrategy("user@example.com");
$cart->setPaymentStrategy($payPal);
$cart->checkout(200);