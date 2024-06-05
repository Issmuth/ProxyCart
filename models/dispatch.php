<?php
require_once __DIR__ . '/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity()]
class Dispatch extends BaseModel{
    #[ORM\OneToOne(targetEntity: Route::class)]
    #[ORM\JoinColumn(name: 'route_id', referencedColumnName: 'id')]
    public $route;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'proxy_id', referencedColumnName: 'id')]
    public $proxy;
    
    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'patron_id', referencedColumnName: 'id')]
    public $patron;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $start_date;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public $end_date;

    #[ORM\Column(type: Types::BOOLEAN)]
    public $is_complete;

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