<?php //session_start(); 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {


    public function __construct() {
        parent::__construct();

        $this->load->helper('form');

        $this->load->library('form_validation');

        //$this->load->library('session');

        //$this->load->model('login_database');
    }
    public function index()
    {
        $this->load->view('index.php');
    }

    public function register(){
        $this->load->view('registrationfrom.php');
    }

    public function registerandvaildtion(){
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        // if($this->form_validation->run() == FALSE){
        //     $this->load->view('registrationfrom.php');
        // }else{
            $data = array(
                'user_name' => $this->input->post('username'),
                //'user_email' => $this->input->post('email_value'),
                'user_password' => $this->input->post('password')
            );

            $data1 = array(
                'user_name1' => $this->input->get('username'),
                //'user_email1' => $this->input->get('email_value'),
                'user_password1' => $this->input->get('password')
            );
            
            $this->load->view("getpost.php", $data,$data1);
            // $result = $this->login_database->registration_insert($data);
            // if ($result == TRUE) {
            //     $data['message_display'] = 'Registration Successfully !';
            //     $this->load->view('index', $data);
            // } else {
            //     $data['message_display'] = 'Username already exist!';
            //     $this->load->view('registrationfrom', $data);
            // }
       // }
    
    }

    // Check for user login process
// public function user_login_process() {

//     $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
//     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
    
//         if ($this->form_validation->run() == FALSE) {
//             if(isset($this->session->userdata['logged_in'])){
//                 $this->load->view('admin_page');
//             }else{
//                 $this->load->view('login_form');
//             }
//         } else {
//             $data = array(
//             'username' => $this->input->post('username'),
//             'password' => $this->input->post('password')
//         );
//             $result = $this->login_database->login($data);
//             if ($result == TRUE) {
        
//                 $username = $this->input->post('username');
//                 $result = $this->login_database->read_user_information($username);
//             if ($result != false) {
//                 $session_data = array(
//                 'username' => $result[0]->user_name,
//                 'email' => $result[0]->user_email,
//             );
//                 // Add user data in session
//                 $this->session->set_userdata('logged_in', $session_data);
//                 $this->load->view('admin_page');
//             }
//             } else {
//                 $data = array(
//                 'error_message' => 'Invalid Username or Password'
//             );
//                 $this->load->view('login_form', $data);
//             }
//         }
//     }

}