<?php
echo form_open('rooms_booking/save/'.$booking_info->booking_id,array('id'=>'room_book_form'));
?>

<?php echo form_hidden('room_id',$room_id); ?>
<?php echo form_hidden('booking_type'); ?>
<table>
    <tr>
        <td>
            <?php
                echo form_submit(array(
                    'name'=>'temp_booking',
                    'id'=>'temp_booking',
                    'value'=>$this->lang->line('room_booking_temporaly_booking'),
                    'class'=>'big_button')
                );
            ?>
        </td>  
    </tr>
    <tr>
        <td>
            <?php
                echo form_submit(array(
                    'name'=>'night_booking',
                    'id'=>'night_booking',
                    'value'=>$this->lang->line('room_booking_night_booking'),
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
    $('#temp_booking').click(function()
    {
        this.form.elements["booking_type"].value = 'temporaly';      
    });
    
    $('#night_booking').click(function()
    {
        this.form.elements["booking_type"].value = 'night';      
    });
    
    $('#room_book_form').validate({
        submitHandler:function(form)
        {
            $(form).ajaxSubmit({
            success:function(response)
            {
                tb_remove();
                post_room_book_form_submit(response);
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