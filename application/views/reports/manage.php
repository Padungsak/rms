<?php $this->load->view("partial/header"); ?>
<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/jquery.datepick.css" />
<script src="<?php echo base_url();?>js/jquery-1.11.0.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>js/jquery.plugin.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>js/jquery.datepick.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<script src="<?php echo base_url();?>js/jquery.datepick-th.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

<script>
$(document).ready(function()
        {
            $.datepick.setDefaults($.datepick.regionalOptions['th']);
            $('#end_date').datepick({dateFormat:'yyyy-mm-dd'});
            $('#start_date').datepick({dateFormat:'yyyy-mm-dd'});
            
            $('#get_report')
        });
</script>

<div id="title_bar">
    <div id="title" class="float_left"><?php echo $this->lang->line('reports_income_report'); ?></div>    
</div>

<?php echo $this->pagination->create_links();?>

<div id="table_room_report_header">
    <?php echo form_open("reports/");   ?>
    <table>
        <tbody>            
           <tr>
               <td>
                    <label id="item_label" for="item">
                        <?php echo $this->lang->line('reports_start_date');?>                
                    </label>                   
                    <?php echo form_input(array('id'=>'start_date','name'=>'start_date','type'=>'text','value'=>$start_date));?>
                    <label id="item_label" for="item">
                        <?php echo $this->lang->line('reports_end_date');?>
                    </label>
                    <?php echo form_input(array('id'=>'end_date','name'=>'end_date','type'=>'text','value'=>$end_date));?>
                    <?php echo form_submit("get_report", $this->lang->line('reports_get_report'));?>  
                </td>
                             
            </tr>  
        
        </tbody>
    </table>
    </form>
</div>

<div id="table_holder">
   <?php echo $manage_table; ?>
</div>

<?php if($sum_price != null)
{ ?>
<div id="report_summary">
    <div class="summary_row"><?php echo $this->lang->line('reports_summary_income'). ': '.to_currency($sum_price); ?></div>
</div>
<?php
} ?>
<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript" language="javascript">
$(document).ready(function()
{
    $("#get_report").click(function()
    {       

            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var base_url = "http://localhost/rms/";
            if(start_date != "" && end_date != "")
            {
                window.location = window.location+'/summary_booking_detail/'+start_date + '/'+ end_date;        
            }
            else
            {
                 window.location = window.location;
            }                   
    });
});
</script>
