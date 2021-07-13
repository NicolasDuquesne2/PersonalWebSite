<?php

namespace Model;

use \Entity\Contact;

class ContactManagerPDO extends ContactManager
{
    public function comitContact(Contact $contact)
    {
        $sql = "INSERT INTO contacts VALUES(:name, :email, :message)";
        $query = $this->_dao->prepare($sql);
        $query->bindValue(':name', $contact->name(), \PDO::PARAM_INT);
        $query->bindValue(':email', $contact->email(), \PDO::PARAM_INT);
        $query->bindValue(':message', $contact->message(), \PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor()
        )
    }
}