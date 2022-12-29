<?php
class FetchOrders extends Dbh
{
    private $orders;
    private $order;
    private $income;
    private $sales = array();

    private function fetchOrdersFromDb()
    {
        $stmt = $this->connect()->query("SELECT * FROM orders");

        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->orders[$i] = $row;
            $i++;
        }

        $stmt = null;
    }

    private function fetchOrderWithId($order_id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM orders WHERE order_id=?');

        $stmt->execute(array($order_id));

        $this->order = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $stmt = null;
    }

    private function fetchPendingOrders()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM orders WHERE state = 0');

        $stmt->execute();

        $this->orders = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $stmt = null;
    }
    
    private function fetchTodaysIncome()
    {
        $stmt = $this->connect()->prepare('SELECT order_invoice FROM orders WHERE (state = 1) and ( DAY(order_date) = DAY(CURRENT_TIMESTAMP) )');

        $stmt->execute();

        $this->income = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $stmt = null;
    }

    private function fetchLast7DaysSales(){
        for($i = 0; $i < 7; $i++){

            $currentDay = date('d',strtotime("-$i days"));
            $currentMonth = date('m');
            $currentYear = date('Y');

            $stmt = $this->connect()->prepare('SELECT count(*) FROM orders WHERE DAY(order_date) = ? AND MONTH(order_date) = ? AND YEAR(order_date) = ?;');

            $stmt->execute(array($currentDay, $currentMonth, $currentYear));

            $container = $stmt->fetchAll(pdo::FETCH_ASSOC);

            array_push($this->sales, $container[0]['count(*)']);
        }
        $stmt = null;
    }

    public function editOrderState($order_id, $state){
        $stmt = $this->connect()->prepare('UPDATE orders SET state = ? WHERE order_id = ?');

        $stmt->execute(array($state, $order_id));

        $stmt = null;
    }
    
    public function getOrders()
    {
        $this->fetchOrdersFromDb();

        return $this->orders;
    }

    public function getOrderWithId($order_id)
    {

        $this->fetchOrderWithId($order_id);

        return $this->order;
    }

    public function getPendingOrders(){
        $this->fetchPendingOrders();

        return $this->orders;
    }

    public function getTodaysIncome(){
        $this->fetchTodaysIncome();

        return $this->income;
    }

    public function getSales(){
        $this->fetchLast7DaysSales();

        return $this->sales;
    }
}
