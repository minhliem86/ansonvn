<?php
namespace App\Repositories;

use App\Models\Contact;

class ContactRepository{
  protected $contact;

  public function __construct(Contact $contact)
  {
    $this->contact = $contact;
  }

  public function postRegister($data){
    return $this->contact->create($data);
  }
}
