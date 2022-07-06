<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculation extends CI_Controller {

    public $error;
    public $result;

	public function index()
	{
      $this->load->view('header');
      $this->load->view('calculator/index');
  		$this->load->view('footer');
	}
  public function Calculator()
  {
    $this->form_validation->set_rules('num1', 'Quantity-1', 'required|numeric');
    $this->form_validation->set_rules('num2', 'Quantity-2', 'required|numeric');

  try {
      if($this->form_validation->run() ==true){

                  if($this->input->post('operator') == "Add"){
                          $this->result = $this->input->post('num1') + $this->input->post('num2');
                  }else if($this->input->post('operator') == "Subtract"){
                          $this->result = $this->input->post('num1') - $this->input->post('num2');
                  }else if($this->input->post('operator') == "Multiply"){
                          $this->result = $this->input->post('num1') * $this->input->post('num2');
                  }else if($this->input->post('operator') == "Divide" &&  $this->input->post('num2') == false){
                            throw new Exception("Can not Divide by Zero");
                  }else if($this->input->post('operator') == "Divide"){
                          $this->result = $this->input->post('num1') / $this->input->post('num2');
                  }

      }else{
              if (form_error('num1') !='') {
                throw new Exception(form_error('num1'));
              }elseif (form_error('num2') !='') {
                throw new Exception(form_error('num2'));
              }
        }
    } catch (Exception $e) {
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
    public function ErrorData()
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array("error" => $this->error)));
    }
    public function ResultData()
    {
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array("result" => $this->result)));
      }

    public function DisplayData()
    {
      $data = $this->Common_model->get_data('tbl_calci')->result();
      echo json_encode($data);
    }
    public function SaveData()
    {
      $array = array('num1'=>$this->input->post('num1'), 'num2'=>$this->input->post('num2'), 'operator'=>$this->input->post('operator'));
      $Doubledata = $this->Common_model->get_Where('tbl_calci',$array);

      if($Doubledata->num_rows() > 0){
          $this->ResultData();
      }else{
        $dataArray = array('num1' => $this->input->post('num1'), 'num2' => $this->input->post('num2'), 'operator' => $this->input->post('operator'), 'result' => $this->input->post('result'));
        if($this->Common_model->insertData('tbl_calci', $dataArray)){
            $this->ResultData();
        }
      }
    }
  }
