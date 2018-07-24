<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
  //    $this->load->model('log_model');
  //    $data['a']=$this->log_model->dept_cont(0);
  //    $data['b'] = $this->log_model->income(4);
  //    $data['c'] = $this->log_model->expenditure(4);
	//  $this->load->view('welcome_message',$data);
$grouped=array(
	'first'=>'aiuoiaiosmiasmioasjiass',
	'second'=>'aiuoiaiosmiasmioasjiass',
	'third'=>'aiuoiaiosmiasmioasjiass',
	'fourth'=>'aiuoiaiosmiasmioasjiass',
	'fifth'=>'aiuoiaiosmiasmioasjiass',
	'sixth'=>'aiuoiaiosmiasmioasjiass',
	'associate'=>'aiuoiaiosmiasmioasjiass',
	'members'=>'aiuoiaiosmiasmioasjiass',
	'men'=>'aiuoiaiosmiasmioasjiass',
	'ladies'=>'aiuoiaiosmiasmioasjiass',
	'board'=>'aiuoiaiosmiasmioasjiass'
);
var_dump($this->maine_model->add_to_device_groups($grouped));

		// var_dump();


}

public function test(){

echo sha1('12345');

}
public function key(){
	$this->load->model('Keygen_model');
	$generator = new Keygen_model;

// Set token length.
$tokenLength = 32;

// Call method to generate random string.
$token = $generator->generate($tokenLength);
echo $token;
}


public function auth(){

$data=$this->input->post();
// set validation rules
// $data=array(
// 'email'=>'betaclifford@gmail.com',
// 	// 'emai'=>'',
// 'password'=>'12345'

// 	);

$this->load->library('form_validation');
$this->load->helper('security');
$this->form_validation->set_data($data);
			$this->form_validation->set_rules('phone', 'phone', 'alpha_dash|min_length[9]|max_length[15]|xss_clean');
			$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|xss_clean');
	        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean' );

	         if($this->form_validation->run()!=false ){

                	$this->load->model('maine_model');
                	echo json_encode($this->maine_model->fast_login($data['email'],$data['password']));

                }else{

			echo validation_errors();


                }




}



}
