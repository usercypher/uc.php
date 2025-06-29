<?php

class Pipe_Book_Home {
    private $app, $session;
    private $bookModel;

    public function args($args) {
        list(
            $this->app, 
            $this->session, 
            $this->bookModel
        ) = $args;
    } 

    public function pipe($input, $output) {
        $break = false;

        $output->html($this->app->path('res', 'html/home.php'), array(
            'app' => $this->app,
            'flash' => $this->session->unset('flash'),
            'csrf_token' => $this->session->get('csrf_token'),
            'books' => $this->bookModel->all(),
        ));

        return array($input, $output, $break);
    }
}