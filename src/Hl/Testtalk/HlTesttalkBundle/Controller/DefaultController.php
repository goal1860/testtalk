<?php

namespace Hl\Testtalk\HlTesttalkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hl\Testtalk\HlTesttalkBundle\Entity\Book;

class DefaultController extends Controller {

    private $form;

    public function indexAction() {

        $session = $this->getRequest()->getSession();
        if ($session->has('books')) {
            $books = $session->get('books');
        } else {
            $em = $this->getDoctrine()->getManager();
            $books = $em->getRepository('HlTesttalkHlTesttalkBundle:Book')
                    ->findAllBooks();
            $session->set('books', $books);
        }
        $name = $this->getUser()->getUsername();
        $roles = $this->getUser()->getRoles();

//        $book->setImage('default.jpg');
        $this->form = $this->getForm();
        return $this->render(
        'HlTesttalkHlTesttalkBundle:Default:index.html.twig', array('name' => $name, 'role' => $roles[0], 'books' => $books, 'form' => $this->form->createView())
        );
    }

    public function deleteAction() {
        $session = $this->getRequest()->getSession();
        $books = $session->get('books');
        $request = $this->getRequest();
        $bookid = $request->query->get('bookid');
        $found = -1;
        foreach ($books as $key => $book) {

            if ($book->getId() == $bookid) {
                $found = $key;
                break;
            }
        }
        if ($found != -1) {
            unset($books[$found]);
            $session->set('books', $books);
        }

        return $this->redirect($this->generateUrl('_testtalk_home'));
    }

    public function addAction() {
        $session = $this->getRequest()->getSession();
        $books = $session->get('books');
        $request = $this->getRequest();
        $form = $request->request->get('form');
        $language = $form['language'];
        $name = $form['name'];
        $description = $form['desc'];
        if (isset($form['new'])) {
            $new = $form['new'];
        } else {
            $new = false;
        }
        $bookid = '99999';
        $new_book = new Book();
        $new_book->setDescription($description);
        $new_book->setId($bookid);
        $new_book->setName($name);
        $new_book->setLanguage($language);
        $new_book->setImage('the-guts.jpg');
        $new_book->setNew($new);
        $books [] = $new_book;
        $session->set('books', $books);
        $html = $this->renderView(
                'HlTesttalkHlTesttalkBundle:Default:book_table.html.twig', array('books' => $books)
        );
        //echo $html;
        $out_json = array(
            'status' => "ok",
            'html' => $html
        );
        return new \Symfony\Component\HttpFoundation\Response(json_encode($out_json));
    }

    private function getForm() {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('_testtalk_add_book'))
                        ->add('name', 'text')
                        ->add('desc', 'textarea', array('label' => 'Description'))
                        ->add('language', 'choice', array(
                            'choices' => array('English' => 'English', 'Spanish' => 'Spanish', "Russian" => "Russian"),
                            'required' => true,
                        ))
                        ->add('new', 'checkbox', array('required' => false))
                        ->add('Add', 'submit')
                        ->getForm();
    }

}
