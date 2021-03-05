<?php
namespace App;

class User
{
    private $name;
    protected $last_name;
    private $db;

    public function __construct($name, $last_name)
    {
        $this->name = ucfirst($name);
        $this->last_name = ucfirst($last_name);
        $this->db = new Database;
    }


    public function getFullName()
    {
        $data = $this->db->getEmailAndLastName();
        $this->name = $data['name'];
        $this->last_name;
        return sprintf('%s %s', $this->name, $this->last_name);
    }

    private function hashPassword()
    {
        return 'password hashed!';
    }

    protected function protectedHashPassword()
    {
        return $this->hashPassword();
    }

    public function someOperation($array)
    {
        $count = count($array);

        if ($count == 0) {
            return 'error';
        } else if ($count == 1) {
            if ($array[0] == 0) {
                return 'error';
            } else {
                return 'ok!';
            }
        } else {
            return 'ok!';
        }

    }

}
