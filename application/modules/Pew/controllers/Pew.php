<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pew extends MX_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('pew/logindb');
    }

    public function index()
    {
        $this->load->view('index.php');
    }

    public function show()
    {

        $post = $this->input->post();
        $get = $this->input->get();

        $params = array_merge($post, $get);

        if($post){
            $data = array(
                'name' => $params['uname'],
                'pass' => $params['pname'],
            );
        
        $result = $this->logindb->login($data);
        if($result){

            $allid['data']=$this->logindb->displayrecords();
	
            $this->load->view('show', $allid);
        }else{

            $this->form_validation->set_rules('uname', 'Username', 'required|min_length[5]|max_length[15]|trim');
            $this->form_validation->set_rules('pname', 'Password', 'required|min_length[5]|max_length[15]|trim');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('index.php');
            }else{
                $this->load->view('index.php');
            }
        }
        }
    }

    public function registration(){
        $this->load->view('registration');
    }

    public function regbth(){
        $post = $this->input->post();
        $get = $this->input->get();

        $params = array_merge($post, $get);


        if($post){
            $data = array(
                'name' => $params['uname'],
                'pass' => $params['pname'],
                'email' => $params['email']
            );

            $result = $this->logindb->saverecords($data['name'],$data['pass'],$data['email']);
            if($result == TRUE){
                $this->load->view('registration');
            }else{
                $this->load->view('index.php');
            }
        }
    }

    public function php()
    {
        # code...
        $this->load->view('test.php');

    }
}