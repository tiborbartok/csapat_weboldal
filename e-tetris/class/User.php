<?php

class User {
    private string $username;
    private string $email;
    private string $pwd;

    /* Constructor */
    public function __construct(string $username, string $email, string $pwd){
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    /* Getter, Setter */
    public function getUsername(){
        return $this->username;
    }

    public function setUsername(string $username): void{
        $this->username=$username;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email): void{
        $this->email=$email;
    }

    public function getPwd(): string{
        return $this->pwd;
    }

    public function setPwd(string $pwd): void{
        $this->pwd=$pwd;
    }
}
