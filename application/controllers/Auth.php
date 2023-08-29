<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . '/third_party/PHPMailer/PHPMailerAutoload.php';
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }
 
    public function index()
    {
        redirect('auth/login', 'refresh');
        // if ($this->session->userdata('id')) {
        //     // User already logged in redirect to dashboard
        //     redirect('admin/dashboard', 'refresh');
        // } else {
        //     // Not logged in redirect to login page
        // }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === true) {
            // Check if user exists
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $where = array('email' => $email, 'password' => $password);
            $user = $this->general_model->getOne('users', $where);
            
            if ($user) 
            {
                // Update user table last login time
                $update['last_login'] = time();
                $this->general_model->update('users', array('id' => $user->id), $update);
                // Session data
                $session = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'company_name' => $user->company_name,
                    'group_id' => $user->group_id,
                    'lang' => 'en',
                );
                $this->session->set_userdata($session);
                $this->session->set_flashdata('message', array('1', 'Successfully login'));
                if ($user->group_id == 1 || $manager->group_id == 2) 
                {
                    redirect('admin/dashboard', 'refresh');
                }
                else 
                {
                    $this->session->set_flashdata('message', array('0', 'Invalid email or password.'));
                    redirect('auth/login', 'refresh');
                }
            }
            else 
            {
                $this->session->set_flashdata('message', array('0', 'Invalid email or password.'));
                redirect('auth/login', 'refresh');
            }
        }
        $this->data['title'] = 'Login';
        $this->template->auth_render('auth/login', $this->data);
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('company_name', 'company name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[re_password]');
        $this->form_validation->set_rules('re_password', 'Confirm Password', 'required');
        $this->form_validation->set_message('is_unique', 'The %s is already in use');
        $profile = '';
        if (isset($_POST) && !empty($_POST)) {
            if (!empty($_FILES['profile']['name'])) {
                /* Conf Image */
                $file_name = 'profile_' . time() . rand(100, 999);
                $configImg['upload_path'] = './uploads/profile/';
                $configImg['file_name'] = $file_name;
                $configImg['allowed_types'] = 'png|jpg|jpeg';
                $configImg['max_size'] = 2000;
                $configImg['max_width'] = 2000;
                $configImg['max_height'] = 2000;
                $configImg['file_ext_tolower'] = true;
                $configImg['remove_spaces'] = true;

                $this->load->library('upload', $configImg, 'profile');
                if ($this->profile->do_upload('profile')) {
                    $uploadData = $this->profile->data();
                    $profile = 'uploads/profile/' . $uploadData['file_name'];
                } else {
                    $this->custom_errors['profile'] = $this->profile->display_errors('', '');
                }
            }
        }
        $this->form_validation->set_rules('profile', '', 'callback_image_validation');
        if ($this->form_validation->run() === true) {
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $user_data = array(
                'name' => $this->input->post('name'),
                'company_name' => $this->input->post('company_name'),
                'email' => $this->input->post('email'),
                'password' => md5($password),
                'phone' => $this->input->post('phone'),
                'activation_code' => substr(number_format(time() * rand(), 0, '', ''), 0, 6),
                'group_id' => 1,
                'profile_image' => $profile,
                'is_active' => 0,
                'created_on' => time(),
            );

            if ($id = $this->general_model->insert('users', $user_data)) {
                $this->data['name'] = $user_data['name'];
                $this->data['activation_code'] = $user_data['activation_code'];
                $message = $this->load->view('auth/email/activate.tpl.php', $this->data, true);
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('smtp_username');
                $mail->Password = $this->config->item('smtp_password');
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom($this->config->item('sender_email'), $this->config->item('site_title'));
                $mail->addAddress($user_data['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Account activation code';
                $mail->Body = $message;
                // $mail->SMTPDebug = 1;
                if ($mail->send()) {
                    // if there were no errors
                    $this->session->set_flashdata('message', array('1', 'Account activation code is sent to you email.'));
                    redirect("auth/verify_email", 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', 'Something went wrong while sending account activation email.'));
                    redirect("auth/register", 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again.'));
                redirect('auth/register', 'refresh');
            }
        } else {
            $this->data['title'] = 'Signup';
            $this->template->auth_render('auth/register', $this->data);
        }
    }

    public function verify_email()
    {
        $this->form_validation->set_rules('activation_code', 'activation code', 'required');
        if ($this->form_validation->run() === true) {
            $activation_code = $this->input->post('activation_code');
            $user = $this->general_model->getOne('users', array('activation_code' => $activation_code));
            if ($user) {
                $update['is_active'] = 1;
                $this->general_model->update('users', array('id' => $user->id), $update);
                $session = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'company_name' => $user->company_name,
                    'group_id' => $user->group_id,
                    'lang' => 'en',
                );
                $this->session->set_userdata($session);
                redirect('admin/dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('message', array('0', 'Invalid activation code.'));
                redirect('auth/verify_email', 'refresh');
            }
        }
        $this->data['title'] = "Verify Email";
        $this->template->auth_render('auth/verify_email', $this->data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', array('1', 'Successfully logout.'));
        redirect('auth/login', 'refresh');
    }

    public function reset_password($code = null)
    {
        if (!$code) {
            show_404();
        }
        $user = $this->general_model->getOne('users', array('forgotten_code' => $code));
        if ($user) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[re_password]');
            $this->form_validation->set_rules('re_password', 'Confirm Password', 'required');
            if ($this->form_validation->run() === true) {
                $update['password'] = md5($this->input->post('password'));
                $update['forgotten_code'] = null;
                $update['forgotten_time'] = null;
                if ($this->general_model->update('users', array('id' => $user->id), $update)) {
                    $this->session->set_flashdata('message', array('1', 'Password successfully changed.'));
                    redirect('auth/login', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', 'Unable to change password.'));
                    redirect('auth/login', 'refresh');
                }
            }
            $this->data['title'] = "Reset Password";
            $this->data['code'] = $code;
            $this->template->auth_render('auth/reset_password', $this->data);
        } else {
            $this->session->set_flashdata('message', array('0', 'Your reset password link is expired.'));
            redirect('auth/login', 'refresh');
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() === true) {
            $user = $this->general_model->getOne('users', array('email' => $this->input->post('email')));
            if ($user) {
                $forgot['forgotten_code'] = id_crypt($user->id);
                $forgot['forgotten_time'] = time();
                $this->general_model->update('users', array('id' => $user->id), $forgot);

                $this->data['forgotten'] = $forgot['forgotten_code'];
                $this->data['user'] = $user;
                $message = $this->load->view('auth/email/forgot_password.tpl.php', $this->data, true);
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('smtp_username');
                $mail->Password = $this->config->item('smtp_password');
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom($this->config->item('sender_email'), $this->config->item('site_title'));
                $mail->addAddress($user->email);
                $mail->isHTML(true);
                $mail->Subject = 'Forgot Password';
                $mail->Body = $message;
                if ($mail->send()) {
                    $this->session->set_flashdata('message', array('1', 'Forgot password email sent, please check your email.'));
                    redirect('auth/login', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', 'Unable to send email please try again.'));
                    redirect('auth/forgot_password', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', 'Account with email does not exist.'));
                redirect('auth/forgot_password', 'refresh');
            }
        }
        $this->data['title'] = "Forgot Password";
        $this->template->auth_render('auth/forgot_password', $this->data);
    }

    public function image_validation($str)
    {
        #unused $str
        if (isset($this->custom_errors['profile'])) {
            $this->form_validation->set_message('image_validation', $this->custom_errors['profile']);
            return false;
        }
        return true;
    }
}