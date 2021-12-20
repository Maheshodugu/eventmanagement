<?php
class EventModel extends CI_Model{


    public function getEvent(){
        if(!empty($this->input->get("search"))){
          $this->db->like('title', $this->input->get("search"));
          $this->db->or_like('description', $this->input->get("search")); 
        }
        $query = $this->db->get("events");
        return $query->result();
    }


    public function insert()
    {    
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'event_date' => $this->input->post('event_date'),
            'location' => $this->input->post('location')
        );
        return $this->db->insert('events', $data);
    }


    public function update($id) 
    {
        $data=array(
            'name' => $this->input->post('name'),
            'description'=> $this->input->post('description'),
            'event_date' => $this->input->post('event_date'),
            'location' => $this->input->post('location')
        );
        if($id==0){
            return $this->db->insert('events',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('events',$data);
        }        
    }


    public function findEvent($id)
    {
        return $this->db->get_where('events', array('id' => $id))->row();
    }


    public function delete($id)
    {
        return $this->db->delete('events', array('id' => $id));
    }
}
?>