<?php

	$number = round($invoice_basic_data [0]['total'],0);
			$decimal = round($number - ($no = floor($number)), 2) * 100;
			$hundred = null;
			$digits_length = strlen($no);
			$i = 0;
			$str = array();
			$words = array(0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',7 => 'seven', 8 => 'eight', 9 => 'nine',10 => 'ten', 11 => 'eleven', 12 => 'twelve',13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty',70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
			$digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
			while( $i < $digits_length ) {
				$divider = ($i == 2) ? 10 : 100;
				$number = floor($no % $divider);
				$no = floor($no / $divider);
				$i += $divider == 10 ? 1 : 2;
				if ($number) {
					$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
					$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
					$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
				} else $str[] = null;
			}
			$Rupees = implode('', array_reverse($str));
			$paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
			

		if($invoice_basic_data[0]['item_rates_are'] == "Inclusive"){
				$discount_apply_amount = '(Applied on '.$invoice_basic_data[0]['discount_apply_amount'].')';
				$tax_type  = '(Tax Inclusive)';
		}else{
			   $discount_apply_amount = "";
			   $tax_type = "";
		}

		if($invoice_basic_data[0]['discount_type'] == "percentage" || $invoice_basic_data[0]['discount_type'] == ""){
			$discount_icon = "%";
		}else{
			$discount_icon = "Rs.";
		}


	if($franchise_basic_data[0]['opt_type'] == "Franchise" && $franchise_basic_data[0]['invoice_type'] == "Product" ){
			//echo 'francise product';

		$invoiceview = '<div class="mail-body-content">

		<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice"> <div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec"> 
		
		<div style="padding:0 0px;"> 
		
		<div style="width:54%;float: left;" class="logo-div"> 
		
		<p style=" margin-bottom:8px;"> 
		
		<img style=" width:auto;height:65px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p> 
		
		
		
		</div> 
		
		
		<div style="width:33%; float:right; text-align:right" class="marketd-by">
		
		
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->

			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px!important; margin-top:3px;" class="address-top"> 
			
			<span style="font-weight:bold;font-size:15px!important"> '.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br> '.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> 
			
			Email: '.$invoice_basic_data[0]['company_email'].' </p>

			</address> </div> 
			
			</div> </div>
			<!-- Invoice Header Section End -->
			
			
			<!---- Invoice border Section ----->
			
			<div style="width:100%;display:table;" class="invoice-top-border"> 
			
			
			<div style="display: block; float: left; width:38%;" class="invoice-border-left"> 
			
			
			<hr style="border: 1px solid #1e1d1c !important; color: #1e1d1c;"> </div> <div style="display: block; float: left; width:23%" class="invoice-border-mid">

			<h3 style="color: #333333; line-height:10px; margin-left:25px;  margin-top:5px !important;text-align: center !important; font-weight:bold; font-size:17px; font-family: sans-serif;"> INVOICE </h3> 
			
			</div> 
			
			<div style="display: block; float: left; width:38%;" class="invoice-border-right"> 
			
			<hr style="border: 1px solid #1e1d1c !important;color: #1e1d1c;"> </div> </div> 
			
			
			<!-----Invoice border section end ------>


			<!-- Middle Section Start -->
			<div style="padding:0;"> <div style="width:46%; float: left;margin-bottom:15px;" class="bill-to">
			
			 <p style="font-size:16px;line-height:25px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p> 
			 
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height:17px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:bold"> '.$franchise_details[0]['username'].'</strong> <br> <span style="font-size:	13px"> '.$franchise_basic_data[0]['shipping_address_street'].'<br> '.$franchise_basic_data[0]['shipping_address_city'].'<br> '.$franchise_basic_data[0]['shipping_address_state'].'<br>'.$franchise_basic_data[0]['shipping_address_zip'].'<br>'.'<b>GST ID: </b>'.$franchise_basic_data[0]['gst_no'].' </span>
			
			
			</address>
			
			
			</div> 
			
			
			<div style="width:46%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div"> 
			
			<table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0; " class="invoice-id"> 
			
			<thead> 
			
			<tr>

			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Order No: </td> 
			
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$invoice_basic_data[0]['salesorder_no'].' </td> 
			
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif;  font-size:13px; line-height:17px; font-weight:bold" class="id-left"> Terms: </td>

			   	<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px " class="id-rt"> '.$invoice_basic_data[0]['terms_name'].' </td>
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-size:13px; line-height:17px;font-weight:bold" class="id-left"> Due Date: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
			</tr> 
			
			
			
			<tr>
			
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Order Date: </td> 
			
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			
			
			
			<tr> 
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px;font-weight:bold">  Delivery Date: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px">  '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			
			</tr>
			
			
			<tr>
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px"> Phone: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$franchise_basic_data[0]['franchise_contact'].' </td> </tr> 
			
			
			<tr>
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Email: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$franchise_basic_data[0]['franchise_email'].' </td> 
			
			</tr> 
			
			<tr> 
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Place of Supply: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> 
			
			</thead>
			</table>
			
			</div>
			
			</div>
			<!-- Middle Section end -->


			 <div style="width:100%; float:left" class="mobile-scroll-view"> 
			 
			 
			 <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table; margin-top:10px;" class="invoice-table"> 
			 <thead> 
			 
			 <tr style="background-color:#000!important; ;"> 
			 
			 <th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th>

			 <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:300px "> Item &amp;Description </th>
 
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Qty </th> 
			
			
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>
			
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';

			}

			else {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
			}

				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
			</tr>
			 </thead> 
			 <tbody>';
			$i = 1;
		   foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			
		


			$invoiceview .='<tr>
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td> 
			
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:13px;  color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['nick_name'].'</strong> <br> <span style="color:#727272"> </span> </td>
			
	
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].' '.$values['unit_name'].'</td> 
			
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span>
			</td>
			
			
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span></td>';

			}
			else {
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>';
			}
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
			</tr>';
			$i++;
			}

			$invoiceview .='</tbody>
			</table> </div>
			 <div style="margin-top:10px; width:100%;display:block ;"> 
			 
			 <div style="width:49.7179%; min-height: 30px; float: left;"> <p style="font-size:13px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> </div>

			 <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total"> <div> 
			 
			 <table style="float:right"> 
			 
			 <tbody> <tr> 
			 <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td>

			  <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td> 
			 
			 </tr>
			 <tr>
				<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
				
				<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
			</tr>'; 


			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}
 
	
		$invoiceview .= '<tr>
			 <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td> 
			 
			 
			 <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td> 
			 
			 </tr> 
			 
			 <tr> 
			 <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td> 
			 
			 <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td> 
			 </tr> 
			 
			 
			 <tr> 
			 
			 <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px;  border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong> Total </strong> <br><br> <strong>  Inwords </strong> 
			 </td> 
			 
			 <td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px; border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong> <br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p></td>
			  </tr> </tbody> 
			 </table> 
			 
			 </div> 
			 </div> 
			 
			 </div> 
			 <div style="clear:both"> </div> 
			 </div>';
		} 

		 //if end  franchise product

		else if ($franchise_basic_data[0]['opt_type'] == "Franchise" && $franchise_basic_data[0]['invoice_type'] == "Kit")

		{
			//echo 'franchise Kit';
			$invoiceview = '<div class="mail-body-content">

		<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice"> <div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec"> 
		
		<div style="padding:0 0px;"> 
		
		<div style="width:54%;float: left;" class="logo-div"> 
		
		<p style=" margin-bottom:8px;"> 
		
		<img style=" width:auto;height:85px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p> 
		
		
		</div> 
		
		
		<div style="width:33%; float:right; text-align:right" class="marketd-by">
		
		
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->

			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px!important; margin-top:3px;" class="address-top"> 
			
			<span style="font-weight:bold;font-size:15px!important"> '.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br>'.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> 
			
			Email: '.$invoice_basic_data[0]['company_email'].' </p>

			</address> </div> 
			
			</div> </div>
			<!-- Invoice Header Section End -->

			<!---- Invoice border Section ----->
			<div style="width:100%;display:table;" class="invoice-top-border"> <div style="display: block; float: left; width:38%;" class="invoice-border-left"> <hr style="border: 1px solid #1e1d1c; color: #1e1d1c;"> </div> 

			<div style="display: block; float: left; width:23%" class="invoice-border-mid">

			 <h3 style="color: #333333; line-height:10px;  margin-top:6px !important;text-align: center !important; font-weight:500; font-size:17px; font-family: sans-serif; margin-left:25px;"> INVOICE </h3> 

			</div> <div style="display: block; float: left; width:38%;" class="invoice-border-right"> <hr style="border: 1px solid #1e1d1c;color: #1e1d1c;"> </div> </div> 
			<!-----Invoice border section end ------>

						<!-- Middle Section Start -->
			<div style="padding:0;"> <div style="width:46%; float: left;margin-bottom:15px;" class="bill-to">
			
			 <p style="font-size:16px;line-height:25px; font-weight:700; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p> 
			 
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height: 18px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:700"> '.$franchise_details[0]['username'].'</strong> <br> <span style="font-size:	13.3167px"> '.$franchise_basic_data[0]['shipping_address_street'].'<br> '.$franchise_basic_data[0]['shipping_address_city'].'<br> '.$franchise_basic_data[0]['franc_state'].'<br>'.$franchise_basic_data[0]['shipping_address_zip'].'<br>'.'<b>GST ID: </b>'.$franchise_basic_data[0]['gst_no'].' </span>
			
			
			</address>
			
			
			</div> 
			
			
			<div style="width:46%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div"> 
			
			<table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0; " class="invoice-id"> 
			
			<thead> 
			
			<tr>

			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Order No: </td> 
			
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$invoice_basic_data[0]['salesorder_no'].' </td> 
			
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif;  font-size:13px; line-height:17px font-weight:bold" class="id-left"> Terms: </td>

			   	<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px " class="id-rt"> '.$invoice_basic_data[0]['terms_name'].' </td>
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-left"> Due Date: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
			</tr> 
			
			
			
			<tr>
			
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Order Date: </td> 
			
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			
			
			
			<tr> 
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px">  Delivery Date: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px">  '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			
			</tr>
			
			
			<tr>
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px"> Phone: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$franchise_basic_data[0]['franchise_contact'].' </td> </tr> 
			
			
			<tr>
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Email: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$franchise_basic_data[0]['franchise_email'].' </td> 
			
			</tr> 
			
			<tr> 
			<td class="id-left" style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px; line-height:17px">  Place of Supply: </td> 
			
			<td class="id-rt" style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> 
			
			</thead>
			</table>
			
			</div>
			
			</div>
			<!-- Middle Section end -->



			<div style="width:100%; float:left"  class="mobile-scroll-view admin-sales-order-invoice1">
			    <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table;" class="invoice-table">
			     <thead>
			      <tr style="background-color:#000!important; ;"> 
			      <th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th> 

			      <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:300px "> Kit &amp;Description </th>

			  <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">Kit Qty </th> <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>
				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';

			}

			else {
			$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
			}

			$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
			</tr>
			 </thead>
			 <tbody>';

			$i = 1;
		   foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			


			$invoiceview .='<tr>
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td>

			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['kit_name'].'</strong> <br> <span style="color:#727272"> </span>
			</td>

			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].'</td>

			 <td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'<br>
			 	<span style="color:#727272">'.$taxpercent.'</span> 
			 </td>
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span> </td>';

			}
			else {
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>';
			}

			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
			</tr>';
			$i++;
			}

			$invoiceview .='</tbody>
			</table> </div>
			 <div style="margin-top:10px; width:100%;display:block ;">
			  <div style="width:49.7179%; min-height: 30px; float: left;">
			   <p style="font-size:13px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> </div>
			    <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total"> 
			    <div> <table style="float:right"> 
			    <tbody> 
			    <tr> 
			    <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td>

			     <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td>
			    </tr>
			    <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
					
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
				</tr>';

			    if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}

			 $invoiceview .= '<tr>
			     <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td>
			     <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td>
			    </tr>
			    <tr> <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td> <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td>
			    </tr>

			     <tr> <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px; ; border-top:1px solid #1e1d1c !important; border-bottom:1px solid #1e1d1c !important"> <strong> Total </strong> <br><br> <strong>  Inwords </strong>
			      </td> 

			    <td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px; border-top:1px solid #1e1d1c !important; border-bottom:1px solid #1e1d1c !important"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong> <br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p> </td>
			      </tr> </tbody> </table> </div> </div> </div> <div style="clear:both"> </div> 
			 </div>';
		}

		//franchise condition end


		else if($franchise_basic_data[0]['opt_type'] == "Customer" && $franchise_basic_data[0]['invoice_type'] == "Product") { 
		
			//echo "Customer product";
			
		$invoiceview='<div class="mail-body-content">

			<div class="col-lg-12">

			<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice"> <div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec"> <div style="padding:0 0px;"> <div style="width:54%;float: left;" class="logo-div"> <p style="font-size:10px;color:#fff; margin-bottom:8px;"> <img style=" width:auto;height:65px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p> </div> <div style="width:33%; float:right; text-align:right" class="marketd-by">
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->
			
			
			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px; margin-top:3px;" class="address-top">
		
			
			<span  style="font-weight:bold;  line-height:25px!important;font-size:13px">'.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br>'.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif; margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:5px"> Email: '.$invoice_basic_data[0]['company_email'].' </p> </address> </div> </div> </div>
			
			<!-- Invoice Header Section End -->
			
			<!---- Invoice border Section ----->
			
			<div style="width:100%;display:table;" class="invoice-top-border"> <div style="display: block; float: left; width:38%;" class="invoice-border-left"> 
			
			<hr style="border: 1px solid #1e1d1c !important; color: #1e1d1c;"> 
			</div> 
			
			<div style="display: block; float: left; width:23%" class="invoice-border-mid">
			
			<h3 style="color: #333333; line-height:10px;  margin-top:6px !important;text-align: center !important; font-weight:bold; font-size:17px; font-family: sans-serif;margin-left:25px;"> INVOICE </h3> </div> 
			
			
			<div style="display: block; float: left; width:38%;" class="invoice-border-right"> <hr style="border: 1px solid #1e1d1c !important;color: #1e1d1c;">
			</div>
			

			</div> 
			
			
			<!-----Invoice border section end ------>

			<!-- Middle Section Start -->
			<div style="padding:0;"> 
			
			<div style="width:46%; float: left;margin-bottom:5px;" class="bill-to">
			
			 <p style="font-size:14px;line-height:17px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p> 
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height: 17px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:bold"> '.$invoice_basic_data[0]['name'].'</strong> <br> 
			<span style="font-size:	13.3167px"> '.$invoice_basic_data[0]['billing_address_street'].'<br> '.$invoice_basic_data[0]['billing_address_city'].'<br> '.$invoice_basic_data[0]['state_name'].',
			'.$invoice_basic_data[0]['country_name'].'<br>'.'<b>GST ID: </b>'.$invoice_basic_data[0]['gst_id'].' </span>
			</address>
			</div> 
			
			<div style="width:38%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div"> 
			
			<table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0; " class="invoice-id"> 
			
			<thead>
			<tr>
				<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px" class="id-left"> Order No: </td> 
				
				<td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px " class="id-rt"> '.$invoice_basic_data[0]['salesorder_no'].' </td>
			</tr> 


			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-size:13px; line-height:17px; font-weight:bold" class="id-left"> Terms: </td>

			   	<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px " class="id-rt"> '.$invoice_basic_data[0]['terms_name'].' </td>
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif;font-weight:bold; font-size:13px; line-height:17px;" class="id-left"> Due Date: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
			</tr> 

			
			
			<tr> 
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Order Date: </td>


			<td style="text-align:left;vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			
			
			
			
			<tr> 
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Delivery Date: </td>

			<td style="text-align:left;vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			</tr>
			
			
			<tr>
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Phone: </td> 
			
			<td style="text-align:left;   vertical-align:top; font-family: sans-serif;font-size:13px " class="id-rt"> '.$invoice_basic_data[0]['contact_phone'].' </td> 
			
			</tr> 
			
			
			<tr> 
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Email: </td>
			
			<td style="text-align:left; vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.$invoice_basic_data[0]['contact_email'].' </td> 
			</tr> 
			
			
			<tr>
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Place of Supply: </td> 
			
			<td style="text-align:left; vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> 
			
			</thead>
			
			</table>
			
			</div>
			</div>
			
			
		
			<!-- Middle Section end -->

			<!-- ship address Section Start -->
			
			
			<div style="padding:0;"> 
			
			<div style="width:100%;margin-bottom:15px; display:inline-block;margin-top:-45px;" class="bill-to">
			
			 <p style="font-size:14px;line-height:14px; font-weight:bold; font-family: sans-serif; margin-bottom:5px"> Ship To: </p>
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height: 18px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:bold"> '.$invoice_basic_data[0]['name'].'</strong> <br> <span style="font-size:	13.3167px"> '.$invoice_basic_data[0]['shipping_address_street'].'<br> '.$invoice_basic_data[0]['shipping_address_city'].'<br> '.$invoice_basic_data[0]['state_name'].',
			'.$invoice_basic_data[0]['country_name'].'<b>GST ID: </b>'.$invoice_basic_data[0]['gst_id'].' </span>
			</address>
			</div> 
			
			
			<!-- ship address Section end -->


			 <div style="width:100%; float:left" class="mobile-scroll-view">
			 
			 <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table;" class="invoice-table"> 
			 
			 <thead> 
			 
			 <tr style="background-color:#000!important; ;"> 
			 
			 
			 <th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th> 
			 
			 
			 <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:250px "> Item &amp;
			Description </th> 
			
			 
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Qty </th> 
			
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>
			
				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';

			}

			else {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
			}

				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:13px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
			</tr>
			</thead> 
			<tbody>';

			$i = 1;
		   foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			
			$invoiceview .='<tr>
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td>


			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:13px;  color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['nick_name'].'</strong> <br> <span style="color:#727272"> </span> </td>
			
			
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].' '.$values['unit_name'].'</td> 
			
			
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>
			
			
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span></td>';

			}
			else {
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>';
			}
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
			</tr>';
			$i++;
			}

			$invoiceview .='</tbody>
			</table> </div>
			 <div style="margin-top:10px; width:100%;display:block ;"> 
			 
			 <div style="width:49.7179%; min-height: 30px; float: left;"> 
			 
			 <p style="font-size:13px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> </div> <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total"> <div> 
			 
			 
			 <table style="float:right"> 
			 
			 <tbody>

			 <tr> <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td> 
			 
			 <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td> 
			 
			 </tr>

			 <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
					
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
				</tr>';


			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}
			 
			$invoiceview .= '<tr>
			 <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td> 
			 
			 
			 <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td> </tr> 
			 
			 
			 <tr>
			 <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td> 
			 
			 
			 <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td> 
			 </tr>



			 <tr> <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px; ; border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong> Total </strong> <br><br> <strong>  Inwords </strong></td> 
			 
			 
			 <td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px; border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong> <br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p>
			  </td> </tr> 
			 
			 </tbody> 
			 </table> 
			 </div> 
			 </div> 
			 </div> 
			 <div style="clear:both"> </div> 
			 </div>
		</div>
		</div>';
		}

		else if($franchise_basic_data[0]['opt_type'] == "Customer" && $franchise_basic_data[0]['invoice_type'] == "Kit"){
			//echo "Customer Kit";

			$invoiceview='<div class="mail-body-content">
		
			<div class="col-lg-12">

			<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice"> <div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec"> <div style="padding:0 0px;"> <div style="width:54%;float: left;" class="logo-div"> <p style="font-size:10px;color:#fff; margin-bottom:8px;"> <img style=" width:auto;height:85px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p> </div> <div style="width:33%; float:right; text-align:right" class="marketd-by">
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->
			
			
			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px; margin-top:3px;" class="address-top">
		
			
			<span  style="font-weight:bold;  line-height:25px!important;font-size:13px">'.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br>'.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> 
			
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif; margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:5px"> Email: '.$invoice_basic_data[0]['company_email'].' </p> </address> </div> </div> </div>
			
			<!-- Invoice Header Section End -->
			
			<!---- Invoice border Section ----->
			
			<div style="width:100%;display:table;" class="invoice-top-border"> <div style="display: block; float: left; width:38%;" class="invoice-border-left"> 
			
			<hr style="border: 1px solid #1e1d1c !important; color: #1e1d1c;"> 
			</div> 
			
			<div style="display: block; float: left; width:23%" class="invoice-border-mid">
			
			<h3 style="color: #333333; line-height:10px;  margin-top:6px !important;text-align: center !important; font-weight:500; font-size:15px; font-family: sans-serif;margin-left:25px;"> INVOICE </h3> </div> 
			
			
			<div style="display: block; float: left; width:38%;" class="invoice-border-right"> <hr style="border: 1px solid #1e1d1c !important;color: #1e1d1c;">
			</div>
			

			</div> 
			
			
			<!-----Invoice border section end ------>

			<!-- Middle Section Start -->
			<div style="padding:0;"> 
			
			<div style="width:46%; float: left;margin-bottom:5px;" class="bill-to">
			
			 <p style="font-size:14px;line-height:17px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p> 
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height: 17px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:bold"> '.$invoice_basic_data[0]['name'].'</strong> <br> 
			<span style="font-size:	13.3167px"> '.$invoice_basic_data[0]['billing_address_street'].'<br> '.$invoice_basic_data[0]['billing_address_city'].'<br> '.$invoice_basic_data[0]['state_name'].',
			'.$invoice_basic_data[0]['country_name'].'<b>GST ID: </b>'.$invoice_basic_data[0]['gst_id'].' </span>
			</address>
			</div> 
			
			<div style="width:38%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div"> 
			
			<table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0; " class="invoice-id"> 
			
			<thead>
			<tr>
				<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:13px" class="id-left"> Order No: </td> 
				
				<td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px " class="id-rt"> '.$invoice_basic_data[0]['salesorder_no'].' </td>
			</tr> 


			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-size:13px; line-height:17px; font-weight:bold" class="id-left"> Terms: </td>

			   	<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px " class="id-rt"> '.$invoice_basic_data[0]['terms_name'].' </td>
			</tr> 

			<tr> 
			   	<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif;font-weight:bold; font-size:13px; line-height:17px;" class="id-left"> Due Date: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
			</tr> 

			
			
			<tr> 
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Order Date: </td>


			<td style="text-align:left;vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			
			
			
			
			<tr> 
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Delivery Date: </td>

			<td style="text-align:left;vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			</tr>
			
			
			<tr>
			<td style="text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Phone: </td> 
			
			<td style="text-align:left;   vertical-align:top; font-family: sans-serif;font-size:13px " class="id-rt"> '.$invoice_basic_data[0]['contact_phone'].' </td> 
			
			</tr> 
			
			
			<tr> 
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Email: </td>
			
			<td style="text-align:left; vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.$invoice_basic_data[0]['contact_email'].' </td> 
			</tr> 
			
			
			<tr>
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold;font-size:13px" class="id-left"> Place of Supply: </td> 
			
			<td style="text-align:left; vertical-align:top; font-family: sans-serif;font-size:13px" class="id-rt"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> 
			
			</thead>
			
			</table>
			
			</div>
			</div>
			
			
		
			<!-- Middle Section end -->
			
			<!-- ship address Section Start -->
			
			
			<div style="padding:0; clear:both"> 
			
			<div style="width:100%;margin-bottom:15px; display:inline-block" class="bill-to">
			
			 <p style="font-size:14px;line-height:14px; font-weight:bold; font-family: sans-serif; margin-bottom:5px"> Ship To: </p>
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height: 18px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:13px;">
			
			<strong style="font-weight:bold"> '.$invoice_basic_data[0]['name'].'</strong> <br> <span style="font-size:	13.3167px"> '.$invoice_basic_data[0]['shipping_address_street'].'<br> '.$invoice_basic_data[0]['shipping_address_city'].'<br> '.$invoice_basic_data[0]['state_name'].',
			'.$invoice_basic_data[0]['country_name'].'<b>GST ID: </b>'.$invoice_basic_data[0]['gst_id'].' </span>
			</address>
			</div> 
			
			
			<!-- ship address Section end -->


			<div style="width:100%; float:left" class="mobile-scroll-view invoice-admin-sales"> <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table;" class="invoice-table"> <thead> <tr style="background-color:#000!important; ;"> <th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th> <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:300px "> kit &amp; Description </th>

			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">Kit Qty </th>

			 <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>

				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';
			} else {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
				}

				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:14px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
				</tr>
				</thead>
				<tbody>';
			$i = 1;
		   	foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			
				$invoiceview .='<tr>
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td>

				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:13px;  color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['kit_name'].'</strong> <br> <span style="color:#727272"> </span>
				</td>
				
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].' '.$values['unit_name'].'</td>
				 <td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

				if($invoice_basic_data[0]['state_status'] == "samestate") {
					$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>

					<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span></td>';

				}
				else {
					$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>';
				}
				$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:13px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
				</tr>';
				$i++;
				}

			$invoiceview .='</tbody>
				</table> </div>
				 <div style="margin-top:10px; width:100%;display:block ;"> <div style="width:49.7179%; min-height: 30px; float: left;"> <p style="font-size:13px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> </div> <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total"> <div> <table style="float:right">
				  <tbody> 
				  <tr> 
				  <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td>
				   <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td> 
				   </tr>
				   <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
					
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
				</tr>';

			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>

					<td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}

				$invoiceview .= '<tr>
				    <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td> 

				    <td style=" text-align:right;width:160px;font-size:13px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td>
				    </tr> 
				    <tr> 
				    <td style="text-align:left; width:160px;font-size:13px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td>

				    <td style=" text-align:right;width:160px;font-size:13px; color:#333;vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td> 
				    </tr>
				    <tr>
				      <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px; ; border-top:1px solid #1e1d1c !important; border-bottom:1px solid #1e1d1c !important"> <strong> Total </strong><br><br> <strong>  Inwords 
				      </strong> </td>

				<td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px; border-top:1px solid #1e1d1c !important; border-bottom:1px solid #1e1d1c !important"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong><br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p>
				</td>
				        </tr> </tbody> </table> </div> </div> </div> <div style="clear:both"> </div> 
				 </div>
			</div>
			</div>';
		}

		//for company product


		else if($franchise_basic_data[0]['opt_type'] == "Company" && $franchise_basic_data[0]['invoice_type'] == "Product"){ 
			//echo "company product";
		
		$invoiceview = '<div class="mail-body-content">

			<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice">

			<div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec"> 

			<div style="padding:0 0px;"> <div style="width:54%;float: left;" class="logo-div">
			  <p style="color:#fff; margin-bottom:8px;"> 
			  <img style=" width:auto;height:60px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p>
			</div>

			<div style="width:33%; float:right; text-align:right" class="marketd-by">
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->
			
			
			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px!important; margin-top:3px;" class="address-top"> 
			
			<span style="font-weight:bold;font-size:13px!important">'.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br>'.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' <p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> <p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> <p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> Email: '.$invoice_basic_data[0]['company_email'].' </p> 
			</address>
			

			
			 </div> </div> </div>
			<!-- Invoice Header Section End -->

			<!---- Invoice border Section ----->
			
			
		  <div style="width:100%;display:table;" class="invoice-top-border">


		  <div style="display: block; float: left; width:38%;" class="invoice-border-left">

			<hr style="border: 1px solid #1e1d1c; color: #1e1d1c;"> </div> 
			
			<div style="display: block; float: left; width:23%" class="invoice-border-mid"> 
			
			
			<h3 style="color: #333333; line-height:10px; margin-left:20px;  margin-top:5px !important;text-align: center !important; font-weight:bold!important; font-size:17px; font-family: sans-serif;"> INVOICE </h3> </div> 
			
			
			<div style="display: block; float: left; width:38%;" class="invoice-border-right"> <hr style="border: 1px solid #1e1d1c;color: #1e1d1c;"> </div>

			 </div>
			 
			 
			 <!-----Invoice border section end ------>

			<!-- Middle Section Start -->
			
			<div style="padding:0;">
			
			 <div style="width:50%; float: left;margin-bottom:0px;" class="bill-to">
			 
			 
			 <p style="font-size:14px;line-height:25px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p>

			<address style="text-align:left;display:block;font-weight:normal;line-height:17px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:12px!important;"> '.$invoice_basic_data1[0]['company_name'].'</strong> 
			
			<br> 
				<span style="font-size:12px!important"> '.$invoice_basic_data1[0]['company_address'].'
				<br> '.$invoice_basic_data1[0]['company_city'].'
				<br> '.$invoice_basic_data1[0]['state_name'].','.$invoice_basic_data1[0]['country_name'].'<b>GST ID: </b>'.$invoice_basic_data1[0]['gst_id'].' </span>
			</address>
			
			
			</div> 
			
			
			<div style="width:45%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div">

			 <table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0;" class="invoice-id"> 
			 <thead>
			  <tr>
			   <td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> Order No: </td> 

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.$invoice_basic_data[0]['salesorder_no'].' </td> 
			   </tr> 
			<tr> 

			<tr> 
		   		<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif;font-size:12px;line-height:17px;font-weight:bold"> Terms: </td> 
				
				<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px;" class="id-rt"> '.$invoice_basic_data[0]['terms_name'].' </td>
				
		    </tr> 
		    <tr> 
		   		<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-size:12px; line-height:17px;font-weight:bold" class="id-left"> Due Date: </td> 
				
				<td style=" text-align:left;  vertical-align:top; font-family: sans-serif; font-size:13px; line-height:17px;" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
		    </tr> 

		    <tr>
				<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px;line-height:17px;font-weight:bold;" class="id-left"> Order Date: </td>
				 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			<tr> 
				<td style="text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px;font-weight:bold;" class="id-left"> Delivery Date: </td> 
				
				<td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			</tr>

			<tr>
				<td style=" text-align:left; vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> Phone: </td>
				 <td style="text-align:left; vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px" class="id-rt"> '.$invoice_basic_data1[0]['company_contact_no'].' </td>
			</tr>
			<tr> 
				<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> Email: </td>

				 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px" class="id-rt"> '.$invoice_basic_data1[0]['company_email'].' </td> 
			</tr>

			<tr>
			 <td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> Place of Supply: </td>

			  <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px" class="id-rt"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> 
			</thead>
			</table></div>
			</div>
			<!-- Middle Section end -->

			<!-- ship address Section Start -->
			
			<div style="padding:0;margin-top:-40px;">
		
			 <div style=" width:50%;margin-bottom:15px;" class="bill-to">
			 
			 <p style="font-size:14px;line-height:14px;font-weight:bold;font-family:sans-serif;margin-bottom:5px"> Ship To: </p>

			<address style="text-align:left;display:block;font-weight:normal;line-height: 17px; margin-bottom:5px; color:#333; font-style:bold;  font-family: sans-serif; font-size:12px;"><strong style="font-weight:bold"> '.$invoice_basic_data1[0]['company_name'].'</strong> <br> <span style="font-size:12px"> '.$invoice_basic_data1[0]['company_address'].'<br> '.$invoice_basic_data1[0]['company_city'].'<br> '.$invoice_basic_data1[0]['state_name'].','.$invoice_basic_data1[0]['country_name'].'<b>GST ID: </b>'.$invoice_basic_data1[0]['gst_id'].' </span> 
			
			</address>

			</div> 
			
	
			<!-- ship address Section end -->

		<div style="width:100%; float:left" class="mobile-scroll-view invoice-admin-sales"> <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table;" class="invoice-table"> <thead> <tr style="background-color:#000!important; ;">

		 <th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th> 

		 <th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:250px ">
		  Item &amp;Description </th>

			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Qty </th>

			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>

				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';
			}

			else {
			$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
			}

			$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
			</tr>
		    </thead>
		    <tbody>';
			$i = 1;
		   foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			
			$invoiceview .='<tr>
			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td> 

			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:12px;  color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['nick_name'].'</strong> <br> <span style="color:#727272"> </span> </td>

			 <td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].'</td>

			  <td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

			if($invoice_basic_data[0]['state_status'] == "samestate"){
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'<br><span style="color:#727272">'.$taxpercent.'</span></td>

			<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span></td>';

			}
			else {
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'<br><span style="color:#727272">'.$taxpercent.'</span></td>';
			}
			$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
			</tr>';
			$i++;
			}

			$invoiceview .='</tbody>
			</table> </div>
			
			
			
			 <div style="margin-top:10px; width:100%;display:block ;"> 
			 <div style="width:49.7179%; min-height: 30px; float: left;"> <p style="font-size:13px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> 
			 </div>
			 <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total">
			  <div>
			  <table style="float:right">
			  <tbody>
			  	<tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td>

					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td>
			 	 </tr>
			 	 <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
				</tr>';

			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>
					
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}

			$invoiceview .= '<tr>
			        <td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td> 

			        <td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td>
			    </tr>

			    <tr>
			        <td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td>

			        <td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td>
			    </tr> 

			    <tr>
			       <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px; border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong> Total </strong> <br><br> <strong>  Inwords </strong> </td>

			        <td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px;border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong><br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p>
			         </td> 
			    </tr>
			    </tbody> 
			    </table>
			    </div> </div> </div> <div style="clear:both"> </div> 
			 </div>
		</div>
		</div>';

		//for customer kit

		} else if($franchise_basic_data[0]['opt_type'] == "Company" && $franchise_basic_data[0]['invoice_type'] == "Kit"){
			

			///echo "company Kit";
			
			$invoiceview='<div class="mail-body-content">
		

			<div style="max-width:800px; margin:0 auto;" class="invoice-box sec-invoice">

			 <div style="float:left;width:100%; padding:5px 0; padding-bottom:5px;" class="invoice-top-sec">
			 
			  <div style="padding:0 0px;"> 
			  
			  <div style="width:54%;float: left;" class="logo-div"> 
			  
			  <p style="color:#fff; margin-bottom:8px;"> 
			  
			  <img style=" width:auto;height:60px;" src="'.base_url().'assets/logo/'.$invoice_basic_data[0]['logo_name'].'"> </p> </div> <div style="width:33%; float:right; text-align:right" class="marketd-by">
			  
			  
			<!--- <strong style="font-size:13px;line-height:20px; font-family: sans-serif; color:#333"> M/S By: 
			</strong> --->
			
			<address style="display:block;font-weight:normal;line-height:17px; margin-bottom:0px; color:#333; font-style:normal; font-family: sans-serif; font-size:12px!important; margin-top:3px;" class="address-top"> 
			
			<span style="font-weight:bold;font-size:12px!important">'.$invoice_basic_data[0]['company_name'].' </span> <br> '.$invoice_basic_data[0]['company_address'].'<br>'.$invoice_basic_data[0]['country_name'] .' '. $invoice_basic_data[0]['company_pincode'].' 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:0px"> GST ID.:'.$invoice_basic_data[0]['gst_id'].'</p> 
			
			<p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif; margin-top:0px; margin-bottom:0px"> Phone: '.$invoice_basic_data[0]['company_contact_no'].' </p> <p style="font-size:12px;line-height:17px; font-weight:normal;  font-family: sans-serif;margin-top:0px; margin-bottom:5px"> Email: '.$invoice_basic_data[0]['company_email'].' </p> </address> </div> </div> </div>
			
			<!-- Invoice Header Section End -->

			<!---- Invoice border Section -----> 
			
			
			<div style="width:100%;display:table;" class="invoice-top-border"> 

		  <div style="width:100%;display:table;" class="invoice-top-border"> <div style="display: block; float: left; width:38%;" class="invoice-border-left"> 
			
			<hr style="border: 1px solid #1e1d1c; color: #1e1d1c;">

			</div>
			<div style="display: block; float: left; width:23%" class="invoice-border-mid"> <h3 style="color: #333333; line-height:10px; margin-left:20px;  margin-top:5px !important;text-align: center !important; font-weight:500; font-size:17px; font-family: sans-serif;"> INVOICE </h3> 
			</div>

			<div style="display: block; float: left; width:38%;" class="invoice-border-right"> <hr style="border: 1px solid #1e1d1c;color: #1e1d1c;"> </div>

			</div> 

			<!-----Invoice border section end ------>

			<!-- Middle Section Start -->
			
			<div style="padding:0;"> <div style="width:48%; float: left;margin-bottom:0px;" class="bill-to">
			
			 <p style="font-size:14px;line-height:25px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Bill To: </p>

			<address style="text-align:left;display:block;font-weight:normal;line-height:18px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:12px!important;"><strong style="font-weight:bold"> '.$invoice_basic_data1[0]['company_name'].'</strong> <br>

		<span style="font-size:	12px"> '.$invoice_basic_data1[0]['company_address'].'<br> '.$invoice_basic_data1[0]['company_city'].'<br> '.$invoice_basic_data1[0]['company_state'].','.$invoice_basic_data1[0]['company_country'].'<b>GST ID: </b>'.$invoice_basic_data1[0]['gst_id'].' </span>
			</address>

			</div>

			
			<div style="width:45%; float:right; text-align:left; margin-top:5px;" class="invoice-details-div">

			<table style="float:left; margin-bottom:0px;  border-radius:4px; max-width:100%; border-spacing:0; " class="invoice-id">
			<thead>
			
			   	<tr> 
			   		<<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">  Order No: </td> 
					
					 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt">  '.$invoice_basic_data[0]['salesorder_no'].' </td>
			    </tr> 
				
			    <tr> 
			   		<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">  Terms: </td> 
					
					
					 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt">  '.$invoice_basic_data[0]['terms_name'].' </td>
			    </tr> 
				
			    <tr> 
			   		 <td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">   Due Date: </td> 
					
					
					 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt">  '.date("d-M-y", strtotime($invoice_basic_data[0]['paymentdue_date'])).' </td>
					
			    </tr> 
			<tr> 
			
		<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> 
		
		Order Date: </td> 
		
		
		 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:13px; line-height:17px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['salesorder_date'])).' </td>
			</tr>
			
			
			<tr> 
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left"> Delivery Date: </td> 
			
			
			 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.date("d-M-y", strtotime($invoice_basic_data[0]['sales_shipment_date'])).' </td>
			</tr>
			<tr>
			<td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">   Phone: </td>

			 <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.$invoice_basic_data1[0]['company_contact_no'].' </td>
			 </tr>

			 
			 <tr> <td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">  Email: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.$invoice_basic_data1[0]['company_email'].' </td> </tr> 

			  <tr> <td style="text-align:left;  vertical-align:top; text-align:left; font-family: sans-serif; font-weight:bold; font-size:12px; line-height:17px" class="id-left">  Place of Supply: </td>

			   <td style=" text-align:left;  vertical-align:top; font-family: sans-serif;font-size:12px; line-height:17px" class="id-rt"> '.$invoice_basic_data[0]['placeofsupply'].'</td>
			</tr> </thead></table></div>

			</div>
			<!-- Middle Section end -->

			<!-- ship address Section Start -->
			
			<div style="padding:0;"> <div style="width:50%;margin-bottom:15px;margin-top:-45px!important;" class="bill-to">
			
			 <p style="font-size:14px;line-height:17px; font-weight:bold; font-family: sans-serif;margin-top:10px; margin-bottom:5px"> Ship To: </p> 
			 
			 
			<address style="text-align:left;display:block;font-weight:normal;line-height:17px; margin-bottom:5px; color:#333; font-style:normal;  font-family: sans-serif; font-size:12px!important;"><strong style="font-weight:bold"> '.$invoice_basic_data1[0]['company_name'].'</strong> <br> <span style="font-size:12px"> '.$invoice_basic_data1[0]['company_address'].'<br> '.$invoice_basic_data1[0]['company_city'].'<br> '.$invoice_basic_data1[0]['company_state'].','.$invoice_basic_data1[0]['company_country'].'<b>GST ID: </b>'.$invoice_basic_data1[0]['gst_id'].' </span>
			</address>
			</div> 
			</div>
			
			<!-- ship address Section end -->

			<div style="width:100%; float:left" class="mobile-scroll-view invoice-admin-sales"> <table style="width:100%; margin-bottom:15px;  border:1px solid #1e1d1c; border-radius:4px; max-width:100%; border-spacing:0; display:table;" class="invoice-table"> <thead> <tr style="background-color:#000!important; ;"> 

			<th style="border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold "> # </th>

			
			
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:left;font-family: sans-serif; font-weight:bold;width:230px "> kit &amp; Description </th>
			
				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold; ">Kit Qty </th> 
				
				
				
				<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> Rate </th>';

			if($invoice_basic_data[0]['state_status'] == "samestate") {
			$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  CGST  </th>
			
			<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold "> SGST </th>';
			
			} else {
				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  IGST  </th>';
				}

				$invoiceview .='<th style="border-left:1px solid #fff; border-top:1px solid #1e1d1c;padding:8px; line-height:20px; color:#fff; font-size:12px; vertical-align:top; text-align:right;font-family: sans-serif; font-weight:bold ">  Amount </th>
			</tr>
			</thead>
			
			<tbody>';
			$i = 1;
		   foreach($invoice_product_data as $values){
			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction']/2 .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue/2), 2);
				}
			}else{
				if($values['taxdeduction']!=0){
				$taxpercent = '('.$values['taxdeduction'] .'%)';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_amount'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount'] / 100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}else{
			    $taxpercent = '';
				if($invoice_basic_data[0]['discount']!=0){
				if($invoice_basic_data[0]['discount_type'] == "percentage"){
				$calculatevalue = round(($values['total_amount'] * $invoice_basic_data[0]['discount']/100), 2);
				}else{
				$calculatevalue = round(($values['total_amount'] - $invoice_basic_data[0]['discount']), 2);	
				}}else{
				$calculatevalue = 0;
				}
				if($invoice_basic_data[0]['item_rates_are'] == "Exclusive"){
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/100 , 2);
				}else{
				$calculategstvalue = round((($values['total_amount'] - $calculatevalue) * $values['taxdeduction'])/(100 + $values['taxdeduction']) , 2);
				}
				$taxamount = round(($calculategstvalue), 2);
				}
			}
			

				$invoiceview .='<tr>
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;">'.$i.'</td>

				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; border-left:1px solid #1e1d1c;  padding-top:20px;font-size:12px;  color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> <strong style="font-size:13px; font-weight:400; font-family: sans-serif;">'.$values['kit_name'].'</strong> <br> <span style="color:#727272"> </span>
				</td>
				
				<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px; border-left:1px solid #1e1d1c">'.$values['quantity'].' '.$values['unit_name'].'</td>
				 <td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$values['product_rate'].'</td>';

				if($invoice_basic_data[0]['state_status'] == "samestate") {
					$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>

					<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.' <br><span style="color:#727272">'.$taxpercent.'</span></td>';

				}
				else {
					$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">'.$taxamount.'	<br><span style="color:#727272">'.$taxpercent.'</span></td>';
				}
					$invoiceview .='<td style=" border-bottom:none; border-top:none; height:55px; vertical-align:top; padding-top:20px; font-size:12px; color:#333;  vertical-align:top; text-align:right;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;border-left:1px solid #1e1d1c">₹ '.$values['total_amount'].'</td>
				</tr>';
				$i++;
				}

			$invoiceview .='</tbody>
				</table> </div>
				 <div style="margin-top:10px; width:100%;display:block ;"> <div style="width:49.7179%; min-height: 30px; float: left;"> <p style="font-size:12px; color:#333;font-family: sans-serif;"> Thanks for your business. </p> </div> <div style="width:49.7179%; min-height: 30px; float:right" class="customer-invoice-gst-total"> <div> <table style="float:right">
				<tbody> 
				  <tr> 
				 <td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;font-weight:bold"> Sub Total <br><span style="font-size: 10px">'.$tax_type .'</span></td>
				  
				  
				 <td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:8px;"> ₹ '.round($invoice_basic_data[0]['subtotal'],2).' </td> 
				   </tr>

				 <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:9px;font-weight:bold;" class="no-line"> Discount('.$invoice_basic_data[0]['discount'].$discount_icon.') <br><span style="font-size: 10px">'.$discount_apply_amount.'</span>  </td>
					
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['discount_amount'],2).' </td>
				</tr>';

			if($invoice_basic_data[0]['state_status'] == "samestate"){
				if($invoice_basic_data[0]['gst_5']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_5']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [2.5%]    </td>
						<td style=" text-align:right;width:160px;font-size:122px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [2.5%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_12']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_12']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [6%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [6%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_18']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_18']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [9%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [9%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
				
				if($invoice_basic_data[0]['gst_28']!=0){
				$gst_amount = round(($invoice_basic_data[0]['gst_28']/2),2);
				$invoiceview .=' <tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> CGST [14%]    </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>
						
						<tr>
						<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> SGST [14%]     </td>
						<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
						</tr>';
				}
		}else{
			
			if($invoice_basic_data[0]['gst_5']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_5']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [5%]    </td>
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}
		
	        if($invoice_basic_data[0]['gst_12']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_12']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [12%]    </td>
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
			

	        if($invoice_basic_data[0]['gst_18']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_18']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [18%]    </td>
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}

			 if($invoice_basic_data[0]['gst_28']!=0){
			$gst_amount = round(($invoice_basic_data[0]['gst_28']),2);
			$invoiceview .=' <tr>
					<td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold"> IGST [28%]    </td>
					<td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;"> ₹ '.$gst_amount.' </td>
					</tr>';
			}		
		}

				$invoiceview .=' <tr> 
				    <td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Adjustment </td> 
				    <td style=" text-align:right;width:160px;font-size:12px; color:#333;  vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['adjustment'],2).' </td>
				    </tr> 
				    <tr> 
				    <td style="text-align:left; width:160px;font-size:12px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;font-weight:bold;" class="no-line"> Shipping Charge </td>
				     <td style=" text-align:right;width:160px;font-size:12px; color:#333;vertical-align:top;font-family: sans-serif; padding-right:8px; padding-left:8px; padding-bottom:5px;" class="no-line">₹ '.round($invoice_basic_data[0]['shipping_charge'],2).' </td> 
				    </tr>
				    <tr>
				    <td style="width:160px; text-align:left;font-size:14px; color:#333;  vertical-align:top; text-align:left;font-family: sans-serif; padding:8px; ; border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong> Total </strong><br><br> <strong>  Inwords </strong> </td> 
					   
					   
					 <td style="widht:160px;text-align:right;font-size:14px; color:#333;  vertical-align:top;font-family: sans-serif; padding:8px;border-top-width:1px!important;border-top-style:solid; border-top-color:#1e1d1c; border-bottom-width:1px; border-bottom-style:solid; border-bottom-color:#1e1d1c;"> <strong>₹ '.round($invoice_basic_data[0]['total'],2).' </strong> <br><br><p>'.ucwords($Rupees .'Rupees Only /-').'</p>
					 </td>
				    </tr> </tbody> </table> </div> </div> </div> <div style="clear:both"> </div> 
				 </div>
			</div>
			</div>';
		}

/*				
	echo $invoiceview; 
	die();		
*/
require_once("assets/mpdf/mpdf.php");

$mpdf = new mPDF();
$mpdf->WriteHTML($invoiceview);


//call watermark content aand image
$mpdf->SetWatermarkText('');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$invoice_name = str_replace('/', '-', $invoice_basic_data[0]['salesorder_no']);

if($nature == 'storepfdfile'){
//save the file put which location you need folder/filname
$mpdf->Output('assets/salesinvoicepdf/'.$invoice_name.'.pdf', 'F');
}else{
//out put in browser below output function
$mpdf->Output($invoice_basic_data[0]['salesorder_no'].'.pdf', 'd');
}

?>

 