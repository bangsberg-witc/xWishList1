<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author 13064726
 */
class User {
    
     private $id, $firstName, $lastName, $email, $address;
     private $city, $state, $zip, $password, $isActive;
     
    
    //put your code here
     
   
     public function __construct($id, $firstName, $lastName, $email, $address, $city, $state, $zip, $password, $isActive ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->password = $password;
        $this->isActive = $isActive;
    }
    
    public function setID($id){
        $this->id = $id;
    }
    
    public function getID(){
        return $this->id;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function getStatus(){
        
        $status = "";
        if ($this->isActive == 1)
            $status = "Active";
        else 
            $status = "Deleted";
        
        return $status;
        
    }
    
    // Returns either 0 or 1 might be needed depending upon how 
    // you use display the dropdown for isActive
    public function getNotIsActive() {
        
        if ($this->isActive)
            $notIsActive = 0;
        else
            $notIsActive = 1;
        
        return $notIsActive;
    }

    
}
