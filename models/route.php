<?php
require_once __DIR__ . '/baseModel.php';

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;
use JsonSerializable;

#[ORM\Entity()]
class Route extends BaseModel implements JsonSerializable{
    #[ORM\Column(type: Types::BOOLEAN)]
    public $is_round;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    public $return_date;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $leaving_date;

    #[ORM\JoinTable(name: 'route_proxies')]
    #[ORM\JoinColumn(name: 'proxy_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'route_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: User::class)]
    public $proxy;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'origin_city', referencedColumnName: 'id')]
    public $origin;
    
    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'destination_city', referencedColumnName: 'id')]
    public $destination;

    public function __construct($kwargs = []) {
        parent::__construct();
        $this->proxy = new ArrayCollection();
        foreach ($kwargs as $key => $value) {
            if ($key == "created_at" || $key == "updated_at") {
                $this->$key = DateTime::createFromFormat('Y-m-d H:i:s.u', $value['date']);
            } elseif ($key == "leaving_date" || $key == "return_date") {
            if ($value){
               $this->$key = DateTime::createFromFormat('Y-m-d', $value);
            }
            } elseif ($key == 'proxy') {
                $this->proxy->add($value);
            }
            else {
                $this->$key = $value;
            }
        }
    }

    public function jsonSerialize() : array {
        return [
            'id' => $this->getId(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_round' => $this->is_round,
            'return_date' => $this->return_date,
            'leaving_date' => $this->leaving_date,
            'origin' => $this->origin->jsonSerialize(),
            'destination' => $this->destination->jsonSerialize(),
            'proxy' => $this->proxy->map(function ($user) {
                return $user->jsonSerialize();
            })->toArray(),
        ];
    }

}
?>