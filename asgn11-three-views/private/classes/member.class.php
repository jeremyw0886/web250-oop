<?php

/**
 * Class Member
 * @method static Member|false find_by_id(int $id)
 */
class Member extends DatabaseObject
{
    static protected $table_name = "users";
    static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'user_level', 'hashed_password'];

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $username;
    public $user_level;
    public $hashed_password;
    public $password;
    public $confirm_password;
    public $password_required = true;

    /**
     * Get the member's full name
     * @return string
     */
    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function __construct($args = [])
    {
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->user_level = $args['user_level'] ?? 'm';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    public function verify_password($password)
    {
        return password_verify($password, $this->hashed_password);
    }

    protected function set_hashed_password()
    {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    protected function create()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function update()
    {
        if ($this->password != '') {
            $this->set_hashed_password();
        }
        return parent::update();
    }

    protected function validate()
    {
        $this->errors = [];

        if (is_blank($this->first_name)) {
            $this->errors['first_name'] = "First name cannot be blank.";
        }
        if (is_blank($this->last_name)) {
            $this->errors['last_name'] = "Last name cannot be blank.";
        }
        if (is_blank($this->email)) {
            $this->errors['email'] = "Email cannot be blank.";
        } elseif (!has_valid_email_format($this->email)) {
            $this->errors['email'] = "Email must be a valid format.";
        }
        if (is_blank($this->username)) {
            $this->errors['username'] = "Username cannot be blank.";
        } elseif (!has_length($this->username, ['min' => 4, 'max' => 255])) {
            $this->errors['username'] = "Username must be between 4 and 255 characters.";
        }

        // Only validate password if it's a new record or if password is being updated
        if ($this->is_new() || !is_blank($this->password)) {
            if (is_blank($this->password)) {
                $this->errors['password'] = "Password cannot be blank.";
            } elseif (!has_length($this->password, ['min' => 6])) {
                $this->errors['password'] = "Password must contain 6 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors['password'] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors['password'] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors['password'] = "Password must contain at least 1 number";
            }

            if (is_blank($this->confirm_password)) {
                $this->errors['confirm_password'] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors['confirm_password'] = "Password and confirm password must match.";
            }
        }

        return $this->errors;
    }

    public function is_new()
    {
        return !isset($this->id);
    }

    public static function find_by_username($username)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    public function is_admin()
    {
        return $this->user_level === 'a';
    }

    public function user_level_text()
    {
        return $this->user_level === 'a' ? 'Admin' : 'Member';
    }
}
