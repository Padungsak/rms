<?php
require_once ("secure_area.php");
class Reports extends Secure_area 
{	
	function __construct()
	{
		parent::__construct('reports');
	}
    
    function index()
    {
        $start_date = $this->input->post('start_date');
        $data['start_date'] = $start_date;
        $end_date = $this->input->post('end_date');
        $data['end_date'] = $end_date;
        if($end_date != null)
        {
            $end_date .= ' 23:59:59';
        }
        
        $booking_data = $this->Booking_detail->get_booking_report($start_date, $end_date);
        $data['manage_table'] = get_booking_report_table($booking_data,$this);
        $data['sum_price'] = $this->Booking_detail->get_summary_booking_report($start_date, $end_date);               
        $this->load->view("reports/manage",$data);  
    }        	
}
?>
