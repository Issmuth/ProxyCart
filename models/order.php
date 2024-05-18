<?php
require_once 'models/baseModel.php';

class Order extends BaseModel {
    public $source;
    public $destination;
    public $product_id;
    public $reward_sum;
    public $deadline;

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