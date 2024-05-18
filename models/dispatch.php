<?php
require_once 'models/baseModel.php';

class Dispatch extends BaseModel{
    public $route;
    public $proxy;
    public $patron;
    public $start_date;
    public $end_date;
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