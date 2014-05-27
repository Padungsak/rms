<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
<ul id="error_message_box"></ul>
<?php
echo form_open('rooms_manage/save/'.$room_info->room_id,array('id'=>'room_add_form'));
?>

<fieldset id="room_manage_basic_info">
<legend><?php echo $this->lang->line("rooms_manage_basic_information"); ?></legend>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_room_name').':', 'name',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'name',
        'id'=>'name',
        'value'=>$room_info->name)
    );?>
    </div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_room_description').':', 'description',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'description',
        'id'=>'description',
        'value'=>$room_info->description)
    );?>
    </div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_temporaly_renting_price').':', 'tempPrice',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'tempPrice',
        'id'=>'tempPrice',
        'value'=>$room_info->tempPrice)
    );?>
    </div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_temporaly_renting_duration').':', 'temp_duration',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'temp_duration',
        'id'=>'temp_duration',
        'value'=>$room_info->temp_duration)
    );?>
    </div>
</div>


<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_night_renting_price').':', 'nightPrice',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_input(array(
        'name'=>'nightPrice',
        'id'=>'nightPrice',
        'value'=>$room_info->nightPrice)
    );?>
    </div>
</div>

<div class="field_row clearfix">
<?php echo form_label($this->lang->line('rooms_manage_open').':', 'status',array('class'=>'wide')); ?>
    <div class='form_field'>
    <?php echo form_checkbox(array(
        'name'=>'status',
        'id'=>'status',
        'value'=>1,
        'checked'=>($room_info->status)? 1  :0)
    );?>
    </div>
</div>

<?php
echo form_submit(array(
    'name'=>'submit',
    'id'=>'submit',
    'value'=>$this->lang->line('common_submit'),
    'class'=>'submit_button float_right')
);
?>

</fieldset>
<?php
echo form_close();
?>
<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{
    $('#room_add_form').validate({
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
        },
        errorLabelContainer: "#error_message_box",
        wrapper: "li",
        rules:
        {
            name:"required",
            tempPrice:
            {
                required:true,
                number:true
            },

            nightPrice:
            {
                required:true,
                number:true
            }
            
        },
        messages:
        {
            name:"<?php echo $this->lang->line('rooms_manage_name_required'); ?>",
            tempPrice:
            {
                required:"<?php echo $this->lang->line('rooms_manage_temp_price_required'); ?>",
                number:"<?php echo $this->lang->line('rooms_manage_temp_price_number'); ?>"
            },
            nightPrice:
            {
                required:"<?php echo $this->lang->line('rooms_manage_night_price_required'); ?>",
                number:"<?php echo $this->lang->line('rooms_manage_night_price_number'); ?>"
            }
        }
    });
});
</script>