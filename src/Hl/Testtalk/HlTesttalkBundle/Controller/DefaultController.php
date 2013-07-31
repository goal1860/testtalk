<?php

namespace Hl\Testtalk\HlTesttalkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('HlTesttalkHlTesttalkBundle:Book')
                ->findAllBooks();
        $name = $this->getUser()->getUsername();
        return $this->render(
                        'HlTesttalkHlTesttalkBundle:Default:index.html.twig', 
                array('name' => $name, 'books' => $books)
        );
    }

}
