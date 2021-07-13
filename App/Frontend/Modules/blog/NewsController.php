<?php

namespace App\Frontend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class NewsController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $numOfNews = $this->app()->config()->get('num_of_news');
        $numOfChar = $this->app()->config()->get('num_of_char');
        
        $this->page()->addVar('title','Liste des '.$numOfNews.' dernières news');

        $manager = $this->_managers->getManagerOf('News');

        $newsList = $manager->getList(0,$numOfNews);
        
        foreach($newsList as $news){
            if(strlen($news->ntext())> $numOfChar){
                $shortText = substr($news->ntext(),0,$numOfChar);
                $shortText = substr($shortText,0,strrpos($shortText,' ')).'...';

                $news->setNText($shortText);
            }
        }

        $this->page()->addVar('newsList',$newsList);
    }

    public function executeShow(HTTPRequest $request)
    {
        $news = $this->managers()->getManagerOf('News')->getOneNews($request->getData('id'));
        
        if (empty($news))
        {
            $this->app()->httpResponse()->redirect404();
        }

        $this->page()->addVar('title', $news->title());
        $this->page()->addVar('news', $news);
    }
}