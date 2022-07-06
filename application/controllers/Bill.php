<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

  public $error;
  public $bill;

	public function index()
	{
      $this->load->view('header');
      $this->load->view('bill/index');
  		$this->load->view('footer');
	}
  public function Bill_Generate()
  {
    $fifty = 4.50;
    $hundred = 5.00;
    $two_hundred = 6.20;
    $two_hundred_fifty = 7.50;

    $this->form_validation->set_rules('units', 'Units', 'required|numeric');

      try{

        if($this->form_validation->run() ==true){


                    if ($this->input->post('units') >= 0){

                        if ($this->input->post('units') <= 50){

                            $this->bill = $this->input->post('units') * $fifty;

                        }else if ($this->input->post('units') > 50 && $this->input->post('units') <= 100){

                            $x = 50 * $fifty;
                            $post_fifty = $this->input->post('units') - 50;
                            $this->bill = $x + ($post_fifty * $hundred);

                        }else if ($this->input->post('units') > 100 && $this->input->post('units') <= 200){

                            $x = (50 * $fifty) + (100 * $hundred);
                            $post_hundred_fifty = $this->input->post('units') - 150;
                            $this->bill = $x + ($post_hundred_fifty * $two_hundred);
                        }else{

                            $x = (50 * $fifty) + (100 * $hundred) + (100 * $two_hundred_fifty);
                            $post_two_hundred_fifty = $this->input->post('units') - 150;
                            $this->bill = $x + ($post_two_hundred_fifty * $two_hundred_fifty);
                        }
                    }else{
                        throw new Exception("Please Enter valid units");
                    }
      }else{
        if (form_error('units') !='') {
          throw new Exception(form_error('units'));
        }
      }
    }
    catch(Exception $e){
        $this->error = $e->getMessage();
    }
      if($this->GetError()){
        $this->ErrorData();
      }else{
            $this->SaveData();
      }
    }
    public function GetError()
    {
        return $this->error;
    }
    public function ErrorData(){
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array("error" => $this->error)));
        }
    public function ResultData(){

      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array("bill" => $this->bill)));
      }

    public function DisplayData()
    {
      $data = $this->Common_model->get_data('tbl_bills')->result();
      echo json_encode($data);

    }
    public function SaveData()
    {
      $array = array('units' => $this->input->post('units'));
      $Doubledata = $this->Common_model->get_Where('tbl_bills',$array);

      if($Doubledata->num_rows() > 0){
          $this->ResultData();
      }else{
        $dataArray = array('units' => $this->input->post('units'));
        if($this->Common_model->insertData('tbl_bills', $dataArray)){
            $this->ResultData();
        }
      }
    }
  }
