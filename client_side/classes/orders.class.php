<?php
class Orders extends Dbhc
{
    private function setClient($client_name, $client_lastname, $client_cin, $client_phone_number, $client_e_mail, $client_adress, $client_city, $client_zip)
    {
        $stmt = $this->connect()->prepare('INSERT INTO clients VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($client_cin, $client_name, $client_lastname, $client_phone_number, $client_e_mail, $client_city, $client_zip, $client_adress))) {
            echo 'stmt failed';
            $_SESSION['set_order_error'] = 'stmt failed';
            header('Location: ../pages/order.php?error=stmtFailed');
            exit();
        }

        $stmt = null;
    }

    protected function setOrder($client_name, $client_lastname, $client_cin, $client_phone_number, $client_e_mail, $client_adress, $client_city, $client_zip, $order, $product_invoice)
    {
        $count = count($order);

        //checking if client exists in the database
        $stmt = $this->connect()->prepare('SELECT client_id FROM clients WHERE client_id = ?');

        if (!$stmt->execute(array($client_cin))) {
            $_SESSION['set_order_error'] = 'stmt failed';
            header('Location: ../pages/order.php?error=stmtFailed');
            exit();
        }

        //inserting client in db
        if ($stmt->rowCount() == 0) {
            $this->setClient($client_name, $client_lastname, $client_cin, $client_phone_number, $client_e_mail, $client_adress, $client_city, $client_zip);
        }

        //inserting order in db
        $productIds = '';
        $productQuantities = '';

        for ($i = 0; $i < $count; $i++) {
            if ($i == $count - 1) {
                $productIds .= (string)$order[$i]['product_id'];
                $productQuantities .= (string)$order[$i]['quantity'];
            } else {
                $productIds .= (string)$order[$i]['product_id'] . '/';
                $productQuantities .= (string)$order[$i]['quantity'] . '/';
            }
        }

        $stmt = $this->connect()->prepare('INSERT INTO orders (order_product_id, order_client_id, order_product_quantity, order_invoice) VALUES (?, ?, ?, ?)');

        if (!$stmt->execute(array($productIds, $client_cin, $productQuantities, $product_invoice))) {
            $_SESSION['set_order_error'] = 'stmt failed';
            header('Location: ../pages/order.php?error=stmtFailed');
            exit();
        }

        //unsetting the session myCart
        unset($_SESSION['myCart']);

        $stmt = null;
        $_SESSION['set_order_error'] = null;
    }
}
