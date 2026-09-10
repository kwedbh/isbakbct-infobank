<?php

class Store extends DatabaseObject {
  static protected $db_columns = ['id','product_name',	'price',	'image',	'demo',	'description',	'visible'];
  static protected $table_name="store";
    public $id;
    public $product_name;
    public $price;
    public $image;
    public $demo;
    public $description;
    public $visible;


    public function __construct($args=[]){
      $this->product_name = $args['product_name'] ?? '';
      $this->price = $args['price'] ?? '';
      $this->image = $args['image'] ?? '';
      $this->demo = $args['demo'] ?? '';
      $this->description = $args['description'] ?? '';
      $this->visible = $args['visible'] ?? '';
    }

    static public function find_by_name($name,$option=[])
  {
    $visible = $option['visible'] ?? false;
    $sql ="SELECT * FROM ".static::$table_name ." ";
    $sql .="WHERE product_name = '".self::$db->escape_string($name)."' ";
      if ($visible) {
      $sql .="AND visible = true ";
  }
      $obj_array = static::find_by_sql($sql);

      if (!empty($obj_array)) {
          return array_shift($obj_array);
      }else {
        return false;
      }
  }

    protected function validate()
    {
      $this->errors = [];
      if(Main::is_blank( $this->product_name)) {
        $this->errors[] = "Product Name cannot be blank.";
      }elseif(!Main::has_length( $this->product_name, ['min' => 1, 'max' => 305])) {
        $this->errors[] = "Product Name must be between 10 and 300 characters.";
      }

      if(Main::is_blank( $this->demo)) {
        $this->errors[] = "Demo cannot be blank";
      }elseif(!Main::has_length( $this->demo, ['min' => 1, 'max' => 15000])) {
        $errors[] = "Demo must be between 20 and 15000 characters.";
      }

      if(Main::is_blank( $this->price)) {
        $this->errors[] = "Price cannot be blank";
      }elseif(!Main::has_length( $this->price, ['min' => 1, 'max' => 15000])) {
        $errors[] = "Price must be between 20 and 15000 characters.";
      }

      if(Main::is_blank( $this->image)) {
        $this->errors[] = "Image cannot be blank";
      }elseif(!Main::has_length( $this->image, ['min' => 1, 'max' => 15000])) {
        $errors[] = "Image must be between 20 and 15000 characters.";
      }

      if(Main::is_blank( $this->description)) {
        $this->errors[] = "comment Description cannot be blank";
      }elseif(!Main::has_length( $this->description, ['min' => 1, 'max' => 15000])) {
        $errors[] = "comment Description must be between 20 and 15000 characters.";
      }

      // visible
      // Make sure we are working with a string
      $visible_str = (string)  $this->visible;
      if(!Main::has_inclusion_of($visible_str, ["0","1"])) {
        $errors[] = "Visible must be true or false.";
      }
      return $this->errors;
    }
}
