<?php

class Pipe_Book_Store {
    private $app, $session;
    private $bookModel;

    public function args($args) {
        list(
            $this->app, 
            $this->session, 
            $this->bookModel
        ) = $args;
    } 

    public function pipe($request, $response) {
        $break = false;

        $data = $request->post;

        $route = $this->bookModel->validateAndCreate($data) ? 'home' : 'create';

        $this->session->set('flash', $this->bookModel->getFlash());

        $response->redirect($this->app->url('route', $route));

        return array($request, $response, $break);
    }
}