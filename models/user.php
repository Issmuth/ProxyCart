<?php
require_once 'models/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;

#[ORM\Entity()]
class User extends BaseModel {
    #[ORM\Column(type: Types::STRING)]
    public $firstName = "";

    #[ORM\Column(type: Types::STRING)]
    public $lastName = "";

    #[ORM\Column(type: Types::STRING)]
    public $email = "";

    #[ORM\Column(type: Types::STRING)]
    public $password = "";
    
    public function __construct($kwargs = []) {
        parent::__construct();
        foreach ($kwargs as $key => $value) {
            if ($key == "created_at" || $key == "updated_at") {
                $this->$key = DateTime::createFromFormat('Y-m-d H:i:s.u', $value['date']);
            } elseif ($key == "password") {
                $this->$key = password_hash($value, PASSWORD_DEFAULT);
            }
            else {
                $this->$key = $value;
            }
        }
    }
}
?>