<?php
namespace App\Events;

class SendEmailEvent
{
   public $data;

   public function __construct($data)
   {
         $this->data = $data;
   }

}