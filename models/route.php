<?php
require_once 'models/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity()]
class Route extends BaseModel {
    #[ORM\Column(type: Types::BOOLEAN)]
    public $is_round;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $return_date;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $leaving_date;

    #[ORM\JoinTable(name: 'route_proxies')]
    #[ORM\JoinColumn(name: 'proxy_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'route_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: User::class)]
    public $proxy;

    #[ORM\OneToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'origin_city', referencedColumnName: 'id')]
    public $origin;
    
    #[ORM\OneToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'destination_city', referencedColumnName: 'id')]
    public $destination;

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