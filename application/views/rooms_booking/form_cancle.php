<?php
echo form_open('rooms_booking/room_cancle/'.$booking_info->booking_id,array('id'=>'room_cancle_form'));
?>

<?php echo form_hidden('is_cancle_booking'); ?>
<p><?php echo $this->lang->line("rooms_booking_cancle_booking_comfirmation"); ?></p>
<table>
    <tr>
        <td>
            <?php
                echo form_submit(array(
                    'name'=>'ok',
                    'id'=>'ok',
                    'value'=>$this->lang->line('rooms_booking_ok_caption'),
                    'class'=>'big_button')
                );
            ?>
        </td>  
    </tr>
    <tr>
        <td>
            <?php
                echo form_submit(array(
                    'name'=>'calcle',
                    'id'=>'cancle',
                    'value'=>$this->lang->line('rooms_booking_cancle_caption'),
                    'class'=>'big_button')
                );
            ?>
        </td>  
    </tr>
</table>

<?php
echo form_close();
?>

<script type='text/javascript'>
$(document).ready(function()
{
    $('#ok').click(function()
    {
        this.form.elements["is_cancle_booking"].value = 'ok';      
    });
    
    $('#cancle').click(function()
    {
        this.form.elements["is_cancle_booking"].value = 'cancle';      
    });
    
    $('#room_cancle_form').validate({
        submitHandler:function(form)
        {
            $(form).ajaxSubmit({
            success:function(response)
            {
                tb_remove();
                refresh_page();
            },
            dataType:'json'
        });
        },
        errorLabelContainer: "#error_message_box",
        wrapper: "li",
        rules:
        {

            
        },
        messages:
        {

        }
    });
});
</script>