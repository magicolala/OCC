<?php

namespace Bookeeper\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Bookeeper\ManagerBundle\Entity\Book;
use Bookeeper\ManagerBundle\Form\BookType;
use Doctrine\ORM\EntityManager;

class BookController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('BookeeperManagerBundle:Book')->findAll();
        return $this->render('BookeeperManagerBundle:Book:index.html.twig', array(
            'books'=>$books
        ));
    }
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('BookeeperManagerBundle:Book')->find($id);

        return $this->render('BookeeperManagerBundle:Book:show.html.twig', array(
            'book'=>$book
        ));
    }
    public function newAction() {
        $book = new Book();

        $form = $this->createForm(new BookType(), $book, array(
            'action'=>$this->generateUrl('book_create'),
            'method'=>'POST'
        ));

        $form->add('submit', 'submit', array('label'=>'Create Book'));

        return $this->render('BookeeperManagerBundle:Book:new.html.twig', array(
            'form'=>$form->CreateView()
        ));
    }
    public function createAction(Request $request) {
        $book = new Book();

        $form = $this->createForm(new BookType(), $book, array(
            'action'=>$this->generateUrl('book_create'),
            'method'=>'POST'
        ));

        $form->add('submit', 'submit', array('label'=>'Create Book'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            $this->get('session')->getFlashBag()->add('msg', 'Your book has been created!');

            return $this->redirect($this->generateUrl('book_show', array('id'=>$book->getId())));
        }

        $this->get('session')->getFlashBag()->add('msg', 'Something went wrong!');

        return $this->render('BookeeperManagerBundle:Book:new.html.twig', array(
            'form'=>$form->CreateView()
        ));
    }
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('BookeeperManagerBundle:Book')->find($id);

        $form = $this->createForm(new BookType(), $book, array(
            'action'=>$this->generateUrl('book_update', array('id'=>$book->getId())),
            'method'=> 'PUT'
        ));

        $form->add('submit', 'submit', array('label'=>'Update Book'));

        return $this->render('BookeeperManagerBundle:Book:edit.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('BookeeperManagerBundle:Book')->find($id);

        $form = $this->createForm(new BookType(), $book, array(
            'action'=>$this->generateUrl('book_update', array('id'=>$book->getId())),
            'method'=> 'PUT'
        ));

        $form->add('submit', 'submit', array('label'=>'Update Book'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add('msg', 'Your book has been updated!');

            return $this->redirect($this->generateUrl('book_show', array('id'=>$id)));
        }

        return $this->render('BookeeperManagerBundle:Book:edit.html.twig', array(
            'form'=>$form->createView()
        ));

    }
    public function deleteAction(Request $request, $id) {

    }
}
