<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Goods extends CI_Controller{
    function index()
    {
        // echo 'Index';
		// $this->_tmp();
		echo 'Index Controller';
		/* all date in database
		$query = $this->db->get('goods');
        // $res = $query->result_array();
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';
		$res = $query->row_array(3);
        echo '<pre>';
        print_r($res);
        echo '</pre>';
		echo $res['title'];
		*/

		/*
		$query = $this->db->query('SELECT title, price FROM tt_goods');
		foreach ($query->result() as $row)
		{
			echo $row->title . ' - ' . $row->price . '<br/>';
		}
		echo 'Total Results: ' . $query->num_rows();
		*/

		// $this->db->where('kind', 'disk');
        // $this->db->where('dlink', 'https://tokarchuk.pro/');
        // $query = $this->db->get('goods');
        // $res = $query->result_array();
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';

		// $this->db->where('good_id', 2);
        // $query = $this->db->get('goods');
        // $res = $query->row();
        // echo '<pre>';
        // echo $res->title;
        // echo '</pre>';


		// $query = $this->db->get('goods');
        // $res = $query->result();
        // foreach ($res as $row)
        // {
        //    echo 'Name - ' . $row->title . '<br>';
        //    echo 'Price -' . $row->price . '<br>';      
        // }



		// $this->db->where('dostavka', 0);
        // $query = $this->db->get('goods');
        // echo $res = $query->num_rows();

		$this->db->where('dostavka', 1);

        $query = $this->db->get('goods');

        if($query->num_rows() > 0){

            echo '<pre>';

            print_r($query->result_array());

            echo '</pre>';

        }

        else {

            echo 'Ничего не найдено!';

        }

		echo $this->db->count_all_results('goods');


    }
    function add()
    {
        // echo 'Add';
		
        $data = array(

            'title' => 'xhtml and html essential training',

            'price' => 85,

            'kind' => 'disk',

            'dlink' => 'https://tokarchuk.pro/',

            'dostavka' => '1'

        );

        $this->db->insert('goods', $data);

        echo 'Add';
		$lid = $this->db->insert_id();

        echo 'Add record with number - ' . $lid;

    }
    function dell()
    {
        // echo 'Dell';
		$this->db->where('good_id', 7);
        $this->db->delete('goods');
        echo 'Delete';
    }
	function _tmp()
    {
        echo ' - but this is tmp function';
    }
	function show_test(){
		$this->load->view('goods/info');
	}
	function show()
    {   
        $data = array(
            'book' => 'Time is money',
            'price' => '200$',
            'quality' => 1000
        );
        $this->load->view('goods/test1', $data);
    }
	function show_mass(){
		$a = array(
            'one' => 1,
            'two' => 2,
            'tree' => 3,
            'four' => 4,
            'five' => 5
        );
        $data = array(
            'array' => $a
        );
		
	}

	function _myshow($page, $title, $data)
    {

        $this->load->view('header', array('title' => 'Add food'));
        $this->load->view('goods/mass', $data);
		$this->load->view('footer');

    }

	function test_get($id, $number = 133)
	{
		echo $number . ' - Тестовое число '; 
	}

	function add_post(){
		if(!empty($_POST)){
            // echo 'Add name: ' . $_POST['name'];
			redirect('../hello');
			echo 'Add name: ' . $this->input->post('name');
        }
        else{
            $this->load->view('form');
        }
	}

	function show_info(){
		$this->load->library('lib_auth');
		echo $this->lib_auth->hello();
	}

	function edit(){
		/*
		$data = array(

            'title' => 'cinema 4d r12 essential training',

            'kind' => 'book'

        );

        $this->db->where('good_id', 1); // Можно тупо не указывать что меняем

        $this->db->update('goods', $data);

        echo 'Record update';
		*/


			$data = array(
	
				'dostavka' => 1
	
			);
	
			$this->db->update('goods', $data);
	
			echo 'Record update';

	}

	function active(){

        $this->db->order_by('price', 'desc');

        $this->db->limit (3, 2);

        echo '<pre>';

        $query = $this->db->get('goods');

        $res = $query->result_array();

        print_r($res);

        echo '</pre>';

    }


}
