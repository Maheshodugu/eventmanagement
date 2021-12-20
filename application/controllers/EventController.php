<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EventController extends CI_Controller {


   public $EventModel;


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('EventModel');


      $this->EventModel = new EventModel;
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function index()
   {    

       $data['data'] = $this->EventModel->getEvent();

       $this->load->view('theme/header');       
       $this->load->view('itemCRUD/list',$data);
       $this->load->view('theme/footer');
   }


   /**
    * Show Details this method.
    *
    * @return Response
   */
   public function show($id)
   {
      $item = $this->EventModel->findEvent($id);


      $this->load->view('theme/header');
      $this->load->view('itemCRUD/show',array('item'=>$item));
      $this->load->view('theme/footer');
   }


   /**
    * Create from display on this method.
    *
    * @return Response
   */
   public function create()
   {   
      $this->load->view('theme/header');
      $this->load->view('itemCRUD/create');
      $this->load->view('theme/footer');   
   }


   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('event/create'));
        }else{
           $this->EventModel->insert();
           $this->session->set_flashdata('errors', '');
           redirect(base_url('event'));
        }
    }


   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $item = $this->EventModel->findEvent($id);


       $this->load->view('theme/header');
       $this->load->view('itemCRUD/edit',array('item'=>$item));
       $this->load->view('theme/footer');
   }


   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('event/edit/'.$id),'refresh');
        }else{ 
          $this->EventModel->update($id);
          $this->session->set_flashdata('errors', '');
          redirect(base_url('event'));
        }
   }


   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $item = $this->EventModel->delete($id);
       redirect(base_url('event'));
   }
}