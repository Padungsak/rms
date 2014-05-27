<?php
class Room extends CI_Model 
{
    /*
    Determines if a given room_id is an room
    */
    function exists( $room_id )
    {
        $this->db->from('rooms');
        $this->db->where('room_id',$room_id);
        $this->db->where('deleted',0);
        $query = $this->db->get();

        return ($query->num_rows()==1);
    }
    
	 /*   Gets item info for a particular item
    */
    public function get_info($room_id)
    {
        $this->db->from('rooms');
        $this->db->where('room_id',$room_id);
        $this->db->where('deleted',0);
        
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            $room_obj=new stdClass();

            $fields = $this->db->list_fields('rooms');

            foreach ($fields as $field)
            {
                $room_obj->$field='';
            }

            return $room_obj;
        }
    }
    
        /*
    Returns all the rooms
    */
    function get_all($limit=10000, $offset=0)
    {
        $this->db->from('rooms');
        $this->db->where('deleted',0);       
        $this->db->order_by("name", "asc");
        $this->db->limit($limit);
        $this->db->offset($offset);
        return $this->db->get();
    }
    
    function count_all()
    {
        $this->db->from('rooms');
        $this->db->where('deleted',0);       
        return $this->db->count_all_results();
    }
    
    /*
    Inserts or updates an item's unit
    */
    public function save(&$room_data, $room_id)
    {
        if (!$room_id or !$this->exists($room_id))
        {
            if($this->db->insert('rooms',$room_data))
            {
                $room_data['room_id']=$this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where('room_id', $room_id);
        return $this->db->update('rooms',$room_data);
    }


    function search($search)
    {
        $this->db->from('rooms');
        if($search != null)
        {
            $this->db->like('name',$this->db->escape_like_str($search));
            $this->db->or_like('description',$this->db->escape_like_str($search));    
        }                
        $this->db->where('deleted',0);   
        $this->db->order_by("name", "asc");
        return $this->db->get();
    }
    

    function delete_list($room_ids)
    {
        $success=false;
        
        //Run these queries as a transaction, we want to make sure we do all or nothing
        $this->db->trans_start();

        $this->db->where_in('room_id',$room_ids);
        $success = $this->db->update('rooms', array('deleted' => 1));
       
        $this->db->trans_complete();        
        return $success;
    }
}

?>