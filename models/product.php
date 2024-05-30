<?php

require_once 'models/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity()]
class Product extends BaseModel {
    #[ORM\Column(type: Types::STRING)]
    public $name;

    #[ORM\Column(type: Types::STRING, length: 1024)]
    public $link;

    #[ORM\Column(type: Types::STRING, length: 1024)]
    public $description;
    
    #[ORM\Column(type: Types::FLOAT)]
    public $price;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'patron_id', referencedColumnName:'id')]
    public $patron;

    public function __construct($kwargs = []) {
        parent::__construct();
        foreach ($kwargs as $key => $value) {
            if ($key == "created_at" || $key == "updated_at") {
                $this->$key = DateTime::createFromFormat('Y-m-d H:i:s.u', $value['date']);
            } else {
                $this->$key = $value;
            }
        }
    }
}
?>