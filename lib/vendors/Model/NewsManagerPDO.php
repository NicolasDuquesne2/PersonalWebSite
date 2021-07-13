<?php

namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
    public function getList($start=-1,$maxLength=-1)
    {
        $sql = 'SELECT id, author, title, ntext, creatDate, modDate FROM news ORDER BY id DESC';
        // si un nombre limité .
        if ($start != -1 || $maxLength != -1)
        {
            $sql .= ' LIMIT '.(int) $maxLength.' OFFSET '.(int) $start;
        }
        
        $query = $this->_dao->query($sql);        
        while($newsParams = $query->fetch(\PDO::FETCH_ASSOC)){
            $news = new News($newsParams);
            $news->setCreatDate(new \DateTime($news->creatDate()));
            $news->setmodDate(new \DateTime($news->modDate()));
            $newsList[] = $news;
        }
    
        
        $query->closeCursor();
        
        return $newsList;
    }

    public function getOneNews($id)
    {
        $query = $this->_dao->prepare('SELECT id, author, title, ntext, creatDate, modDate FROM news WHERE id = :id');
        $query->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $query->execute();
        
        while($newsParams = $query->fetch(\PDO::FETCH_ASSOC)){
            $news = new News($newsParams);
            $news->setCreatDate(new \DateTime($news->creatDate()));
            $news->setModDate(new \DateTime($news->modDate()));
            $newsList[] = $news;
        }

        return $newsList[0];
    }
}