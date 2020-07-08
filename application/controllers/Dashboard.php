<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('home_model');
        $this->load->model('Grocery_crud_model');
        $this->load->library('grocery_CRUD');
    }

	// public function index()
	// {
	// 	$this->load->view('static/head');
	// 	$this->load->view('static/sidebar');
	// 	$this->load->view('static/nav');
	// 	$this->load->view('dashboard/index');
	// 	$this->load->view('static/footer');
	// }


	public function index()
    {
        if($this->admin->logged_id())
        {
        	$data['username'] = $this->session->userdata('user_name');

            $this->load->view('static/head');
			$this->load->view('static/sidebar',$data);
			$this->load->view('static/nav');
			$this->load->view('dashboard/index');
			$this->load->view('static/footer');

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    public function rencana(){
        if($this->admin->logged_id())
        {
        	$data['username'] = $this->session->userdata('user_name');
        	$username = $this->session->userdata('user_name');

            $crud = new grocery_CRUD();
            $crud->set_table('rencana');
            $crud->set_theme('datatables');

			// $crud->unset_add_fields('username','tanggal');
			$crud->field_type('username', 'hidden', '');
			$crud->field_type('tanggal', 'hidden', '');
			$crud->callback_add_field('username',function () {
	        	$username = $this->session->userdata('user_name');
		        return '<input type="text" maxlength="50" value="'.$username.'" name="username" hidden>';
		    });
		    $crud->callback_add_field('tanggal',function () {
		        return '<input type="text" maxlength="50" value="'.date("Y-m-d H:i:s").'" name="tanggal" hidden>';
		    });
			$crud->where('username',$username);
			$crud->order_by('tanggal','desc');
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_clone();
            $output = $crud->render();      

            $this->load->view('static/head');
			$this->load->view('static/sidebar',$data);
			$this->load->view('static/nav');
        	$this->load->view('crud',$output);
            $this->load->view('static/footer');

        }else{
            redirect("login");
        }
    }

    public function laporan(){
        if($this->admin->logged_id())
        {
        	$data['username'] = $this->session->userdata('user_name');
        	$username = $this->session->userdata('user_name');

            $crud = new grocery_CRUD();
            $crud->set_table('laporan');
            $crud->set_theme('datatables');

			$crud->field_type('username', 'hidden', '');
			$crud->field_type('tanggal', 'hidden', '');
			$crud->callback_add_field('username',function () {
	        	$username = $this->session->userdata('user_name');
		        return '<input type="text" maxlength="50" value="'.$username.'" name="username" hidden>';
		    });
		    $crud->callback_add_field('tanggal',function () {
		        return '<input type="text" maxlength="50" value="'.date("Y-m-d H:i:s").'" name="tanggal" hidden>';
		    });
			$crud->where('username',$username);
			$crud->order_by('tanggal','desc');
			$crud->set_field_upload('img1','assets/uploads/laporan');
			$crud->set_field_upload('img2','assets/uploads/laporan');
			$crud->set_field_upload('img3','assets/uploads/laporan');
			$crud->set_field_upload('img4','assets/uploads/laporan');
			$crud->set_field_upload('img5','assets/uploads/laporan');

			$crud->display_as('img1','Gambar 1');
			$crud->display_as('img2','Gambar 2');
			$crud->display_as('img3','Gambar 3');
			$crud->display_as('img4','Gambar 4');
			$crud->display_as('img5','Gambar 5');

			$crud->columns('username','img1','keterangan','tanggal');
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_clone();

            $output = $crud->render();      

            $this->load->view('static/head');
			$this->load->view('static/sidebar',$data);
			$this->load->view('static/nav');
        	$this->load->view('crud',$output);
            $this->load->view('static/footer');

        }else{
            redirect("login");
        }
    }

    public function rekap()
    {
        if($this->admin->logged_id())
        {
        	$data['username'] = $this->session->userdata('user_name');
        	$data['rekap'] = $this->home_model->tampil_data();

            $this->load->view('static/head');
			$this->load->view('static/sidebar',$data);
			$this->load->view('static/nav');
			$this->load->view('dashboard/index');
			$this->load->view('static/footer');

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
