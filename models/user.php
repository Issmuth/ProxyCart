<?php
require_once __DIR__ . '/baseModel.php';
use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\DBAL\Types\Types;
use JsonSerializable;

#[ORM\Entity()]
class User extends BaseModel implements JsonSerializable{
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

    public function jsonSerialize(): array {
        return [
            'id' => $this->getId(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
?>