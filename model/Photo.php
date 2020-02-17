<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Photo
 *
 * @author 13064726
 */
class Photo {
    //put your code here
    
    private $fileName, $description, $type, $width, $height;
    
     public function __construct($fileName, $width){
         $this->fileName = $fileName;
         $this->width = $width;
     }
     
     public function getFileName() {
         return $this->fileName;
     }

     public function getDescription() {
         return $this->description;
     }

     public function getType() {
         return $this->type;
     }

     public function getWidth() {
         return $this->width;
     }

     public function getHeight() {
         return $this->height;
     }

     public function setFileName($fileName) {
         $this->fileName = $fileName;
     }

     public function setDescription($description) {
         $this->description = $description;
     }

     public function setType($type) {
         $this->type = $type;
     }

     public function setWidth($width) {
         $this->width = $width;
     }

     public function setHeight($height) {
         $this->height = $height;
     }


     
             
    
}
