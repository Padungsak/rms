<?php
/*
Gets the html table to manage people.
*/
function get_people_manage_table($people,$controller)
{
	$CI =& get_instance();
	$table='<table class="tablesorter" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	$CI->lang->line('common_last_name'),
	$CI->lang->line('common_first_name'),
	$CI->lang->line('common_email'),
	$CI->lang->line('common_phone_number'),
	'&nbsp');
	
	$table.='<thead><tr>';
	foreach($headers as $header)
	{
		$table.="<th>$header</th>";
	}
	$table.='</tr></thead><tbody>';
	$table.=get_people_manage_table_data_rows($people,$controller);
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the people.
*/
function get_people_manage_table_data_rows($people,$controller)
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($people->result() as $person)
	{
		$table_data_rows.=get_person_data_row($person,$controller);
	}
	
	if($people->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='6'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('common_no_persons_to_display')."</div></tr></tr>";
	}
	
	return $table_data_rows;
}

function get_person_data_row($person,$controller)
{
	$CI =& get_instance();
	$controller_name=strtolower(get_class($CI));
	$width = $controller->get_form_width();

	$table_data_row='<tr>';
	$table_data_row.="<td width='5%'><input type='checkbox' id='person_$person->person_id' value='".$person->person_id."'/></td>";
	$table_data_row.='<td width="20%">'.character_limiter($person->last_name,13).'</td>';
	$table_data_row.='<td width="20%">'.character_limiter($person->first_name,13).'</td>';
	$table_data_row.='<td width="30%">'.mailto($person->email,character_limiter($person->email,22)).'</td>';
	$table_data_row.='<td width="20%">'.character_limiter($person->phone_number,13).'</td>';		
	$table_data_row.='<td width="5%">'.anchor($controller_name."/view/$person->person_id/width:$width", $CI->lang->line('common_edit'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update'))).'</td>';		
	$table_data_row.='</tr>';
	
	return $table_data_row;
}

/*
Gets the html table to manage items.
*/
function get_items_manage_table($items,$controller)
{
	$CI =& get_instance();
	$table='<table class="tablesorter" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	$CI->lang->line('items_item_number'),
	$CI->lang->line('items_name'),
	$CI->lang->line('items_category'),
	$CI->lang->line('items_cost_price'),
	$CI->lang->line('items_unit_price'),
	$CI->lang->line('items_tax_percents'),
	$CI->lang->line('items_quantity'),
	'&nbsp;',
	$CI->lang->line('items_inventory')
	);
	
	$table.='<thead><tr>';
	foreach($headers as $header)
	{
		$table.="<th>$header</th>";
	}
	$table.='</tr></thead><tbody>';
	$table.=get_items_manage_table_data_rows($items,$controller);
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the items.
*/
function get_items_manage_table_data_rows($items,$controller)
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($items->result() as $item)
	{
		$table_data_rows.=get_item_data_row($item,$controller);
	}
	
	if($items->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('items_no_items_to_display')."</div></tr></tr>";
	}
	
	return $table_data_rows;
}

function get_item_data_row($item,$controller)
{
	$CI =& get_instance();
	$item_tax_info=$CI->Item_taxes->get_info($item->item_id);
	$tax_percents = '';
	foreach($item_tax_info as $tax_info)
	{
		$tax_percents.=$tax_info['percent']. '%, ';
	}
	$tax_percents=substr($tax_percents, 0, -2);
	$controller_name=strtolower(get_class($CI));
	$width = $controller->get_form_width();

	$table_data_row='<tr>';
	$table_data_row.="<td width='3%'><input type='checkbox' id='item_$item->item_id' value='".$item->item_id."'/></td>";
	$table_data_row.='<td width="15%">'.$item->item_number.'</td>';
	$table_data_row.='<td width="20%">'.$item->name.'</td>';
	$table_data_row.='<td width="14%">'.$item->category.'</td>';
	$table_data_row.='<td width="14%">'.to_currency($item->cost_price).'</td>';
	$table_data_row.='<td width="14%">'.to_currency($item->unit_price).'</td>';
	$table_data_row.='<td width="14%">'.$tax_percents.'</td>';	
	$table_data_row.='<td width="14%">'.$item->quantity.'</td>';
	$table_data_row.='<td width="500%">'.anchor($controller_name."/view/$item->item_id/width:$width", $CI->lang->line('common_edit'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update'))).'</td>';		
	
	//Ramel Inventory Tracking
	$table_data_row.='<td width="500%">'.anchor($controller_name."/inventory/$item->item_id/width:$width", $CI->lang->line('common_inv'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_count')))./*'</td>';//inventory count	
	$table_data_row.='<td width="500%">'*/'&nbsp;&nbsp;&nbsp;&nbsp;'.anchor($controller_name."/count_details/$item->item_id/width:$width", $CI->lang->line('common_det'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_details_count'))).'</td>';//inventory details	
	
	$table_data_row.='</tr>';
	return $table_data_row;
}

/*
Gets the html table to manage giftcards.
*/
function get_giftcards_manage_table( $giftcards, $controller )
{
	$CI =& get_instance();
	
	$table='<table class="tablesorter" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	$CI->lang->line('common_last_name'),
	$CI->lang->line('common_first_name'),
	$CI->lang->line('giftcards_giftcard_number'),
	$CI->lang->line('giftcards_card_value'),
	'&nbsp', 
	);
	
	$table.='<thead><tr>';
	foreach($headers as $header)
	{
		$table.="<th>$header</th>";
	}
	$table.='</tr></thead><tbody>';
	$table.=get_giftcards_manage_table_data_rows( $giftcards, $controller );
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the giftcard.
*/
function get_giftcards_manage_table_data_rows( $giftcards, $controller )
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($giftcards->result() as $giftcard)
	{
		$table_data_rows.=get_giftcard_data_row( $giftcard, $controller );
	}
	
	if($giftcards->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('giftcards_no_giftcards_to_display')."</div></tr></tr>";
	}
	
	return $table_data_rows;
}

/** GARRISON MODIFIED 4/25/2013 **/
function get_giftcard_data_row($giftcard,$controller)
{
	$CI =& get_instance();
	$controller_name=strtolower(get_class($CI));
	$width = $controller->get_form_width();

	$table_data_row='<tr>';
	$table_data_row.="<td width='3%'><input type='checkbox' id='giftcard_$giftcard->giftcard_id' value='".$giftcard->giftcard_id."'/></td>";
	$table_data_row.='<td width="15%">'.$giftcard->last_name.'</td>';
	$table_data_row.='<td width="15%">'.$giftcard->first_name.'</td>';
	$table_data_row.='<td width="15%">'.$giftcard->giftcard_number.'</td>';
	$table_data_row.='<td width="20%">'.to_currency($giftcard->value).'</td>';
	$table_data_row.='<td width="5%">'.anchor($controller_name."/view/$giftcard->giftcard_id/width:$width", $CI->lang->line('common_edit'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update'))).'</td>';		
	
	$table_data_row.='</tr>';
	return $table_data_row;
}
/** END GARRISON MODIFIED **/

/*
Gets the html table to manage item kits.
*/
function get_item_kits_manage_table( $item_kits, $controller )
{
	$CI =& get_instance();
	
	$table='<table class="tablesorter" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	$CI->lang->line('item_kits_name'),
	$CI->lang->line('item_kits_description'),
	'&nbsp', 
	);
	
	$table.='<thead><tr>';
	foreach($headers as $header)
	{
		$table.="<th>$header</th>";
	}
	$table.='</tr></thead><tbody>';
	$table.=get_item_kits_manage_table_data_rows( $item_kits, $controller );
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the item kits.
*/
function get_item_kits_manage_table_data_rows( $item_kits, $controller )
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($item_kits->result() as $item_kit)
	{
		$table_data_rows.=get_item_kit_data_row( $item_kit, $controller );
	}
	
	if($item_kits->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('item_kits_no_item_kits_to_display')."</div></tr></tr>";
	}
	
	return $table_data_rows;
}

function get_item_kit_data_row($item_kit,$controller)
{
	$CI =& get_instance();
	$controller_name=strtolower(get_class($CI));
	$width = $controller->get_form_width();

	$table_data_row='<tr>';
	$table_data_row.="<td width='3%'><input type='checkbox' id='item_kit_$item_kit->item_kit_id' value='".$item_kit->item_kit_id."'/></td>";
	$table_data_row.='<td width="15%">'.$item_kit->name.'</td>';
	$table_data_row.='<td width="20%">'.character_limiter($item_kit->description, 25).'</td>';
	$table_data_row.='<td width="5%">'.anchor($controller_name."/view/$item_kit->item_kit_id/width:$width", $CI->lang->line('common_edit'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update'))).'</td>';		
	
	$table_data_row.='</tr>';
	return $table_data_row;
}

/*
Gets the html table to manage rooms.
*/
function get_rooms_manage_table( $rooms, $controller )
{
    $CI =& get_instance();
    
    $table='<table class="tablesorter" id="sortable_table">';
    
    $headers = array('<input type="checkbox" id="select_all" />', 
    $CI->lang->line('rooms_manage_room_name'),
    $CI->lang->line('rooms_manage_room_description'),
    $CI->lang->line('rooms_manage_temporaly_renting_price'),
    $CI->lang->line('rooms_manage_temporaly_duration'),
    $CI->lang->line('rooms_manage_night_renting_price'),
    $CI->lang->line('rooms_manage_room_status'),
    '&nbsp', 
    );
    
    $table.='<thead><tr>';
    foreach($headers as $header)
    {
        $table.="<th>$header</th>";
    }
    $table.='</tr></thead><tbody>';
    $table.=get_rooms_manage_table_data_rows( $rooms, $controller );
    $table.='</tbody></table>';
    return $table;
}

/*
Gets the html data rows for the room.
*/
function get_rooms_manage_table_data_rows( $rooms, $controller )
{
    $CI =& get_instance();
    $table_data_rows='';
    
    foreach($rooms->result() as $room)
    {
        $table_data_rows.=get_room_data_row( $room, $controller );
    }
    
    if($rooms->num_rows()==0)
    {
        $table_data_rows.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('rooms_manage_no_rooms_to_display')."</div></tr></tr>";
    }
    
    return $table_data_rows;
}

function get_room_data_row($room,$controller)
{
    $CI =& get_instance();
    $controller_name=strtolower(get_class($CI));
    $width = $controller->get_form_width();

    $table_data_row='<tr>';
    $table_data_row.="<td width='3%'><input type='checkbox' id='room_$room->room_id' value='".$room->room_id."'/></td>";
    $table_data_row.='<td width="10%">'.$room->name.'</td>';
    $table_data_row.='<td width="30%">'.$room->description.'</td>';
    $table_data_row.='<td width="10%">'.$room->tempPrice.'</td>';
    $table_data_row.='<td width="20%">'.$room->temp_duration.'</td>';
    $table_data_row.='<td width="10%">'.$room->nightPrice.'</td>';
    $table_data_row.='<td width="5%">'.$room->status.'</td>';
    $table_data_row.='<td width="7%">'.anchor($controller_name."/view/$room->room_id/width:$width", $CI->lang->line('common_edit'),array('class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update'))).'</td>';        
    
    $table_data_row.='</tr>';
    return $table_data_row;
}


/*
Gets the html table to manage rooms.
*/
function get_rooms_booking_table( $rooms, $controller )
{
    $ITEM_NUMBER_IN_ROW = 3;
    $CI =& get_instance();
    $controller_name=strtolower(get_class($CI));
    
    $table='<table id="table_room"><tbody>';
    if($rooms->num_rows()==0)
    {
        $table.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".$CI->lang->line('rooms_manage_no_rooms_to_display')."</div></tr></tr>";
    }
    else 
    {
        $item_number = 0;
        foreach($rooms->result() as $room)
        {
            if($item_number == 0)
            {
                $table.= "<tr>";
            }     
                             
            if($item_number < $ITEM_NUMBER_IN_ROW)
            {

                $table.="<td>";               
                $table.=anchor($controller_name."/room_manage_view/$room->room_id/width:120/height:120", 
                                get_room_booking_style($room->room_id, $controller),
                                array('id'=>$room->name,'class'=>'thickbox','title'=>$CI->lang->line($controller_name.'_update')));
                
                $table.= $CI->lang->line('room_booking_temporaly_booking_price').$room->tempPrice;
                $table.="<br>";
                $table.= $CI->lang->line('room_booking_night_booking_price').$room->nightPrice;
                $table.="</td>";
                $item_number++;
            }

            if($item_number == $ITEM_NUMBER_IN_ROW)
            {
                $item_number =0 ;         
                $table.= "</tr>";
            }   
        }
        if($item_number != 0)
        {
            $table.= "</tr>";
        }
    }
    
    $table.='</tbody></table>';
    return $table;
}

function get_room_booking_style($room_id, $controller)
{
    $CI =& get_instance();
    $booking_detail = $controller->Booking_detail->get_room_booking($room_id); 
    $room_style = "<div class='room_button'>";
    $current_time = new DateTime();
    $end_time = new DateTime($booking_detail->end_time);   
    if(($booking_detail->booking_status == 'open') and 
        ($end_time > $current_time))
    {
        $interval = $end_time->getTimestamp() - $current_time->getTimestamp();
        $check_out_url = $CI->config->base_url().'index.php/rooms_booking/room_check_out/'.$booking_detail->booking_id;
        $room_style .=  "<script type=\"text/javascript\">
                         var myCountdownTest = new Countdown({
                                   time: $interval,
                                   width   : 70, 
                                   height  : 40,
                                   style   : \"flip\",
                                   inline  : true, 
                                   rangeHi : \"hour\",
                                   rangeLo : \"second\", 
                                   onComplete : function(result) {
                                                                    $.get('$check_out_url',
                                                                    function(data,status) {location.reload();},'html');
                                                                 }
                                    });
                         </script>";      
    }
    $room_style .= "</div>";
    return $room_style;
}
?>