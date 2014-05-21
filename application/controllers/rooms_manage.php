<?php
require_once ("secure_area.php");
require_once ("interfaces/idata_controller.php");
class Rooms_manage extends Secure_area implements iData_controller
{
    function __construct()
    {
        parent::__construct('rooms_manage');
    }
    
    function index()
    {
        $config['base_url'] = site_url('/rooms_manage/index');
        $config['total_rows'] = $this->Room->count_all();
        $config['per_page'] = '20';
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        
        $data['controller_name']=strtolower(get_class());
        $data['manage_table']=get_rooms_manage_table( $this->Room->get_all( $config['per_page'], $this->uri->segment( $config['uri_segment'] ) ), $this );
        $this->load->view('rooms_manage/manage',$data);
    }
    
    function save($room_id=-1)
    {
        $room_data = array(
        'name'=>$this->input->post('name'),
        'description'=>$this->input->post('description'),
        'tempPrice'=>$this->input->post('tempPrice'),
        'temp_duration'=>$this->input->post('temp_duration'),
        'nightPrice'=>$this->input->post('nightPrice'),
        'status'=>$this->input->post('status')
        );

        if( $this->Room->save( $room_data, $room_id ) )
        {
            //New room
            if($room_id==-1)
            {
                echo json_encode(array('success'=>true,'message'=>$this->lang->line('rooms_manage_successful_adding').' '.
                $room_data['name'],'room_id'=>$room_data['room_id']));
                $room_id = $room_data['room_id'];
            }
            else //previous room
            {
                echo json_encode(array('success'=>true,'message'=>$this->lang->line('rooms_manage_successful_updating').' '.
                $room_data['name'],'room_id'=>$room_id));
            }
        }
        else//failure
        {
            echo json_encode(array('success'=>false,'message'=>$this->lang->line('rooms_manage_error_adding_updating').' '.
            $room_data['name'],'room_id'=>-1));
        }
    }
    
    function search()
    {
        $search=$this->input->post('search');
        $data_rows=get_rooms_manage_table_data_rows($this->Room->search($search),$this);
        echo $data_rows;
    }
    
    function delete()
    {

    }
    
    function suggest()
    {
        $aaa=1;
    }
    
    function view($room_id=-1)
    {
        $data['room_info']=$this->Room->get_info($room_id);
        $this->load->view('rooms_manage/form_add',$data);
    }
    
    function get_row()
    {
        $room_id = $this->input->post('room_id');
        $data_row=get_room_data_row($this->Room->get_info($room_id),$this);
        echo $data_row;
    }
    
    function get_form_width()
    {
        
    }
    
    function add_room($room_info)
    {
        $this->load->view('rooms_manage/form_add',$data);
    }
}
?>