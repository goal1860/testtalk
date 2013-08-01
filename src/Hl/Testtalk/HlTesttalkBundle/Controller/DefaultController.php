<?php

namespace Hl\Testtalk\HlTesttalkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hl\Testtalk\HlTesttalkBundle\Entity\Book;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('HlTesttalkHlTesttalkBundle:Book')
                ->findAllBooks();
        $session = $this->getRequest()->getSession();
        $session->set('books', $books);
        
        $name = $this->getUser()->getUsername();
        
        $book = new Book();
        $book->setImage('default.jpg');
        $form = $this->createFormBuilder($book)
            ->add('name', 'text')
            ->add('language', 'choice', array(
                'choices' => array('English' => 'English', 'Spanish' => 'Spanish', "Russian" => "Russian"),
                'required' => true,
            ))
            ->add('new', 'checkbox') 
            ->add('Add', 'submit')
            ->getForm();
        return $this->render(
                        'HlTesttalkHlTesttalkBundle:Default:index.html.twig', 
                array('name' => $name, 'books' => $books, 'form' => $form->createView())
        );
    }
    
    public function deleteAction(){
        $session = $this->getRequest()->getSession();
        $books = $session->get('books');
        $request = $this->getRequest(); 
        $bookid = $request->query->get('bookid');
        $found = -1;
        foreach($books as $key => $book){
            
            if($book->getId() == $bookid){
                $found = $key;
                break;
            }
        }
        if($found != -1){
            unset($books[$found]);
            $session->set('books', $books);
        }
        $name = $this->getUser()->getUsername();
        return $this->render(
                        'HlTesttalkHlTesttalkBundle:Default:index.html.twig', 
                array('name' => $name, 'books' => $books)
        );
    }

}
