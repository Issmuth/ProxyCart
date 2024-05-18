<?php
require_once 'models/baseModel.php';

class User extends BaseModel {
    public $firstName = "";
    public $lastName = "";
    public $email = "";
    public $password = "";
    
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