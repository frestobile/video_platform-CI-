<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->load->model('GlobalModel');
        $this->load->helper('url');

        $baseurl = $this->GlobalModel->get_baseurl();
        redirect($baseurl."/company/login", 'refresh');
	}

	public function company_login() {
        $this->load->model('GlobalModel');
        $this->load->helper('url');
        $baseurl = $this->GlobalModel->get_baseurl();

        $companyInfo = $this->getCompanyInfo();

        if (!isset($companyInfo['company_id'])) {
            session_destroy();
            $this->load->view('front/signin');
        }else{
            $company_id = $companyInfo['company_id'];
            redirect($baseurl."/manager/go_videos?id=".$company_id."" , 'refresh');
        }
    }

    public function videos($param = null){
        $this->load->model('front/VideoModel');
        $this->load->model('front/CompanyModel');
        $this->load->model('front/CustomerModel');
        if (isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }else{
            $lang = 'en';
        }
        $data['head_lang'] = $lang;

        $this->lang->load('content',$lang);
        $data['footer'] = $this->lang->line('footer');
        $data['preview'] = $this->lang->line('preview');

	    if ($param){
	        $row = $this->VideoModel->is_video_exist($param);

	        if (!empty($row)){
	            $company_data = $this->CompanyModel->get_by_id($row['video_company_id']);
	            $customer_data = $this->CustomerModel->get_by_id($row['video_customer_id']);

	            $data['video_data'] = $row;
	            $data['company_data'] = $company_data;
	            $data['customer_data'] = $customer_data;

                $this->load->view('front/videoView', $data);
            }else{
	            $data['status'] = 'fail';
	            $data['video_data'] = $param;
                $this->load->view('errors/pagenotfound', $data);
            }
        }else{
	        $this->index();
        }
    }

    public function forgotPassword(){
        $this->load->model('front/CompanyModel');
        $this->load->config('email');
        $email = $this->input->post('email');
        $findemail = $this->CompanyModel->ForgotPassword($email);
        if($findemail){
            $result =  $this->CompanyModel->sendpassword($findemail);
            if ($result['status'] == 'success'){
                $password = $result['password'];
                $mail_message='Thanks for contacting regarding to forgot password,<br> Your new <b>Password</b> is <b>'.$password.'</b>'."\r\n";
                $mail_message.='<br>Please Update your password.';
                $mail_message.='<br>Thanks & Regards';
                $mail_message.='<br>VIService System Support';
                date_default_timezone_set('Etc/UTC');

                $mail = new PHPMailer(true);

                try{
                    $mail->SMTPDebug = 2; // Enable verbose debug output
                    $mail->isSMTP(); // Set mailer to use SMTP
                      // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true; // Enable SMTP authentication
                    $mail->Username   = $this->config->item('Username'); // SMTP username
                    $mail->Password   = $this->config->item('Password');
                    $mail->Host       = 'tls://smtp.gmail.com:587';
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    //Recipients
                    $mail->setFrom($this->config->item('Username'), 'Mailer');
                    $mail->addAddress($email, 'Support'); // Add a recipient
                    $mail->addReplyTo($this->config->item('Username'), 'VIService Support');

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = $mail_message;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                }catch (Exception $e){
                    $data['state'] = $mail->ErrorInfo;
                }

            }else{
                $data['state'] = 'NO';
            }
        }else{
            $data['state'] = 'NO';
        }
        echo json_encode($data);
    }

    function getIP() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        }elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        }elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        }elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        }else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
