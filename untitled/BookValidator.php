<?php

class BookValidator
{
  public function validate($book){
      if($book->getPrice() < 0){
          throw new Exception ("The price must be positive!");
      }

      if (strlen($book->getName()) > 10){
          throw new Exception ("The name shouldn't be longer than 10 characters!");
      }

      if(strlen($book->getCategory())>10){
          throw new Exception ("The category shouldn't be longer than 10 characters!");
      }

  }
}