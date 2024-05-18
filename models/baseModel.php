<?php

require 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

class BaseModel {
    public $id;
    public $created_at;
    public $updated_at;

    public function __construct($kwargs = []) {
        $this->id = Uuid::uuid4()->__toString();
        $this->created_at = new DateTime();
        $this->updated_at = new DateTime();
        foreach ($kwargs as $key => $value) {
            if ($key == "created_at" || $key == "updated_at") {
                $this->$key = DateTime::createFromFormat('Y-m-d H:i:s.u', $value['date']);
            } else {
                $this->$key = $value;
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function __toString()
    {
        return "[" . get_class($this) . "] " . $this->getId() . PHP_EOL . var_dump($this);
    }

}

?>