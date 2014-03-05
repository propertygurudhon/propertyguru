<?php

class baseObj {
    public $mysql;
    private $table;

    public function __construct ()
    {
        $this->mysql = new mysqli("localhost", "dbuser", "2vma", "samples");
        if ($this->mysql->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->mysql->connect_errno . ") " . $this->mysql->connect_error;
        }
    }

    public function get ($id, $field)
    {
        return $this->mysql->query("SELECT $field FROM $table WHERE ID = $id");
    }

    public function getAll ($id)
    {
		//echo "SELECT * FROM property WHERE ID = $id";
        $res = $this->mysql->query("SELECT * FROM Property WHERE ID = $id");
		//print_r($res);
		return $res->fetch_assoc();
		//return $res->num_rows;
		//while($row = $res->fetch_assoc()){
 		//   echo $row['address'] . '<br />';
		//}
        //return $res->mysqli_fetch_assoc();
    }
}

class propertyData extends baseObj {
    public $id = null;
    public $type = null;
    public $title = null;
    public $address = null;
    public $bedroom = null;
    public $livingroom = null;
    public $diningroom = null;
    protected $hdbblock = null;
    private $swimmingPool = null;

    private $table = 'Property';

    public function getType ($ID) { $Type = $this->get( $ID, 'Type'); return $Type; }
    public function getTitle ($ID) { $Title = $this->get( $ID, 'Title') ; return $Type;}
    public function getAddress ($ID) { $Address = $this->get( $ID, 'Address') ; return $Address;}
    public function getBedroom ($ID) { $Bedroom = $this->get( $ID, 'Bedroom') ; return $Bedroom;}
    public function getLivingroom ($ID) { $livingroom = $this->get( $ID, 'Living_room') ; return $livingroom;}
    public function getDiningroom ($ID) { $diningroom = $this->get( $ID, 'Diningroom') ; return $diningroom;}
}

class hdbData extends propertyData {
    private $table = 'HDB';
    public function getHDBBlock ($ID) { $this->hdbblock = $this->get($ID, 'HDBBlock'); return $this->hdbblock; }
}

class condoData extends propertyData {
    private $table = 'ConDO';
    public function gotSwimmingPool ($ID)
    {
        return $this->get($ID, 'SwimmingPool');
    }
}

?>
