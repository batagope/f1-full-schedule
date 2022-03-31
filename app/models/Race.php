<?php

class Race extends Model {

    public $name;
    public $country;
    public $start_date;
    public $end_date;
    public $laps;
    public $winner;
    public $constructor_winner;

    public function all() {

        $sql = "SELECT * FROM race";
        $stmt = self::$connection->query($sql);
        // izvlaci kolone table races iz baze i dodeljuje ih propertties klasi Race
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Race');
        return $stmt->fetchAll();


    }

    public function create() {

        $sql = "INSERT INTO race (name, country, start_date, end_date, laps, winner, constructor_winner ) 
                VALUES (:name, :country, :start_date, :end_date, :laps, :winner, :constructor_winner)";
        $stmt = self::$connection->prepare($sql);

        
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $this->start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $this->end_date, PDO::PARAM_STR);
        $stmt->bindParam(':laps', $this->laps, PDO::PARAM_INT);
        $stmt->bindParam(':winner', $this->winner, PDO::PARAM_STR);
        $stmt->bindParam(':constructor_winner', $this->constructor_winner, PDO::PARAM_STR);

        $stmt->execute();

        return self::$connection->lastInsertId();

    }

    public function find($id) {

        $sql="SELECT * FROM race WHERE id = :id";
        $stmt = self::$connection->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Race');
        return $stmt->fetch();
    }

    // proveriti zasto ovde ne ide argument $id u funkciji, vec se koristi $this->id ove klase koji nije ni definisan
    // mozda ga vraca FETCH::CLASS konstanta. Ispitati to malo dublje
    public function update() {

        $sql = "UPDATE race SET name = :name, country = :country, start_date = :start_date, end_date = :end_date, laps = :laps, 
                winner = :winner, constructor_winner = :constructor_winner WHERE id = :id";
        $stmt = self::$connection->prepare($sql);

        
        $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $this->start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $this->end_date, PDO::PARAM_STR);
        $stmt->bindParam(':laps', $this->laps, PDO::PARAM_INT);
        $stmt->bindParam(':winner', $this->winner, PDO::PARAM_STR);
        $stmt->bindParam(':constructor_winner', $this->constructor_winner, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $stmt->execute();

    }

    // isto kao i za update method, koristi se id objekta, umesto da se prosledi kao parametar
    // moguce je da se prosledi i kao parametar, probati i tu opciju, koja je po meni logicnija
    public function delete() {

        $sql = "DELETE FROM race WHERE id = :id";
        $stmt = self::$connection->prepare($sql);

        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $stmt->execute();

    }


}