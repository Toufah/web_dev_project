<?php
class OrdersContr extends Orders
{
    private $client_name;
    private $client_lastname;
    private $client_cin;
    private $client_phone_number;
    private $client_e_mail;
    private $client_adress;
    private $client_city;
    private $client_zip;
    private $order;
    private $product_invoice;

    public function __construct($client_name, $client_lastname, $client_cin, $client_phone_number, $client_e_mail, $client_adress, $client_city, $client_zip, $order, $product_invoice)
    {
        $this->client_name = strtolower($client_name);
        $this->client_lastname = strtolower($client_lastname);
        $this->client_cin = strtolower($client_cin);
        $this->client_phone_number = $client_phone_number;
        $this->client_e_mail = $client_e_mail;
        $this->client_adress = strtolower($client_adress);
        $this->client_city = strtolower($client_city);
        $this->client_zip = $client_zip;
        $this->order = $order;
        $this->product_invoice = $product_invoice;
    }

    private function phone_number_verification(){
        if(strlen((string)($this->client_phone_number)) != 10){
            return false;
        }else{
            return true;
        }
    }

    private function e_mail_verification()
    {
        if (filter_var($this->client_e_mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function newOrder()
    {
        if ($this->phone_number_verification() == false) {
            $_SESSION['set_order_error'] = 'invalid phone number';
            header('Location: ../pages/order.php?error=invalidPhoneNumber');
            exit();
        }

        if ($this->e_mail_verification() == false) {
            $_SESSION['set_order_error'] = 'invalid e_mail';
            header('Location: ../pages/order.php?error=invalidEmail');
            exit();
        }

        $this->setOrder($this->client_name, $this->client_lastname, $this->client_cin, $this->client_phone_number, $this->client_e_mail, $this->client_adress, $this->client_city, $this->client_zip, $this->order, $this->product_invoice);
    }
}
