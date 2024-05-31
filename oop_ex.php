<?php

    abstract class User
    {
        protected $firstname;
        protected $lastname;
        protected $email;
        protected $username;

        public function __construct($firstname, $lastname, $email, $username)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->username = $username;
        }

        abstract public function getInfo();
    }

    class AdminUser extends User
    {

        private $id_admin;
        public function __construct($fírstname, $lastname, $email, $username)
        {
            parent::__construct($fírstname, $lastname, $email, $username);
            $this->id_admin = true;
        }

        public function getInfo()
        {
            return [
                'name' => $this->firstname . ' ' . $this->lastname,
                'email' => $this->email,
                'username' => $this->username,
                'is_admin' => $this->id_admin

            ];
        }
    }


    class Customer extends User
    {
        private $city;
        private $state;
        private $country;

        public function __construct($firstname, $lastname, $email, $username, $city, $state, $country)
        {
            parent::__construct($firstname, $lastname, $email, $username);
            $this->city = $city;
            $this->state = $state;
            $this->country = $country;
        }

        public function getInfo()
        {
            return [
                'name' => $this->firstname . ' ' . $this->lastname,
                'email' => $this->email,
                'username' => $this->username,
                'is_admin' => false,
                'location' => $this->city . ' - ' . $this->state . ' - ' . $this->country

            ];
        }
    }
