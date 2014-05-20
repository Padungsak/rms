<?php $this->load->view("partial/header"); ?>
<script type="text/javascript">
function post_room_form_submit(response)
{
    if(!response.success)
    {
        set_feedback(response.message,'error_message',true);
    }
    else
    {
        //This is an update, just update one row
        if(jQuery.inArray(response.room_id,get_visible_checkbox_ids()) != -1)
        {
            update_row(response.room_id,'<?php echo site_url("$controller_name/get_row")?>');
            set_feedback(response.message,'success_message',false);

        }
        else //refresh entire table
        {
            do_search(true,function()
            {
                //highlight new row
                hightlight_row(response.room_id);
                set_feedback(response.message,'success_message',false);
            });
        }
    }
}
</script>

<div id="title_bar">
	<div id="table_action_header" class="float_left"><?php echo $this->lang->line('room_booking_booking_time').' '.date('g.i a'); ?></div>
</div>

<script src="<?php echo base_url();?>js/countdown.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div id="table_holder">
<?php echo $manage_table; ?>
</div>
<?php $this->load->view("partial/footer"); ?>