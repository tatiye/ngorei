<?php
use app\tatiye;
class Inspection extends Controller{
    public function index(){
      if (tatiye::urlroot() ==URLROOT) {
         $this->install(tatiye::setControllers('install'));
      } else {
         header("Location:".tatiye::urlroot('/config'));
      }
    }

  }



