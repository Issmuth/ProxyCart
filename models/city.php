<?php
require_once __DIR__ . '/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity]
class City extends BaseModel {
    #[ORM\Column(type: Types::STRING, nullable: false)]
    public $name = "";
    
    #[ORM\Column(type: Types::STRING, nullable: false)]
    public $country = "";
    
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