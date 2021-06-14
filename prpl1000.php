<?php

class user{
    public $name;
    public $email;

    public function __construct($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function formatJson(){
        return json_encode(['name' => $this->name, 'email' => $this->email]);

    }
    public function validate($data){
        if(!isset($data['name'])){
            throw new \Exception(message:"Bad Request, User Requires A name);

        }
        if(!isset($data['email'])){
            throw new \Exception(message:"Bad Request, User email Required");

        }

    }
}

Route ::get('/', function() {
    $data = request()->query();

    return $data;
    $user = new User($data);
    $user->validate($data)
    return $user->formatJson();
});