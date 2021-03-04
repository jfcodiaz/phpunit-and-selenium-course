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

}
