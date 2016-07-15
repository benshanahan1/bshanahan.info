<?php

class Pages extends CI_Controller {

    public function view($page = 'about-me')
    {
        if (! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $search = "-";
        $replace = " ";
        $title = str_replace($search, $replace, $page);  // search and replace in title
        $data['title'] = ucfirst($title);  // capitalize first letter of each word

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}