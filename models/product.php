<?php

require_once __DIR__ . '/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;
use JsonSerializable;

#[ORM\Entity()]
class Product extends BaseModel implements JsonSerializable{
    #[ORM\Column(type: Types::STRING)]
    public $name;

    #[ORM\Column(type: Types::STRING, length: 1024)]
    public $link;

    #[ORM\Column(type: Types::STRING, length: 1024)]
    public $description;
    
    #[ORM\Column(type: Types::FLOAT)]
    public $price;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'patron_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
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

    public function jsonSerialize(): array {
        return [
            'id' => $this->getId(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'name' => $this->name,
            'link' => $this->link,
            'description' => $this->description,
            'price' => $this->price,
            'patron' => $this->patron->jsonSerialize(),
        ];
    }
}
?>