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
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('index.php');
    }

    public function page1()
    {
        $this->load->view('page1.php');
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


                $this->form_validation->set_rules('uname', 'Username', 'required|min_length[5]|max_length[15]|trim');
                $this->form_validation->set_rules('pname', 'Password', 'required|min_length[5]|max_length[15]|trim');
                
                if($this->form_validation->run() == FALSE){

                    $this->load->view('index');

                }else{

                    $userexist = $this->logindb->checkuser($data);
                    $passexist = $this->logindb->checkpass($data);


                    if(!empty($userexist) && !empty($passexist)){
                        $allid['data']=$this->logindb->displayrecords();
                        
                        $this->load->view('show', $allid);
                    }else{
                        
                        $this->session->set_flashdata("err","Username and Password not found ");
                        $this->load->view('index');
                    }
                    
                }
            }
        
        }

    // public function username_check($str)
    // {
    //     $temp = $this->logindb->checkuser($str);
    //     if ($temp)
    //     {
    //             $this->form_validation->set_message('username_check', 'username {field} already use');
    //             return FALSE;
    //     }
    //     else
    //     {
    //             return TRUE;
    //     }
    // }

    // public function password_check($str)
    // {
    //     $temp = $this->logindb->checkpass($str);
    //     if ($temp)
    //     {
    //             $this->form_validation->set_message('username_check', 'password {field} already use"');
    //             return FALSE;
    //     }
    //     else
    //     {
    //             return TRUE;
    //     }
    // }

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


            $this->form_validation->set_rules('uname', 'Username', 'required|min_length[5]|max_length[15]|trim');
            $this->form_validation->set_rules('pname', 'Password', 'required|min_length[5]|max_length[15]|trim');
                
            if($this->form_validation->run() == FALSE){

                $this->load->view('registration');

            }else{

                $userexist = $this->logindb->checkuser($data);
                $passexist = $this->logindb->checkpass($data);


                if(!empty($userexist) && !empty($passexist)){

                    $this->session->set_flashdata("err","Username and Password Exist ");
                    $this->load->view('registration');
                    
                }else{
                    $result = $this->logindb->saverecords($data['name'],$data['pass'],$data['email']);
                    $this->load->view('index');
                }
                
            }


            
        }
    }

    public function php()
    {
        # code...
        $this->load->view('test.php');

    }
}