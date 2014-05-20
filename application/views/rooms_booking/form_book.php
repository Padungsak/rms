<?php
echo form_open('rooms_booking/save/'.$booking_info->booking_id,array('id'=>'room_booking_form'));
?>

<?php echo form_hidden('room_id',$room_id); ?>
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
//validation and submit handling
$(document).ready(function()
{
    $('#room_booking_form').validate({
        submitHandler:function(form)
        {
            $(form).ajaxSubmit({
            success:function(response)
            {
                tb_remove();
                post_room_form_submit(response);
            },
            dataType:'json'
        });
       
    });
});
</script>