<?php
require_once ("secure_area.php");
class Rooms_booking extends Secure_area 
{
	function __construct()
	{
		parent::__construct('rooms_booking');
	}
	
	function index()
	{
        
		$data['controller_name']=strtolower(get_class());
        $data['manage_table']=get_rooms_booking_table( $this->Room->get_all(), $this );
		$this->load->view('rooms_booking/manage',$data);
	}
	
    
    function save($booking_id=-1)
    {
        $booking_data = array('room_id' => $this->input->post('room_id'));        
        $room_info = $this->Room->get_info($booking_data['room_id']);
        
        $current_time = new DateTime();
        $booking_data['start_time'] =   $current_time->format('Y-m-d H:i:s');
        if($this->input->post('temp_booking'))
        {
            $booking_data['booking_type'] = $this->input->post('temp_booking');
            $booking_data['booking_price']  = $room_info->tempPrice;
                        
            $time_offset = $room_info->temp_duration;
            $current_time->add(new  DateInterval('PT'.$time_offset.'H'));
            $booking_data['end_time'] = $current_time->format('Y-m-d H:i:s');  
        }
        else 
        {
            $booking_data['booking_type'] = $this->input->post('night_booking');            
            $booking_data['booking_price']  = $room_info->nightPrice;
            
            $end_time = getdate();
            $current_time->setDate($end_time['year'],$end_time['mon'], $end_time['mday'] + 1);
            $current_time->setTime(12,0,0);
            $booking_data['end_time'] = $current_time->format('Y-m-d H:i:s');
        }
        
        $booking_data['person_id']  = $this->Employee->get_logged_in_employee_info()->person_id;
        if( $this->Booking_detail->save( $booking_data, $booking_id ) )
        {

                echo json_encode(array('success'=>true,'message'=>$this->lang->line('room_booking_successful_booking').' '.
                $room_info['name'],'booking_id'=>$booking_data['booking_id']));
                $booking_id = $booking_data['booking_id'];
        }
        else//failure
        {
            echo json_encode(array('success'=>false,'message'=>$this->lang->line('room_booking_error_adding_updating').' '.
            $room_data['name'],'room_id'=>-1));
        }
    }
    
    function book_new_room($room_id=-1, $booking_id=-1)
    {
        $data['booking_info']=$this->Room->get_info($booking_id);
        $data['room_id'] = $room_id;
        $this->load->view('rooms_booking/form_book',$data);
    }
}
?>