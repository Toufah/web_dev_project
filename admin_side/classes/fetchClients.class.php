<?php
class FetchClients extends Dbh
{
    private $clients;
    private $client;

    private function fetchClientsFromDb()
    {
        $stmt = $this->connect()->query("SELECT * FROM clients");

        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->clients[$i] = $row;
            $i++;
        }

        $stmt = null;
    }


    private function fetchClientWithId($client_id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM clients WHERE client_id=?');

        $stmt->execute(array($client_id));

        $this->client = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $stmt = null;
    }

    public function getClients()
    {
        $this->fetchClientsFromDb();

        return $this->clients;
    }

    public function getClientWithId($client_id){
        $this->fetchClientWithId($client_id);

        return $this->client;
    }
}
