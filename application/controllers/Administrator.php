<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library(array('session'));
    //$this->load->library('email');
    $this->load->helper(array('url'));
        $this->load->model('M_login','m_login');
        $this->load->library('upload');
        $this->load->model('M_pengguna','m_pengguna');


    }
    function index(){
        if($this->session->userdata('masuk')==true){
            redirect('admin/pengguna');
        }
        $this->load->view('admin/v_sign');
        
    }
    function auth(){

      //$this->form_validation->set_rules('username','Email','required|htmlspecialchars|trim|valid_emails');

        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['pengguna_level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['pengguna_id'];
            $user_nama=$xcadmin['pengguna_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);

         if($xcadmin['pengguna_level']=='2'){
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['pengguna_id'];
             $user_nama=$xcadmin['pengguna_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
         } 

    if($xcadmin['pengguna_level']=='3'){
             $this->session->set_userdata('akses','3');
             $idadmin=$xcadmin['pengguna_id'];
             $user_nama=$xcadmin['pengguna_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
         } 
        }
        
        if($this->session->userdata('masuk')==true){
            redirect('administrator/berhasillogin');
        }else{
            redirect('administrator/gagallogin');
        }
    }
    
        function berhasillogin(){
            //redirect('pageconfig');
      redirect('admin/dashboard');
        }
        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button> Username/Password salah Atau Email belum diaktivasi</div>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
        }
        
        public function password_check($str)
    {
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       return FALSE;
    }

        function register(){
        if($this->session->userdata('masuk')==true){
            redirect('admin/pengguna');
        }
        $this->load->view('admin/v_register');    
        }
    
        function registration()
      {
      if($this->session->userdata('masuk')==true){
            redirect('admin/pengguna');
        }
      
      $this->form_validation->set_rules('user','Jenis User', 'required');
      $this->form_validation->set_rules('name','Nama Lengkap', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('ikm','Nama Perusahaan/IKM', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('email','Email','required|htmlspecialchars|trim|valid_emails|is_unique[pengguna.pengguna_email]');
      $this->form_validation->set_rules('nohp','Nohp','required|trim|htmlspecialchars|numeric|is_unique[pengguna.pengguna_nohp]');
      $this->form_validation->set_rules('password1','Kata Sandi', 'required|htmlspecialchars|trim|min_length[6]|matches[password2]|password_check',['matches' => 'Kata Sandi tidak sama','min_length' => 'Kata Sandi Minimal 6 Karakter','password_check' => 'Gunakan Kombinasi Huruf dan Angka']);
      $this->form_validation->set_rules('password2','Kata Sandi', 'required|htmlspecialchars|trim|matches[password1]');
      
      if ( $this->form_validation->run() == false)
      {
      $data['judul'] = 'Registration';
        //$data['nama'] = $nama;
       // $this->load->view('templates/headerlogin', $data);
        $this->load->view('admin/v_regform', $data);
        //$this->load->view('templates/footerlogin');
      } else {
        
          $tanggal = date("Y-m-d h:i:sa");
          $email = $this->input->post('email',true);
          $nama = $this->input->post('name',true);
        
          $config['upload_path']          = './assets/images/user/';
          $config['allowed_types']        = 'pdf';
          $config['max_size']             = 2000000;
          $config['file_name']    = $nama.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
          $config['encrypt_name']     = FALSE;
          $this->load->library('upload', $config);
          if ( ! $this->upload->do_upload('pegguna_surtug'))
          {
              $error = array('error' => $this->upload->display_errors());
              $this->load->view('admin/v_regform', $error);
          }
          else
          {

          $data = [
        
         'pengguna_jenis' => htmlspecialchars($this->input->post('user',TRUE)),
         'pengguna_nama' => htmlspecialchars($this->input->post('name',TRUE)),
         'pengguna_ikm' => htmlspecialchars($this->input->post('ikm',TRUE)),
         'pengguna_nohp' => htmlspecialchars($this->input->post('nohp',TRUE)),
         'pengguna_email' => htmlspecialchars($email),
         'pengguna_photo' => 'users.jpg',
         'pengguna_username' => htmlspecialchars($this->input->post('name',TRUE)),
         'pengguna_password' => md5($this->input->post('password1')),
         'pegguna_surtug' => $this->upload->data("file_name"),
         // 'pengguna_surtug' => $this->upload_file_pdf("pengguna_surtug"),
         'pengguna_level' => 3,
         'is_active' => 0,
         'date_create' => $tanggal
     ];
     
     $token = base64_encode(random_bytes(32));
     $user_token = [
         'email' => $email,
         'token' => $token,
         'date_created' => time()
     ];
     
     $this->db->insert('pengguna', $data);
     $this->db->insert('user_token', $user_token);
     
     $this->_sendEmail($token, 'verify');
    
     $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
         User berhasil ditambah, segera cek email anda untuk aktivasi user</div>');
     redirect('administrator');
      }
  
    
  }   
  }

    function registration_new(){
       if($this->session->userdata('masuk')==true){
            redirect('admin/pengguna');
        }
      
      $this->form_validation->set_rules('user','Jenis User', 'required');
      $this->form_validation->set_rules('name','Nama Lengkap', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('ikm','Nama Perusahaan/IKM', 'required|htmlspecialchars|trim|alpha_numeric_spaces');
      $this->form_validation->set_rules('email','Email','required|htmlspecialchars|trim|valid_emails|is_unique[pengguna.pengguna_email]');
      $this->form_validation->set_rules('nohp','Nohp','required|trim|htmlspecialchars|numeric|is_unique[pengguna.pengguna_nohp]');
      $this->form_validation->set_rules('password1','Kata Sandi', 'required|htmlspecialchars|trim|min_length[6]|matches[password2]|password_check',['matches' => 'Kata Sandi tidak sama','min_length' => 'Kata Sandi Minimal 6 Karakter','password_check' => 'Gunakan Kombinasi Huruf dan Angka']);
      $this->form_validation->set_rules('password2','Kata Sandi', 'required|htmlspecialchars|trim|matches[password1]');
      
      if ( $this->form_validation->run() == false)
      {
      $data['judul'] = 'Registration';
        //$data['nama'] = $nama;
       // $this->load->view('templates/headerlogin', $data);
        $this->load->view('admin/v_regform', $data);
        //$this->load->view('templates/footerlogin');
      } else {

          $tanggal = date("Y-m-d h:i:sa");
          $email = $this->input->post('email',true);
          $nama = $this->input->post('name',true);
        
          $config['upload_path']          = './assets/images/user/';
          $config['allowed_types']        = 'pdf';
          $config['max_size']             = 2000000;
          $config['file_name']    = $nama.'-'.substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);

        $this->upload->initialize($config);
        if(!empty($_FILES['pegguna_surtug']['name']))
        {
            if ($this->upload->do_upload('pegguna_surtug'))
            {
                $gbr = $this->upload->data();
                $pegguna_surtug=$gbr['file_name'];
                $pengguna_jenis=$this->input->post('user');
                $pengguna_nama=strip_tags(htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES));
                $pengguna_ikm=strip_tags(htmlspecialchars($this->input->post('ikm',TRUE),ENT_QUOTES));
                $pengguna_nohp=strip_tags(htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES));
                $pengguna_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $pengguna_photo='users.jpg';
                $pengguna_password=md5($this->input->post('password1'));
                $pengguna_level=3;
                $is_active=0;
                $date_create=$tanggal;

                $this->m_pengguna->simpan_pengguna_file($pegguna_surtug,$pengguna_jenis,$pengguna_nama,$pengguna_email,$pengguna_ikm,$pengguna_nohp,$pengguna_photo,$pengguna_level,$is_active,$date_create,$pengguna_password);
              
               $token = base64_encode(random_bytes(32));
              
               $user_token = [
                   'email' => $email,
                   'token' => $token,
                   'date_created' => time()
               ];
               
               //$this->db->insert('pengguna', $data);
               $this->db->insert('user_token', $user_token);
               
               $this->_sendEmail($token, 'verify');
              
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                   User berhasil ditambah, segera cek email anda untuk aktivasi user</div>');
               redirect('administrator');
                // echo $this->session->set_flashdata('msg','success');
                
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('administrator');
            }
                     
        }else{
                $pengguna_jenis=$this->input->post('user');
                $pengguna_nama=strip_tags(htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES));
                $pengguna_ikm=strip_tags(htmlspecialchars($this->input->post('ikm',TRUE),ENT_QUOTES));
                $pengguna_nohp=strip_tags(htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES));
                $pengguna_email=strip_tags(htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES));
                $pengguna_photo='users.jpg';
                $pengguna_password=md5($this->input->post('password1'));
                $pengguna_level=3;
                $is_active=0;
                $date_create=$tanggal;

                $this->m_pengguna->simpan_pengguna_no_file($pengguna_jenis,$pengguna_nama,$pengguna_email,$pengguna_ikm,$pengguna_nohp,$pengguna_photo,$pengguna_level,$is_active,$date_create,$pengguna_password);
              
               $token = base64_encode(random_bytes(32));
              
               $user_token = [
                   'email' => $email,
                   'token' => $token,
                   'date_created' => time()
               ];
               
               //$this->db->insert('pengguna', $data);
               $this->db->insert('user_token', $user_token);
               
               $this->_sendEmail($token, 'verify');
              
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                   User berhasil ditambah, segera cek email anda untuk aktivasi user</div>');
               redirect('administrator');
        }
        }
    }
  
    private function _sendEmail($token, $type)
    {
      
      $config = array(
          'protocol'  => 'smtp',
           'smtp_host' => 'smtp.gmail.com',
          'smtp_port'   => 465,
          'smtp_user' => 'ferrykamtis.8@gmail.com',  // Email gmail
          'smtp_pass'   => 'mlytawenexepksac',  // Password gmail
          'smtp_crypto' => 'ssl',
          'mailtype'  => 'html'
        
          
        );       
   
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");

  
    $this->email->from('ferrykamtis.8@gmail.com', 'Layanan KI');
    $this->email->to($this->input->post('email'));
      
      if ($type == 'verify') {
          $this->email->set_header('Content-Type', 'text/html');
          $this->email->subject('Aktivasi Akun Klinik Kekayaan Intelektual');
          $message = '
     <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

      .primary{
  background: #17bebb;
}
.bg_white{
  background: #ffffff;
}
.bg_light{
  background: #f7fafa;
}
.bg_black{
  background: #000000;
}
.bg_dark{
  background: rgba(0,0,0,.8);
}
.email-section{
  padding:2.5em;
}

/*BUTTON*/
.btn{
  padding: 10px 15px;
  display: inline-block;
}
.btn.btn-primary{
  border-radius: 5px;
  background: #17bebb;
  color: #ffffff;
}
.btn.btn-white{
  border-radius: 5px;
  background: #ffffff;
  color: #000000;
}
.btn.btn-white-outline{
  border-radius: 5px;
  background: transparent;
  border: 1px solid #fff;
  color: #fff;
}
.btn.btn-black-outline{
  border-radius: 0px;
  background: transparent;
  border: 2px solid #000;
  color: #000;
  font-weight: 700;
}
.btn-custom{
  color: rgba(0,0,0,.3);
  text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
  font-family: "Poppins", sans-serif;
  color: #000000;
  margin-top: 0;
  font-weight: 400;
}

body{
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-size: 15px;
  line-height: 1.8;
  color: rgba(0,0,0,.4);
}

a{
  color: #17bebb;
}

table{
}
/*LOGO*/

.logo h1{
  margin: 0;
}
.logo h1 a{
  color: #17bebb;
  font-size: 24px;
  font-weight: 700;
  font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
  position: relative;
  z-index: 0;
}

.hero .text{
  color: rgba(0,0,0,.3);
}
.hero .text h2{
  color: #000;
  font-size: 34px;
  margin-bottom: 0;
  font-weight: 200;
  line-height: 1.4;
}
.hero .text h3{
  font-size: 24px;
  font-weight: 300;
}
.hero .text h2 span{
  font-weight: 600;
  color: #000;
}

.text-author{
  bordeR: 1px solid rgba(0,0,0,.05);
  max-width: 50%;
  margin: 0 auto;
  padding: 2em;
}
.text-author img{
  border-radius: 50%;
  padding-bottom: 20px;
}
.text-author h3{
  margin-bottom: 0;
}
ul.social{
  padding: 0;
}
ul.social li{
  display: inline-block;
  margin-right: 10px;
}

/*FOOTER*/

.footer{
  border-top: 1px solid rgba(0,0,0,.05);
  color: rgba(0,0,0,.5);
}
.footer .heading{
  color: #000;
  font-size: 20px;
}
.footer ul{
  margin: 0;
  padding: 0;
}
.footer ul li{
  list-style: none;
  margin-bottom: 10px;
}
.footer ul li a{
  color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
  <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
      <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td class="logo" style="text-align: center;">
                  <h1><a href="#">Aktivasi Akun Klinik Kekayaan Intelektual</a></h1>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end tr -->
        <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                  <div class="text">
                    <h3>Yth. Bapak/Ibu, Pendaftaran Anda telah berhasil. Untuk mengaktifkan akun Anda, silahkan klik tombol di bawah ini .</h3>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="text-align: center;">
                  <div class="text-author">
                    <img src="images/person_2.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin: auto; display: block;">
                    <!-- <h3 class="name">Ronald Tuff</h3>-->
                    <!-- <span class="position">CEO, Founder at e-Verify</span> -->
                    <p><a class="btn btn-primary" href="' . base_url() . 'administrator/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan Akun Saya</a></p>
                    <p>Jika Anda menemukan email kami pada Spam, silahkan klik tombol "Not Spam" untuk membuat email dari kami tidak masuk ke folder Spam</p>
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="heading">Klinik Kekayaan Intelektual</h3>
                        <p>
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: klinikki.kemenperin.go.id</p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
        $this->email->message($message);
          // $this->email->message('Klik Link berikut untuk aktivasi User Email : <a href="' . base_url() . 'administrator/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
    } else if($type == 'forgot') {
        $this->email->set_header('Content-Type', 'text/html');
        $this->email->subject('Reset Password');
$message = '
     <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesnt work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size youd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}


    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

      .primary{
  background: #17bebb;
}
.bg_white{
  background: #ffffff;
}
.bg_light{
  background: #f7fafa;
}
.bg_black{
  background: #000000;
}
.bg_dark{
  background: rgba(0,0,0,.8);
}
.email-section{
  padding:2.5em;
}

/*BUTTON*/
.btn{
  padding: 10px 15px;
  display: inline-block;
}
.btn.btn-primary{
  border-radius: 5px;
  background: #17bebb;
  color: #ffffff;
}
.btn.btn-white{
  border-radius: 5px;
  background: #ffffff;
  color: #000000;
}
.btn.btn-white-outline{
  border-radius: 5px;
  background: transparent;
  border: 1px solid #fff;
  color: #fff;
}
.btn.btn-black-outline{
  border-radius: 0px;
  background: transparent;
  border: 2px solid #000;
  color: #000;
  font-weight: 700;
}
.btn-custom{
  color: rgba(0,0,0,.3);
  text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
  font-family: "Poppins", sans-serif;
  color: #000000;
  margin-top: 0;
  font-weight: 400;
}

body{
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-size: 15px;
  line-height: 1.8;
  color: rgba(0,0,0,.4);
}

a{
  color: #17bebb;
}

table{
}
/*LOGO*/

.logo h1{
  margin: 0;
}
.logo h1 a{
  color: #17bebb;
  font-size: 24px;
  font-weight: 700;
  font-family: "Poppins", sans-serif;
}

/*HERO*/
.hero{
  position: relative;
  z-index: 0;
}

.hero .text{
  color: rgba(0,0,0,.3);
}
.hero .text h2{
  color: #000;
  font-size: 34px;
  margin-bottom: 0;
  font-weight: 200;
  line-height: 1.4;
}
.hero .text h3{
  font-size: 24px;
  font-weight: 300;
}
.hero .text h2 span{
  font-weight: 600;
  color: #000;
}

.text-author{
  bordeR: 1px solid rgba(0,0,0,.05);
  max-width: 50%;
  margin: 0 auto;
  padding: 2em;
}
.text-author img{
  border-radius: 50%;
  padding-bottom: 20px;
}
.text-author h3{
  margin-bottom: 0;
}
ul.social{
  padding: 0;
}
ul.social li{
  display: inline-block;
  margin-right: 10px;
}

/*FOOTER*/

.footer{
  border-top: 1px solid rgba(0,0,0,.05);
  color: rgba(0,0,0,.5);
}
.footer .heading{
  color: #000;
  font-size: 20px;
}
.footer ul{
  margin: 0;
  padding: 0;
}
.footer ul li{
  list-style: none;
  margin-bottom: 10px;
}
.footer ul li a{
  color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
  <center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
      <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td class="logo" style="text-align: center;">
                  <h1><a href="#">Reset Password</a></h1>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end tr -->
        <tr>
          <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                  <div class="text">
                    <h3>Yth. Bapak/Ibu, Untuk melakukan reset password, silahkan klik tombol di bawah ini.</h3>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="text-align: center;">
                  <div class="text-author">
                    <img src="images/person_2.jpg" alt="" style="width: 100px; max-width: 600px; height: auto; margin: auto; display: block;">
                    <!-- <h3 class="name">Ronald Tuff</h3>-->
                    <span class="position">Tombol reset</span>
                    <p><a href="' . base_url() . 'administrator/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" class="btn btn-primary">Reset Password</a></p>
                    <p></p>
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="middle" class="bg_light footer email-section">
            <table>
              <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                        <h3 class="heading">Klinik Kekayaan Intelektual</h3>
                        <p>
Direktorat Jenderal Industri Kecil, Menengah dan Aneka Kementerian Perindustrian <br>
Alamat: Jl. Jend. Gatot Subroto Kav. 52-53 Lantai 15, Jakarta Selatan 12950<br>
Contact Person dan Whatsapp : 082312901430<br>
No. Tlp : 021 - 5255509 ext. 2168<br>
Email: klinik.hkiikm@gmail.com<br>
Website: klinikki.kemenperin.go.id</p>
                      </td>
                    </tr>
                  </table>
                </td>
              
        </tr><!-- end: tr -->
        
      </table>

    </div>
  </center>
</body>
</html>';
        $this->email->message($message);
          
          //$this->email->message('Klik Link berikut untuk mereset Password Anda : <a href="' . base_url() . 'administrator/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }
   
        
    if ($this->email->send()) {
        return true;
    } else {
        echo $this->email->print_debugger();
        die;
    } 
  }
  
  public function forgotPassword()
  {
       $this->form_validation->set_rules('email','Email','required|htmlspecialchars|trim|valid_emails');
       
       if($this->form_validation->run() == false) {
       $data['judul'] = 'Forgot Password';
         $this->load->view('admin/v_reset', $data);
       } else {
           $email = $this->input->post('email');
           $user = $this->db->get_where('pengguna', ['pengguna_email' => $email, 'is_active' => 1])->row_array();
           
           if($user) {
               $token = base64_encode(random_bytes(32));
               $user_token = [
                   'email' => $email,
                   'token' => $token,
                   'date_created' => time()
                   ];
               
               $this->db->insert('user_token', $user_token);
               $this->_sendEmail($token, 'forgot');
               
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">
                 Please check your email to reset your password!</div>');
             redirect('administrator/forgotpassword');  
             
           } else {
              $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
                Email Belum Terdaftar atau Belum diaktivasi!</div>');
            redirect('administrator/forgotpassword'); 
             }
       }
  }

  function verify()
  {
      if($this->session->userdata('masuk')==true){
            redirect('admin/pengguna');
        }
        
      $email = $this->input->get('email');
      $token = $this->input->get('token');
      
      $user = $this->db->get_where('pengguna', ['pengguna_email' => $email])->row_array();
      
      if ($user) {
          $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
          
          if($user_token) { 
              
             if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                 
               $this->db->set('is_active', 1);
               $this->db->where('pengguna_email', $email);
               $this->db->update('pengguna');
               
               $this->db->delete('user_token', ['email' => $email]);
               
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>'. $email .' telah diaktivasi, silahkan login</div>');
               redirect('administrator');  
                 
             } else {
               
               $this->db->delete('pengguna', ['pengguna_email' => $email]);
               $this->db->delete('user_token', ['pengguna_email' => $email]);
               
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                 Account Activation Failed! Token Expired.</div>');
               redirect('administrator');  
             }
              
          } else {
               $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                 Account Activation Failed! Wrong Token.</div>');
               redirect('administrator');
          }
      } else {
           $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
             Account Activation Failed! Wrong Email.</div>');
         redirect('administrator');
      }
  }



  public function resetPassword()
  {
      $email = $this->input->get('email');
      $token = $this->input->get('token');
      
      $user = $this->db->get_where('pengguna', ['pengguna_email' => $email])->row_array();
      
      if($user) {
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
        
        if($user_token) {
            $this->session->set_userdata('reset_email', $email);
            $this->changePassword();
        } else {
        $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
          Reset Password Failed, Wrong Token!</div>');
          redirect('auth/forgotpassword');     
        }
      } else {
        $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
          Reset Password Failed, Wrong Email!</div>');
          redirect('auth/forgotpassword'); 
      }
  }
  
  public function changePassword()
  {
      if(!$this->session->userdata('reset_email')) {
          redirect('administrator');
      }
      
      $this->form_validation->set_rules('password1','Kata Sandi', 'required|htmlspecialchars|trim|min_length[6]|matches[password2]|password_check',['matches' => 'Kata Sandi tidak sama','min_length' => 'Kata Sandi Minimal 6 Karakter','password_check' => 'Gunakan Kombinasi Huruf dan Angka']);
      $this->form_validation->set_rules('password2','Kata Sandi', 'required|htmlspecialchars|trim|matches[password1]');

      if($this->form_validation->run() == false) {
      $data['judul'] = 'Change Password';
        $this->load->view('admin/v_changepass', $data);
      } else {
          //$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
          $password = md5($this->input->post('password1'));
          
          $email = $this->session->userdata('reset_email');
          
          $this->db->set('pengguna_password', $password);
          $this->db->where('pengguna_email', $email);
          $this->db->update('pengguna');
          
          $this->session->unset_userdata('reset_email');
          
          echo $this->session->set_flashdata('msg','berhasil');
          $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
            Kata Sandi berhasil diganti!</div>');
            redirect('administrator'); 
      }
  }
}