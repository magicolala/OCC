<?php

namespace Bookeeper\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller {

    public function indexAction() {
        return $this->render('BookeeperManagerBundle:Book:index.html.twig');
    }
    public function showAction($id) {
        return $this->render('BookeeperManagerBundle:Book:show.html.twig');
    }
    public function newAction() {
        return $this->render('BookeeperManagerBundle:Book:new.html.twig');
    }
    public function createAction(Request $request) {

    }
    public function editAction($id) {
        return $this->render('BookeeperManagerBundle:Book:edit.html.twig');
    }
    public function updateAction(Request $request, $id) {

    }
    public function deleteAction(Request $request, $id) {

    }
}
