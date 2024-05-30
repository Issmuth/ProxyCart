<?php
require_once 'models/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity()]
class Order extends BaseModel {
    #[ORM\OneToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'source_city', referencedColumnName: 'id')]
    public $source;

    #[ORM\OneToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'destination_city', referencedColumnName: 'id')]
    public $destination;

    #[ORM\OneToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(name: 'product_id', referencedColumnName: 'id')]
    public $product_id;

    #[ORM\Column(type: Types::FLOAT)]
    public $reward_sum;
    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $deadline;

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