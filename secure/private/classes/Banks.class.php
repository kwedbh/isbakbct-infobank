<?php

class Banks extends DatabaseObject {
  static protected $db_columns = ['id', 'name', 	'min', 	'max', 	'status', 	];
  static protected $table_name="banks";
    public $id;
    public $name;
   	public $min;
   	public $max;
   	public $status;  

    public function __construct($args=[]){
      $this->name = $args['name'] ?? '';
      $this->min = $args['min'] ?? '0';
      $this->max = $args['max'] ?? '0';
      $this->status = $args['status'] ?? '0';

    }

}
