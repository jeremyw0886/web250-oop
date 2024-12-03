<?php
class DatabaseObject {
  static protected $database;
  static protected $table_name = "";
  static protected $db_columns = [];
  public $errors = [];
  public $id;
  public $common_name;
  public $conservation_id;
  public $habitat;
  public $food;


  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  public static function get_conservation_options() {
    return self::CONSERVATION_OPTIONS;
  }


  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }
    $result->free();
    return $object_array;
  }

  public function conservation() {
    if($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown";
    }
  }

  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->common_name)) {
      $this->errors['common_name'] = "*Common Name cannot be blank.*";
    }
    if(is_blank($this->habitat)) {
      $this->errors['habitat'] = "*Habitat cannot be blank.*";
    }
    if(is_blank($this->food)) {
      $this->errors['food'] = "*Food cannot be blank.*";
    }
    if(is_blank($this->conservation_id)) {
      $this->errors['conservation_id'] = "*Conservation status cannot be blank.*";
    }

    return $this->errors;
  }

    protected function validate_delete() {
    $this->errors = [];

    if(is_blank($this->conservation_id)) {
      $this->errors[] = "*Conservation status is required.*";
      return $this->errors;
    }

    if($this->conservation_id == '4') {
      $this->errors[] = "*Cannot delete birds marked as Extinct.*";
    }

    if($this->conservation_id == '3') {
      $this->errors[] = "*Cannot delete birds of Extreme concern.*";
    }

    if($this->conservation_id == '2') {
      $_SESSION['message'] = "*Warning: You are deleting a bird of Moderate concern.*";
    }

    return $this->errors;
  }

  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  protected function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  static protected function instantiate($record) {
    $object = new static;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  public function delete_related_images() {
    $sql = "DELETE FROM bird_images ";
    $sql .= "WHERE bird_id_fk='" . self::$database->escape_string($this->id) . "'";
    $result = self::$database->query($sql);
    return $result;
  }

  public function delete() {
    $this->validate_delete();
    if(!empty($this->errors)) { return false; }

    $this->delete_related_images();

    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

}
