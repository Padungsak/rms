<?php
class Booking_detail extends CI_Model 
{

    function exists( $booking_id )
    {
        $this->db->from('booking_detail');
        $this->db->where('booking_id',$booking_id);
        $query = $this->db->get();

        return ($query->num_rows()==1);
    }
    
    function get_info($booking_id)
    {
        $this->db->from('booking_detail');         
        $this->db->where('booking_id',$booking_id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            //Get empty base parent object, as $customer_id is NOT an customer
            $person_obj=parent::get_info(-1);
            
            //Get all the fields from customer table
            $fields = $this->db->list_fields('booking_detail');
            
            //append those fields to base parent object, we we have a complete empty object
            foreach ($fields as $field)
            {
                $person_obj->$field='';
            }
            
            return $person_obj;
        }
    }
    
    function get_room_booking($room_id)
    {
        $this->db->from('booking_detail');
        $this->db->where('room_id',$room_id);
        $this->db->where('booking_status','open');
        
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
    function save(&$booking_data, $booking_id)
    {
        if (!$booking_id or !$this->exists($booking_id))
        {
            if($this->db->insert('booking_detail',$booking_data))
            {
                $booking_data['booking_id']=$this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where('booking_id', $booking_id);
        return $this->db->update('booking_detail',$booking_data);
    }
    
    function update_booking_status($booking_id, $status)
    {
        $this->db->where('booking_id', $booking_id);
        $this->db->update('booking_detail', array('booking_status' => $status));
    }
    
    function get_booking_report($start_date, $end_date)
    {
        $this->db->select('start_time, end_time, booking_type, booking_price, rooms.name, people.first_name,people.last_name');
        $this->db->from('booking_detail');
        $this->db->join('rooms', 'booking_detail.room_id = rooms.room_id', 'INNER');
        $this->db->join('people', 'booking_detail.person_id = people.person_id', 'INNER');
        $this->db->where('start_time BETWEEN "'. $start_date. '" and "'. $end_date.'"');
        $this->db->order_by('start_time');        
        return $this->db->get();
    }
    
    function get_summary_booking_report($start_date, $end_date)
    {
        $this->db->select('sum(booking_price) as sum_price');
        $this->db->from('booking_detail');      
        $this->db->where('start_time BETWEEN "'. $start_date. '" and "'. $end_date.'"');    
        return $this->db->get()->row()->sum_price;
    }
}
?>
    