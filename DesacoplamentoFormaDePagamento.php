<?php

interface PaymentGateway {
    public function processPayment($amount);
}

class PayPalPaymentGateway implements PaymentGateway {
    
    public function processPayment($amount) {
        echo("Paypal Payment: " . $amount . "<br />");
    }
}

class PagSeguroPaymentGateway implements PaymentGateway {
    public function processPayment($amount) {
        echo("PagSeguro Payment: " . $amount. "<br />");
    }
}

class PaymentService {
    private $gateway;

    public function __construct(PaymentGateway $gateway) {
        $this->gateway = $gateway;
    }

    public function makePayment($amount) {
        $this->gateway->processPayment($amount);
    }
}

$paypal = new PaymentService(new PayPalPaymentGateway());
$paypal->makePayment(200);

$pagseguro = new PaymentService(new PagSeguroPaymentGateway());
$pagseguro->makePayment(300);

?>