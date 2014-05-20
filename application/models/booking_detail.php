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
    
    function get_room_booking($room_id)
    {
        $this->db->from('booking_detail');
        $this->db->where('room_id',$room_id);
        
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            $room_obj=new stdClass();

            $fields = $this->db->list_fields('booking_detail');

            foreach ($fields as $field)
            {
                $room_obj->$field='';
            }

            return $room_obj;
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

        $this->db->where('booking_id', $room_id);
        return $this->db->update('booking_detail',$room_data);
    }
}
?>
    