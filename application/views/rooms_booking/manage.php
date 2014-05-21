<?php $this->load->view("partial/header"); ?>
<script type="text/javascript">
$(document).ready(function()
{
    enable_search('<?php echo site_url("$controller_name/suggest")?>','<?php echo $this->lang->line("common_confirm_search")?>'); 
});

function post_room_book_form_submit(response)
{
    if(!response.success)
    {
        set_feedback(response.message,'error_message',true);
    }
    else
    {
        //This is an update, just update one row
        if(jQuery.inArray(response.booking_id,get_visible_checkbox_ids()) != -1)
        {
            update_row(response.booking_id,'<?php echo site_url("$controller_name/get_row")?>');
            set_feedback(response.message,'success_message',false);

        }
        else //refresh entire table
        {
            do_search(true,function()
            {
                //highlight new row
                hightlight_row(response.booking_id);
                set_feedback(response.message,'success_message',false);
            });
        }
    }
}
</script>

<div id="title_bar">
    <div id="title" class="float_left"><?php echo $this->lang->line('room_booking_booking_time').' '.date('g.i a'); ?></div>
</div>

<?php echo form_open("$controller_name/search",array('id'=>'search_form')); ?>     
</form>
        
<script src="<?php echo base_url();?>js/countdown.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div id="table_holder">
<?php echo $manage_table; ?>
</div>
<?php $this->load->view("partial/footer"); ?>