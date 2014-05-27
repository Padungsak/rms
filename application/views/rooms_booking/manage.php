<?php $this->load->view("partial/header"); ?>
<script type="text/javascript">
function refresh_page()
{
    location.reload();             
}
</script>

<div id="title_bar">
    <div id="title" class="float_left"><?php echo $this->lang->line('rooms_booking_booking_time').' '.date('g.i a'); ?></div>
</div>

<?php echo form_open("$controller_name/search",array('id'=>'search_form')); ?>     
</form>
        
<script src="<?php echo base_url();?>js/countdown.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<div id="table_holder">
<?php echo $manage_table; ?>
</div>


<?php $this->load->view("partial/footer"); ?>