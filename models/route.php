<?php
require_once 'models/baseModel.php';

class Route extends BaseModel {
    public $is_round;
    public $return_date;
    public $leaving_date;
    public $proxy;
    public $origin;
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