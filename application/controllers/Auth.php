<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
        $this->load->helper(array('url','download'));
    }
    public function index()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Diskusi, Berkarya, Dan Berkontribusi";
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $data['kontak'] =  $this->Madmin->get_data('kontak')->result();
        $data['sosmed'] =  $this->Madmin->get_data('sosmed')->result();
        $this->load->view('auth/index', $data);
    }

    public function profile()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Profil";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/profile');
        $this->load->view('frontend/auth_footer');
    }

    public function profile_management()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Profil Kepengurusan";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/profile_management');
        $this->load->view('frontend/auth_footer');
    }

    public function gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri";
        $data['galeri'] = $this->Madmin->get_data('galeri')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/gallery', $data);
        $this->load->view('frontend/auth_footer');
    }

    public function full_gallery(){
        $data['title'] =  "Komunitas Programmer Millenial | Galeri";
        $data['galeri'] = $this->Madmin->get_data('galeri')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/full_gallery', $data);
        $this->load->view('frontend/auth_footer');
    }

    public function all_gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri Kegiatan Kelompok";
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/all_gallery',$data);
        $this->load->view('frontend/auth_footer');
    }
    public function individu_gallery()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Galeri Kegiatan Individu";
        $data['kegiatan'] = $this->Madmin->get_data('kegiatan')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/individu_gallery',$data);
        $this->load->view('frontend/auth_footer');
    }

    public function activity()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Jenis Kegiatan Kami";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/activity');
        $this->load->view('frontend/auth_footer');
    }

    public function news()
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('auth/news');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Madmin->get_published_count('berita');
        $config['per_page'] = 3;

        $this->pagination->initialize($config);
        $limit = $config['per_page'];
        $offset = $this->input->get('per_page') ? (int) $this->input->get('per_page') : 0;

        $data['articles'] = $this->Madmin->get_published($limit, $offset, 'berita');
        $data['title'] = "Komunitas Programmer Millenial | Berita";
        $data['berita'] = $this->Madmin->get_data('berita')->result();

        if (count($data['articles']) > 0) {
            $this->load->view('frontend/auth_header', $data);
            $this->load->view('auth/news', $data,$offset);
            $this->load->view('frontend/auth_footer');
        } else {
            
        }
    }

    public function lakukan_download($file_path){	
        $lokasi = './cv/' . $file_path;			
        force_download($lokasi, NULL);
    }
    

    public function detail_news($id){
        $where = array(
            'Id_berita' => $id
        );
        $data['title'] = "Komunitas Programmer Millenial | Berita";
        $data['berita'] = $this->Madmin->edit_data($where,'berita')->result();
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/detail_news', $data);
        $this->load->view('frontend/auth_footer');
    }
    public function contact()
    {
        $data['title'] =  "Komunitas Programmer Millenial | Kontak";
        $this->load->view('frontend/auth_header', $data);
        $this->load->view('auth/contact');
        $this->load->view('frontend/auth_footer');
    }

    public function send(){
        
            
        $mail = new PHPMailer(true); // Menggunakan konstruktor dengan parameter true untuk mengaktifkan penanganan pengecualian

        $nama = $this->input->post('nama');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $pesan = $this->input->post('message');
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "programmerkomunitas@gmail.com";
        $mail->Password = "kwajwsskqfbsocwk";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        
        $mail->setFrom($email, $nama);
        $mail->addAddress('programmerkomunitas@gmail.com');
        
        // $mail->addReplyTo('programmerkomunitas@gmail.com');
        
        $mail->isHTML(true);
        $mail->Subject = 'Pesan dari website';
        $mail->Body = $pesan;
        
        try {
            $mail->send();
            echo "Berhasil";
        } catch (Exception $e) {
            echo "Gagal: " . $mail->ErrorInfo;
        }
        
        } 
}
