<?php

namespace App\Frontend\Modules\FrontPage;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \OCFram\Form;
use \OCFram\StringField;
use \OCFram\TextField;
use \Entity\Contact;

class FrontPageController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        
        $manager = $this->_managers->getManagerOf('Description');

        $descriptionsList = $manager->getDescriptionsList();
    
        $this->page()->addVar('descriptionsList',$descriptionsList);

        if($request->method() == 'POST'){
            $contact = new Contact([
                'name' => $request->postData('name'),
                'email' => $request->postData('email'),
                'message' => $request->postData('message')
            ]);
        } else{
            $contact = new Contact;
        }

        $form = new Form([
            'entity' => $contact,
            'id' => 'form',
            'inputId' => 'sendMail',
            'inputType' => 'submit',
            'inputValue' => 'Envoyer'
        ]);

        $form->addField(new StringField([
            'name' => 'name',
            'label' => 'Nom :',
            'for' => 'name',
            'class' => 'inp',
            'id' => 'name'
        ]))
        ->addField(new StringField([
            'name' => 'email',
            'label' => 'E-mail :',
            'for' => 'email',
            'class' => 'inp',
            'id' => 'email'
        ]))
        ->addField(new TextField([
            'name' => 'message',
            'wrap' => 'soft',
            'label' => 'Message :',
            'for' => 'message',
            'class' => 'inp',
            'id' => 'message'
        ]));

        $this->page()->addVar('form', $form->createView());

    }
}