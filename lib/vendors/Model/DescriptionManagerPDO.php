<?php

namespace Model;

use \Entity\Description;
use \Entity\Image;

class DescriptionManagerPDO extends DescriptionManager
{
    public function getDescriptionsList()
    {

        $sql = "SELECT id, id_css As idcss, fk_image_id,title FROM descriptions";

        $query = $this->_dao->query($sql);
        while ($descriptionArray = $query->fetch(\PDO::FETCH_ASSOC)) {

            $description = new Description($descriptionArray);
        
            //récup image infos
            $id = $descriptionArray['fk_image_id'];
            $sql = "SELECT images.source, images.title, images.alt  FROM images, descriptions WHERE images.id = :id";
            $query2 = $this->_dao->prepare($sql);
            $query2->bindValue(':id', (int) $id, \PDO::PARAM_INT);
            $query2->execute();
            
            $imageArray = $query2->fetch(\PDO::FETCH_ASSOC);
        
            $description->setImageArray($imageArray);
        
            //récupe des textes pour la description
            $id = $descriptionArray['id'];
            $sql = "SELECT describtexts.text FROM describtexts WHERE describtexts.fk_descript_id = :id";
            $query2 = $this->_dao->prepare($sql);
            $query2->bindValue(':id', (int) $id, \PDO::PARAM_INT);
            $query2->execute();
            
            //on rattache les textes à la description
            while($describtextsArray = $query2->fetch(\PDO::FETCH_ASSOC))
            {
                $description->appendToTextsArray($describtextsArray['text']);
            }

            $descriptionsList[] = $description;

        }

        $query->closeCursor();
        
        return $descriptionsList;
    }
}