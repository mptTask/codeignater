<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Goods extends CI_Controller{
    function index()
    {
        echo 'Index';
		$this->_tmp();
    }
    function add()
    {
        echo 'Add';
    }
    function dell()
    {
        echo 'Dell';
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
}
