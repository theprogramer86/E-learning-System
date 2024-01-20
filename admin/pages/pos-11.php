
<?php
session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = '';
$ename = '';


if($_SESSION["Company"])
    $company = $_SESSION["Company"];

$items = array();

$i_sqlddd = "SELECT * FROM item where company = '".$company."'";
    $i_resultdd = $conn->query($i_sqlddd);
    while($row = $i_resultdd->fetch_assoc()) {
        array_push($items,$row);
    }
    
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="ju2WNHRGZ4w5AhZFoyYGufDS3EcvqXCYLEILWe1W">

        <title>POS - Selrom Pvt Ltd</title>
        
        <link rel="stylesheet" href="pos/vendor.css?v=37">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!-- include module css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- app css -->
<link rel="stylesheet" href="pos/app.css?v=37">

	<style type="text/css">
		.content{
			padding-bottom: 0px !important;
		}
	</style>
<style type="text/css">
	/*
	* Pattern lock css
	* Pattern direction
	* http://ignitersworld.com/lab/patternLock.html
	*/
	.patt-wrap {
	  z-index: 10;
	}
	.patt-circ.hovered {
	  background-color: #cde2f2;
	  border: none;
	}
	.patt-circ.hovered .patt-dots {
	  display: none;
	}
	.patt-circ.dir {
	  background-position: center;
	  background-repeat: no-repeat;
	}
	.patt-circ.e {
	  -webkit-transform: rotate(0);
	  transform: rotate(0);
	}
	.patt-circ.s-e {
	  -webkit-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
	.patt-circ.s {
	  -webkit-transform: rotate(90deg);
	  transform: rotate(90deg);
	}
	.patt-circ.s-w {
	  -webkit-transform: rotate(135deg);
	  transform: rotate(135deg);
	}
	.patt-circ.w {
	  -webkit-transform: rotate(180deg);
	  transform: rotate(180deg);
	}
	.patt-circ.n-w {
	  -webkit-transform: rotate(225deg);
	   transform: rotate(225deg);
	}
	.patt-circ.n {
	  -webkit-transform: rotate(270deg);
	  transform: rotate(270deg);
	}
	.patt-circ.n-e {
	  -webkit-transform: rotate(315deg);
	  transform: rotate(315deg);
	}
</style>

        	<!-- include module css -->
        </head>

    <body class=" hold-transition lockscreen ">
        <div class="wrapper thetop">
            <script type="text/javascript">
                if(localStorage.getItem("upos_sidebar_collapse") == 'true'){
                    var body = document.getElementsByTagName("body")[0];
                    body.className += " sidebar-collapse";
                }
            </script>
                            <!-- default value -->

<input type="hidden" name="transaction_sub_type" id="transaction_sub_type" value="">
<div class="col-md-12 no-print pos-header">
  <div class="row">
    <div class="col-md-6">
      <div class="m-6 mt-5" style="display: flex;">
        <p ><strong>Location: &nbsp;</strong> 
                                  <div style="width: 28%;margin-bottom: 5px;">
               <select class="form-control input-sm" id="select_location_id" required autofocus name="select_location_id"><option value="4" data-receipt_printer_type="browser" data-default_payment_accounts="{&quot;cash&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;card&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;cheque&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;bank_transfer&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;other&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_1&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_2&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_3&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null}}">Selrom Pvt Ltd (PORUR)</option><option value="6" selected="selected" data-receipt_printer_type="browser" data-default_payment_accounts="{&quot;cash&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;card&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;cheque&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;bank_transfer&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;other&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_1&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_2&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_3&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null}}">Selrom Soft (BL0002)</option></select>
            </div>
                      
           &nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y h:i:s A"); ?>
        </p>
      </div>
    </div>
    <div class="col-md-6">
      <a href="/index.php" title="Go Back" class="btn btn-info btn-flat m-6 btn-xs m-5 pull-right">
        <strong><i class="fa fa-backward fa-lg"></i></strong>
      </a>
            <button type="button" id="close_register" title="Close Register" class="btn btn-danger btn-flat m-6 btn-xs m-5 btn-modal pull-right" data-container=".close_register_modal" 
          data-href="/index.php">
            <strong><i class="fa fa-window-close fa-lg"></i></strong>
      </button>
            
      
      <button title="Calculator" id="btnCalculator" type="button" class="btn btn-success btn-flat pull-right m-5 btn-xs mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<div id="calculator">
  <div class="row text-center" id="calc">
    <div class="calcBG col-md-12 text-center">
      <div class="row" id="result">
        <form name="calc">
          <input type="text" class="screen text-right" name="result" readonly>
        </form>
      </div>
      <div class="row">
        <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()">AC</button>
        <button id="clear" type="button" class="btn btn-warning" onclick="clearScreen()">CE</button>
        <button id="%" type="button" class="btn" onclick="calEnterVal(this.id)">%</button>
        <button id="/" type="button" class="btn" onclick="calEnterVal(this.id)">÷</button>
      </div>
      <div class="row">
        <button id="7" type="button" class="btn" onclick="calEnterVal(this.id)">7</button>
        <button id="8" type="button" class="btn" onclick="calEnterVal(this.id)">8</button>
        <button id="9" type="button" class="btn" onclick="calEnterVal(this.id)">9</button>
        <button id="*" type="button" class="btn" onclick="calEnterVal(this.id)">x</button>
      </div>
      <div class="row">
        <button id="4" type="button" class="btn" onclick="calEnterVal(this.id)">4</button>
        <button id="5" type="button" class="btn" onclick="calEnterVal(this.id)">5</button>
        <button id="6" type="button" class="btn" onclick="calEnterVal(this.id)">6</button>
        <button id="-" type="button" class="btn" onclick="calEnterVal(this.id)">-</button>
      </div>
      <div class="row">
        <button id="1" type="button" class="btn" onclick="calEnterVal(this.id)">1</button>
        <button id="2" type="button" class="btn" onclick="calEnterVal(this.id)">2</button>
        <button id="3" type="button" class="btn" onclick="calEnterVal(this.id)">3</button>
        <button id="+" type="button" class="btn" onclick="calEnterVal(this.id)">+</button>
      </div>
      <div class="row">
        <button id="0" type="button" class="btn" onclick="calEnterVal(this.id)">0</button>
        <button id="." type="button" class="btn" onclick="calEnterVal(this.id)">.</button>
        <button id="equals" type="button" class="btn btn-success" onclick="calculate()">=</button>
        <button id="blank" type="button" class="btn">&nbsp;</button>
      </div>
    </div>
  </div>
</div>' data-html="true" data-placement="bottom">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
      </button>

      
      
        
    </div>
    
  </div>
</div>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="">
                <!-- empty div for vuejs -->
                <div id="app">
                                    </div>
                <!-- Add currency related field-->
                <input type="hidden" id="__code" value="INR">
                <input type="hidden" id="__symbol" value="₹">
                <input type="hidden" id="__thousand" value=",">
                <input type="hidden" id="__decimal" value=".">
                <input type="hidden" id="__symbol_placement" value="before">
                <input type="hidden" id="__precision" value="2">
                <input type="hidden" id="__quantity_precision" value="2">
                <!-- End of currency related field-->

                                <section class="content no-print">
	<input type="hidden" id="amount_rounding_method" value="1">
			<input type="hidden" id="is_overselling_allowed">
		        <input type="hidden" id="reward_point_enabled">
        	<form method="POST"  accept-charset="UTF-8" id="add_pos_sell_form"><input name="_token" type="hidden" value="ju2WNHRGZ4w5AhZFoyYGufDS3EcvqXCYLEILWe1W">
	<div class="row mb-12">
		<div class="col-md-12">
			<div class="row">
				<div class=" col-md-7  no-padding pr-12">
					<div class="box box-solid mb-12">
						<div class="box-body pb-0">
							<input id="location_id" data-receipt_printer_type="browser" data-default_payment_accounts="{&quot;cash&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;card&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;cheque&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;bank_transfer&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;other&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_1&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_2&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null},&quot;custom_pay_3&quot;:{&quot;is_enabled&quot;:&quot;1&quot;,&quot;account&quot;:null}}" name="location_id" type="hidden" value="6">
							<!-- sub_type -->
							<input name="sub_type" type="hidden">
							<input type="hidden" id="item_addition_method" value="1">
								<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-user"></i>
				</span>
				<input type="hidden" id="default_customer_id" 
				value="4" >
				<input type="hidden" id="default_customer_name" 
				value="Walk-In Customer" >
				<input type="hidden" id="default_customer_balance" 
				value="0.0000" >
				<select class="form-control mousetrap" id="customer_id" required style="width: 100%;" name="contact_id"><option selected="selected" value="">Enter Customer name / phone</option></select>
				<span class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""  ><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat" data-toggle="modal" data-target="#configure_search_modal" title="Configure product search"><i class="fa fa-barcode"></i></button>
				</div>
				<input class="form-control mousetrap" id="search_product" placeholder="Enter Product name / SKU / Scan bar code"  autofocus name="search_product" type="text">
				<span class="input-group-btn">

					<!-- Show button for weighing scale modal -->
										

				</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
		<input type="hidden" name="pay_term_number" id="pay_term_number" value="">
	<input type="hidden" name="pay_term_type" id="pay_term_type" value="">
	
						<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
										<input id="hidden_price_group" name="hidden_price_group" type="hidden" value="0">
					<select class="form-control select2" id="price_group" name="price_group"><option value="0">Default Selling Price</option><option value="1">Selling Group-1</option></select>
					<span class="input-group-addon">
						<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Selling Price Group in which you want to sell" data-html="true" data-trigger="hover"></i>					</span> 
				</div>
			</div>
		</div>
		
			<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-external-link-square-alt text-primary service_modal_btn"></i>
					</span>
					<select class="form-control" id="types_of_service_id" style="width: 100%;" name="types_of_service_id"><option selected="selected" value="">Select types of service</option></select>

					<input id="types_of_service_price_group" name="types_of_service_price_group" type="hidden">

					<span class="input-group-addon">
						<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Type of service means services like dine-in, parcel, home delivery, third party delivery etc." data-html="true" data-trigger="hover"></i>					</span> 
				</div>
				<small><p class="help-block hide" id="price_group_text">Price Group: <span></span></p></small>
			</div>
		</div>
		<div class="modal fade types_of_service_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
	
			<!-- Call restaurant module if defined -->
        	<div class="clearfix"></div>
    	<span id="restaurant_module_span">
      		<div class="col-md-3"></div>
    	</span>
        
</div>
<!-- include module fields -->
<div class="row">
	<div class="col-sm-12 pos_product_div">
		<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="includes">

		<!-- Keeps count of product rows -->
		<input type="hidden" id="product_row_count" 
			value="0">
				<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
			<thead>
				<tr>
					<th class="tex-center  col-md-4 ">	
						Product <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Click <i>product name</i> to edit price, discount & tax. <br/>Click <i>Comment Icon</i> to enter serial number / IMEI or additional note.<br/><br/>Click <i>Modifier Icon</i>(if enabled) for modifiers" data-html="true" data-trigger="hover"></i>					</th>
					<th class="text-center col-md-3">
						Quantity					</th>
										<th class="text-center col-md-2 ">
						Price inc. tax					</th>
					<th class="text-center col-md-2">
						Subtotal					</th>
					<th class="text-center"><i class="fas fa-times" aria-hidden="true"></i></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
								<div class="row">
	<div class="col-md-12">
		<table class="table table-condensed">
			<tr>
				<td><b>Items:</b>&nbsp;
					<span class="total_quantity">0</span></td>
				<td>
					<b>Total:</b> &nbsp;
					<span class="price_total">0</span>
				</td>
			</tr>
			<tr>
				<td>
					<b>
													Discount							<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Set 'Default Sale Discount' for all sales in Business Settings. Click on the edit icon below to add/update discount." data-html="true" data-trigger="hover"></i>																			Loyalty_Point
												(-):
						<i class="fas fa-edit cursor-pointer" id="pos-edit-discount" title="Edit Discount" aria-hidden="true" data-toggle="modal" data-target="#posEditDiscountModal"></i>
							<span id="total_discount">0</span>
							<input type="hidden" name="discount_type" id="discount_type" value="percentage" data-default="percentage">

							<input type="hidden" name="discount_amount" id="discount_amount" value=" 0.00 " data-default="0.00">

							<input type="hidden" name="rp_redeemed" id="rp_redeemed" value="0">

							<input type="hidden" name="rp_redeemed_amount" id="rp_redeemed_amount" value="0">

							</span>
					</b> 
				</td>
				<td class="">
					<span>
						<b>Order Tax(+): <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Set 'Default Sale Tax' for all sales in Business Settings. Click on the edit icon below to add/update Order Tax." data-html="true" data-trigger="hover"></i></b>
						<i class="fas fa-edit cursor-pointer" title="Edit Order Tax" aria-hidden="true" data-toggle="modal" data-target="#posEditOrderTaxModal" id="pos-edit-tax" ></i> 
						<span id="order_tax">
															0
													</span>

						<input type="hidden" name="tax_rate_id" 
							id="tax_rate_id" 
							value="  " 
							data-default="">

						<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
							value=" 0.00 " data-default="">

					</span>
				</td>
				<td class="">
					<span>

						<b>Shipping(+): <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Set shipping details and shipping charges. Click on the edit icon below to add/update shipping details and charges." data-html="true" data-trigger="hover"></i></b> 
						<i class="fas fa-edit cursor-pointer"  title="Shipping" aria-hidden="true" data-toggle="modal" data-target="#posShippingModal"></i>
						<span id="shipping_charges_amount">0</span>
						<input type="hidden" name="shipping_details" id="shipping_details" value="" data-default="">

						<input type="hidden" name="shipping_address" id="shipping_address" value="">

						<input type="hidden" name="shipping_status" id="shipping_status" value="">

						<input type="hidden" name="delivered_to" id="delivered_to" value="">

						<input type="hidden" name="shipping_charges" id="shipping_charges" value="0.00 " data-default="0.00">
					</span>
				</td>
									<td class="col-sm-3 col-xs-6 d-inline-table">
						<b>Packing Charge(+):</b>
						<i class="fas fa-edit cursor-pointer service_modal_btn"></i> 
						<span id="packing_charge_text">
							0
						</span>
					</td>
												<td>
					<b id="round_off">Round Off:</b> <span id="round_off_text">0</span>								
					<input type="hidden" name="round_off_amount" id="round_off_amount" value=0>
				</td>
							</tr>
		</table>
	</div>
</div>
								<div class="modal fade" tabindex="-1" role="dialog" id="modal_payment">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Payment</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 mb-12">
						<strong>Advance Balance:</strong> <span id="advance_balance_text"></span>
						<input id="advance_balance" data-error-msg="Required advance balance not available" name="advance_balance" type="hidden">
					</div>
					<div class="col-md-9">
						<div class="row">
							<div id="payment_rows_div">
																	
									
									<div class="col-md-12">
	<div class="box box-solid payment_row bg-lightgray">
		
        
		<div class="box-body" >
			<div class="row">
	<input type="hidden" class="payment_row_index" value="0">
		<div class="col-md-4">
		<div class="form-group">
			<label for="amount_0">Amount:*</label>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-money-bill-alt"></i>
				</span>
				<input class="form-control payment-amount input_number" required id="amount_0" placeholder="Amount"  name="payment[0][amount]" type="text" value="0.00">
			</div>
		</div>
	</div>
		<div class="col-md-4">
		<div class="form-group">
			<label for="method_0">Payment Method:*</label>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-money-bill-alt"></i>
				</span>
								<select class="form-control col-md-12 payment_types_dropdown" required id="method_0" style="width:100%;"  name="payment[0][method]"><option value="advance">Advance</option><option value="cash" selected="selected">Cash</option><option value="card">Card</option><option value="cheque">Cheque</option><option value="bank_transfer">Bank Transfer</option><option value="other">Other</option><option value="custom_pay_1">SelRom CP</option><option value="custom_pay_2">Custom Payment 2</option><option value="custom_pay_3">Custom Payment 3</option></select>

							</div>
		</div>
	</div>
			<div class="col-md-4">
			<div class="form-group ">
				<label for="account_0">Payment Account:</label>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					<select class="form-control select2 account-dropdown" id="account_0" style="width:100%;"  name="payment[0][account_id]"><option value="" selected="selected">None</option><option value="1">COMPANY (Balance: -525.00)</option></select>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="payment_details_div  hide " data-type="card" >
	<div class="col-md-4">
		<div class="form-group">
			<label for="card_number_0">Card Number</label>
			<input class="form-control" placeholder="Card Number" id="card_number_0" name="payment[0][card_number]" type="text" value="">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="card_holder_name_0">Card holder name</label>
			<input class="form-control" placeholder="Card holder name" id="card_holder_name_0" name="payment[0][card_holder_name]" type="text" value="">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="card_transaction_number_0">Card Transaction No.</label>
			<input class="form-control" placeholder="Card Transaction No." id="card_transaction_number_0" name="payment[0][card_transaction_number]" type="text" value="">
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="card_type_0">Card Type</label>
			<select class="form-control" id="card_type_0" name="payment[0][card_type]"><option value="credit">Credit Card</option><option value="debit">Debit Card</option><option value="visa">Visa</option><option value="master">MasterCard</option></select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="card_month_0">Month</label>
			<input class="form-control" placeholder="Month" id="card_month_0" name="payment[0][card_month]" type="text" value="">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="card_year_0">Year</label>
			<input class="form-control" placeholder="Year" id="card_year_0" name="payment[0][card_year]" type="text" value="">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="card_security_0">Security Code</label>
			<input class="form-control" placeholder="Security Code" id="card_security_0" name="payment[0][card_security]" type="text" value="">
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="payment_details_div  hide " data-type="cheque" >
	<div class="col-md-12">
		<div class="form-group">
			<label for="cheque_number_0">Cheque No.</label>
			<input class="form-control" placeholder="Cheque No." id="cheque_number_0" name="payment[0][cheque_number]" type="text" value="">
		</div>
	</div>
</div>
<div class="payment_details_div  hide " data-type="bank_transfer" >
	<div class="col-md-12">
		<div class="form-group">
			<label for="bank_account_number_0">Bank Account No</label>
			<input class="form-control" placeholder="Bank Account No" id="bank_account_number_0" name="payment[0][bank_account_number]" type="text" value="">
		</div>
	</div>
</div>
<div class="payment_details_div  hide " data-type="custom_pay_1" >
	<div class="col-md-12">
		<div class="form-group">
			<label for="transaction_no_1_0">Transaction No.</label>
			<input class="form-control" placeholder="Transaction No." id="transaction_no_1_0" name="payment[0][transaction_no_1]" type="text" value="">
		</div>
	</div>
</div>
<div class="payment_details_div  hide " data-type="custom_pay_2" >
	<div class="col-md-12">
		<div class="form-group">
			<label for="transaction_no_2_0">Transaction No.</label>
			<input class="form-control" placeholder="Transaction No." id="transaction_no_2_0" name="payment[0][transaction_no_2]" type="text" value="">
		</div>
	</div>
</div>
<div class="payment_details_div  hide " data-type="custom_pay_3" >
	<div class="col-md-12">
		<div class="form-group">
			<label for="transaction_no_3_0">Transaction No.</label>
			<input class="form-control" placeholder="Transaction No." id="transaction_no_3_0" name="payment[0][transaction_no_3]" type="text" value="">
		</div>
	</div>
</div>	<div class="col-md-12">
		<div class="form-group">
			<label for="note_0">Payment note:</label>
			<textarea class="form-control" rows="3" id="note_0" name="payment[0][note]" cols="50"></textarea>
		</div>
	</div>
</div>		</div>
	</div>
</div>															</div>
							<input type="hidden" id="payment_row_index" value="1">
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary btn-block" id="add-payment-row">Add Payment Row</button>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sale_note">Sell note:</label>
									<textarea class="form-control" rows="3" placeholder="Sell note" name="sale_note" cols="50" id="sale_note"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="staff_note">Staff note:</label>
									<textarea class="form-control" rows="3" placeholder="Staff note" name="staff_note" cols="50" id="staff_note"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box box-solid bg-orange">
				            <div class="box-body">
				            	<div class="col-md-12">
				            		<strong>
				            			Total Items:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_quantity">0</span>
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			Total Payable:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_payable_span">0</span>
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			Total Paying:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_paying">0</span>
				            		<input type="hidden" id="total_paying_input">
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			Change Return:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold change_return_span">0</span>
				            		<input class="form-control change_return input_number" required id="change_return" name="change_return" type="hidden" value="0">
				            		<!-- <span class="lead text-bold total_quantity">0</span> -->
				            						            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			Balance:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold balance_due">0</span>
				            		<input type="hidden" id="in_balance_due" value=0>
				            	</div>


				            					              
				            </div>
				            <!-- /.box-body -->
				          </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="pos-save">Finalize Payment</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Used for express checkout card transaction -->
<div class="modal fade" tabindex="-1" role="dialog" id="card_details_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Card transaction details</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

		<div class="col-md-4">
			<div class="form-group">
				<label for="card_number">Card Number</label>
				<input class="form-control" placeholder="Card Number" id="card_number" autofocus name="" type="text">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="card_holder_name">Card holder name</label>
				<input class="form-control" placeholder="Card holder name" id="card_holder_name" name="" type="text">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="card_transaction_number">Card Transaction No.</label>
				<input class="form-control" placeholder="Card Transaction No." id="card_transaction_number" name="" type="text">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="card_type">Card Type</label>
				<select class="form-control select2" id="card_type" name=""><option value="visa" selected="selected">Visa</option><option value="master">MasterCard</option></select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="card_month">Month</label>
				<input class="form-control" placeholder="Month" id="card_month" name="" type="text">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="card_year">Year</label>
				<input class="form-control" placeholder="Year" id="card_year" name="" type="text">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="card_security">Security Code</label>
				<input class="form-control" placeholder="Security Code" id="card_security" name="" type="text">
			</div>
		</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="pos-save-card">Finalize Payment</button>
			</div>

		</div>
	</div>
</div>
																	<div class="modal fade" tabindex="-1" role="dialog" id="confirmSuspendModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Suspend Sale</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
				        <div class="form-group">
				            <label for="additional_notes">Suspend Note:</label>
				            <textarea class="form-control" rows="4" name="additional_notes" cols="50" id="additional_notes"></textarea>
				            <input id="is_suspend" name="is_suspend" type="hidden" value="0">
				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="pos-suspend">Save</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->								
																	<!-- Edit discount Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="recurringInvoiceModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Subscribe </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				        	<label for="recur_interval">Subscription Interval:*</label>
				        	<div class="input-group">
				               <input class="form-control" required style="width: 50%;" name="recur_interval" type="number" id="recur_interval">
				               
				                <select class="form-control" required style="width: 50%;" id="recur_interval_type" name="recur_interval_type"><option value="days" selected="selected">Days</option><option value="months">Months</option><option value="years">Years</option></select>
				                
				            </div>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				        	<label for="recur_repetitions">No. of Repetitions:</label>
				        	<input class="form-control" name="recur_repetitions" type="number" id="recur_repetitions">
					        <p class="help-block">If blank invoice will be generated infinite times</p>
				        </div>
				    </div>
				    				    <div class="subscription_repeat_on_div col-md-6  hide ">
				        <div class="form-group">
				        	<label for="subscription_repeat_on">Repeat on:</label>
				        	<select class="form-control" id="subscription_repeat_on" name="subscription_repeat_on"><option selected="selected" value="">Please Select</option><option value="1">1st</option><option value="2">2nd</option><option value="3">3rd</option><option value="4">4th</option><option value="5">5th</option><option value="6">6th</option><option value="7">7th</option><option value="8">8th</option><option value="9">9th</option><option value="10">10th</option><option value="11">11th</option><option value="12">12th</option><option value="13">13th</option><option value="14">14th</option><option value="15">15th</option><option value="16">16th</option><option value="17">17th</option><option value="18">18th</option><option value="19">19th</option><option value="20">20th</option><option value="21">21st</option><option value="22">22nd</option><option value="23">23rd</option><option value="24">24th</option><option value="25">25th</option><option value="26">26th</option><option value="27">27th</option><option value="28">28th</option><option value="29">29th</option><option value="30">30th</option></select>
				        </div>
				    </div>

				</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->															</div>
						</div>
					</div>
								<div class="col-md-5 no-padding">
					<div class="row" id="featured_products_box" style="display: none;">
</div>
<div class="row">
	<div class="col-lg-12">
	       <div class="row">
	           <?php
              foreach($items as $lead)
              {
                  ?>
                  <div class="col-lg-3">
                      <div class="card">
                          <div class="card-header"><?php echo $lead['iname']; ?></div>
                          <div class="card-body">Content</div>
                            <div class="card-footer">Footer</div>
                      </div>
                  </div>
                  <?php
              }
              ?>
	       </div>
	</div>
	<!-- used in repair : filter for service/product -->
	<div class="col-md-6 hide" id="product_service_div">
		<select id="is_enabled_stock" class="select2" name="is_enabled_stock" style="width:100% !important"><option value="" selected="selected">All</option><option value="product">Product</option><option value="service">Service</option></select>
	</div>

	<div class="col-sm-4  hide " id="feature_product_div">
		<button type="button" class="btn btn-primary btn-flat" id="show_featured_products">Featured Products</button>
	</div>
</div>
<br>
<div class="row">
	<input type="hidden" id="suggestion_page" value="1">
	<div class="col-md-12">
		<div class="eq-height-row" id="product_list_body"></div>
	</div>
	<div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none;">
		<i class="fa fa-spinner fa-spin fa-2x"></i>
	</div>
</div>				</div>
							</div>
		</div>
	</div>
	<div class="row">
	<div class="pos-form-actions">
		<div class="col-md-12">
						<button type="button" class=" btn bg-info text-white btn-default btn-flat " id="pos-draft"><i class="fas fa-edit"></i> Draft</button>
			<button type="button" class="btn btn-default bg-yellow btn-flat " id="pos-quotation"><i class="fas fa-edit"></i> Quotation</button>

							<button type="button" 
				class=" btn bg-red btn-default btn-flat no-print pos-express-finalize" 
				data-pay_method="suspend"
				title="Suspend Sales (pause)" >
				<i class="fas fa-pause" aria-hidden="true"></i>
				Suspend				</button>
			
							<input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">
				<button type="button" 
				class="btn bg-purple btn-default btn-flat no-print pos-express-finalize " 
				data-pay_method="credit_sale"
				title="Checkout as credit sale" >
					<i class="fas fa-check" aria-hidden="true"></i> Credit Sale				</button>
						<button type="button" 
				class="btn bg-maroon btn-default btn-flat no-print  pos-express-finalize  " 
				data-pay_method="card"
				title="Express checkout using card" >
				<i class="fas fa-credit-card" aria-hidden="true"></i> Card			</button>

			<button type="button" class="btn bg-navy btn-default   btn-flat no-print  " id="pos-finalize" title="Checkout using multiple payment methods"><i class="fas fa-money-check-alt" aria-hidden="true"></i> Multiple Pay </button>

			<button type="button" class="btn btn-success   btn-flat no-print  pos-express-finalize " data-pay_method="cash" title="Mark complete paid & checkout"> <i class="fas fa-money-bill-alt" aria-hidden="true"></i> Cash</button>
						&nbsp;&nbsp;
			<b>Total Payable:</b>
			<input type="hidden" name="final_total" 
										id="final_total_input" value=0>
			<span id="total_payable" class="text-success lead text-bold">0</span>
			&nbsp;&nbsp;
										<button type="button" class="btn btn-danger btn-flat  btn-xs " id="pos-cancel"> <i class="fas fa-window-close"></i> Cancel</button>
			
						<button type="button" class="btn btn-primary btn-flat pull-right " data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions"> <i class="fas fa-clock"></i> Recent Transactions</button>
						
		</div>
	</div>
</div>
	<!-- Edit discount Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="posEditDiscountModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
											Discount																Loyalty_Point
									</h4>
			</div>
			<div class="modal-body">
				<div class="row ">
					<div class="col-md-12">
						<h4 class="modal-title">Edit Discount:</h4>
					</div>
					<div class="col-md-6">
				        <div class="form-group">
				            <label for="discount_type_modal">Discount Type:*</label>
				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <select class="form-control" required id="discount_type_modal" name="discount_type_modal"><option value="">Please Select</option><option value="fixed">Fixed</option><option value="percentage" selected="selected">Percentage</option></select>
				            </div>
				        </div>
				    </div>
				    				    <div class="col-md-6">
				        <div class="form-group">
				            <label for="discount_amount_modal">Discount Amount:*</label>
				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <input class="form-control input_number" data-max-discount="" data-max-discount-error_msg="You can give max % discount per sale" name="discount_amount_modal" type="text" value="0.00" id="discount_amount_modal">
				            </div>
				        </div>
				    </div>
				</div>
				<br>
				<div class="row ">
					<div class="well well-sm bg-light-gray col-md-12">
					<div class="col-md-12">
						<h4 class="modal-title">Loyalty_Point:</h4>
					</div>
					<div class="col-md-6">
				        <div class="form-group">
				            <label for="rp_redeemed_modal">Redeemed:</label>
				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-gift"></i>
				                </span>
				                <input class="form-control" data-amount_per_unit_point="1.0000" data-max_points="0" min="0" data-min_order_total="1.0000" name="rp_redeemed_modal" type="number" value="0" id="rp_redeemed_modal">
				                <input type="hidden" id="rp_name" value="Loyalty_Point">
				            </div>
				        </div>
				    </div>
				    <div class="col-md-6">
				    	<p><strong>Available:</strong> <span id="available_rp">0</span></p>
				    	<h5><strong>Redeemed Amount:</strong> <span id="rp_redeemed_amount_text">0.00</span></h5>
				    </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="posEditDiscountModalUpdate">Update</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- Edit Order tax Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="posEditOrderTaxModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Order Tax</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <label for="order_tax_modal">Order Tax:*</label>
				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <select class="form-control" id="order_tax_modal" name="order_tax_modal"><option selected="selected" value="">Please Select</option><option value="" selected="selected">None</option><option value="14" data-rate="0.0000">GST-0</option><option value="15" data-rate="5.0000">GST-5</option><option value="16" data-rate="12.0000">GST-12</option><option value="17" data-rate="18.0000">GST-18</option><option value="18" data-rate="28.0000">GST-28</option></select>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="posEditOrderTaxModalUpdate">Update</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Edit Shipping Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="posShippingModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Shipping</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <label for="shipping_details_modal">Shipping Details:*</label>
				            <textarea class="form-control" placeholder="Shipping Details" required rows="4" name="shipping_details_modal" cols="50" id="shipping_details_modal"></textarea>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <label for="shipping_address_modal">Shipping Address:</label>
				            <textarea class="form-control" placeholder="Shipping Address" rows="4" name="shipping_address_modal" cols="50" id="shipping_address_modal"></textarea>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <label for="shipping_charges_modal">Shipping Charges:*</label>
				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <input class="form-control input_number" placeholder="Shipping Charges" name="shipping_charges_modal" type="text" value="0" id="shipping_charges_modal">
				            </div>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <label for="shipping_status_modal">Shipping Status:</label>
				            <select class="form-control" id="shipping_status_modal" name="shipping_status_modal"><option selected="selected" value="">Please Select</option><option value="ordered">Ordered</option><option value="packed">Packed</option><option value="shipped">Shipped</option><option value="delivered">Delivered</option><option value="cancelled">Cancelled</option></select>
				        </div>
				    </div>

				    <div class="col-md-6">
				        <div class="form-group">
				            <label for="delivered_to_modal">Delivered To:</label>
				            <input class="form-control" placeholder="Delivered To" name="delivered_to_modal" type="text" id="delivered_to_modal">
				        </div>
				    </div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="posShippingModalUpdate">Update</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	</form>
</section>

<!-- This will be printed -->
<section class="invoice print_section" id="receipt_section">
</section>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <form method="POST" accept-charset="UTF-8" id="quick_add_contact"><input name="_token" type="hidden" value="ju2WNHRGZ4w5AhZFoyYGufDS3EcvqXCYLEILWe1W">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Add a new contact</h4>
    </div>

    <div class="modal-body">
        <div class="row">            

            <div class="col-md-4 contact_type_div">
                <div class="form-group">
                    <label for="type">Contact type:*</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <select class="form-control" id="contact_type" required name="type"><option selected="selected" value="">Please Select</option><option value="supplier">Suppliers</option><option value="customer">Customers</option><option value="both">Both (Supplier &amp; Customer)</option></select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="contact_id">Contact ID:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-id-badge"></i>
                    </span>
                    <input class="form-control" placeholder="Contact ID" name="contact_id" type="text" id="contact_id">
                </div>
            </div>
        </div>
        <div class="col-md-4 customer_fields">
            <div class="form-group">
              <label for="customer_group_id">Customer Group:</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-users"></i>
                  </span>
                  <select class="form-control" id="customer_group_id" name="customer_group_id"><option value="" selected="selected">None</option><option value="1">General-10</option><option value="2">New One-0</option></select>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="supplier_business_name">Business Name:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-briefcase"></i>
                    </span>
                    <input class="form-control" placeholder="Business Name" name="supplier_business_name" type="text" id="supplier_business_name">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="prefix">Prefix:</label>
                <input class="form-control" placeholder="Mr / Mrs / Miss" name="prefix" type="text" id="prefix">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="first_name">First Name:*</label>
                <input class="form-control" required placeholder="First Name" name="first_name" type="text" id="first_name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="middle_name">Middle name:</label>
                <input class="form-control" placeholder="Middle name" name="middle_name" type="text" id="middle_name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input class="form-control" placeholder="Last Name" name="last_name" type="text" id="last_name">
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="col-md-3">
        <div class="form-group">
            <label for="mobile">Mobile:*</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                </span>
                <input class="form-control" required placeholder="Mobile" name="mobile" type="text" id="mobile">
            </div>
        </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="alternate_number">Alternate contact number:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input class="form-control" placeholder="Alternate contact number" name="alternate_number" type="text" id="alternate_number">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="landline">Landline:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input class="form-control" placeholder="Landline" name="landline" type="text" id="landline">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input class="form-control" placeholder="Email" name="email" type="email" id="email">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dob">Date of birth:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    
                    <input class="form-control dob-date-picker" placeholder="Date of birth" readonly name="dob" type="text" id="dob">
                </div>
            </div>
        </div>

        <!-- lead additional field -->
        <div class="col-md-4 lead_additional_div">
          <div class="form-group">
              <label for="crm_source">Source:</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa fa-search"></i>
                  </span>
                  <select class="form-control" id="crm_source" name="crm_source"><option selected="selected" value="">Please Select</option></select>
              </div>
          </div>
        </div>
        
        <div class="col-md-4 lead_additional_div">
          <div class="form-group">
              <label for="crm_life_stage">Life Stage:</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa fa-life-ring"></i>
                  </span>
                  <select class="form-control" id="crm_life_stage" name="crm_life_stage"><option selected="selected" value="">Please Select</option></select>
              </div>
          </div>
        </div>
        <div class="col-md-6 lead_additional_div">
          <div class="form-group">
              <label for="user_id">Assigned to:*</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                  </span>
                  <select class="form-control select2" id="user_id" multiple required style="width: 100%;" name="user_id[]"></select>
              </div>
          </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-12">
            <button type="button" class="btn btn-primary center-block" id="more_btn">More Informations <i class="fa fa-chevron-down"></i></button>
        </div>

        <div id="more_div" class="hide">

            <div class="col-md-12"><hr/></div>

        <div class="col-md-4">
            <div class="form-group">
              <label for="tax_number">Tax number:</label>
                <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-info"></i>
                  </span>
                  <input class="form-control" placeholder="Tax number" name="tax_number" type="text" id="tax_number">
                </div>
            </div>
        </div>

        <div class="col-md-4 opening_balance">
          <div class="form-group">
              <label for="opening_balance">Opening Balance:</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <input class="form-control input_number" name="opening_balance" type="text" value="0" id="opening_balance">
              </div>
          </div>
        </div>

        <div class="col-md-4 pay_term">
          <div class="form-group">
            <div class="multi-input">
              <label for="pay_term_number">Pay term:</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Payments to be paid for purchases/sales within the given time period.<br/><small class='text-muted'>All upcoming or due payments will be displayed in dashboard - Payment Due section</small>" data-html="true" data-trigger="hover"></i>              <br/>
              <input class="form-control width-40 pull-left" placeholder="Pay term" name="pay_term_number" type="number" id="pay_term_number">

              <select class="form-control width-60 pull-left" name="pay_term_type"><option selected="selected" value="">Please Select</option><option value="months">Months</option><option value="days">Days</option></select>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="col-md-4 customer_fields">
          <div class="form-group">
              <label for="credit_limit">Credit Limit:</label>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fas fa-money-bill-alt"></i>
                  </span>
                  <input class="form-control input_number" name="credit_limit" type="text" id="credit_limit">
              </div>
              <p class="help-block">Keep blank for no limit</p>
          </div>
        </div>
        

        <div class="col-md-12"><hr/></div>
        <div class="clearfix"></div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="address_line_1">Address line 1:</label>
                <input class="form-control" placeholder="Address line 1" rows="3" name="address_line_1" type="text" id="address_line_1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address_line_2">Address line 2:</label>
                <input class="form-control" placeholder="Address line 2" rows="3" name="address_line_2" type="text" id="address_line_2">
            </div>
        </div>
      <div class="clearfix"></div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="city">City:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <input class="form-control" placeholder="City" name="city" type="text" id="city">
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="state">State:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <input class="form-control" placeholder="State" name="state" type="text" id="state">
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="country">Country:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <input class="form-control" placeholder="Country" name="country" type="text" id="country">
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="zip_code">Zip Code:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <input class="form-control" placeholder="Zip/Postal Code" name="zip_code" type="text" id="zip_code">
            </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
            <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field1">SelRom CCF:</label>
            <input class="form-control" placeholder="SelRom CCF" name="custom_field1" type="text" id="custom_field1">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field2">Custom Field 2:</label>
            <input class="form-control" placeholder="Custom Field 2" name="custom_field2" type="text" id="custom_field2">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field3">Custom Field 3:</label>
            <input class="form-control" placeholder="Custom Field 3" name="custom_field3" type="text" id="custom_field3">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field4">Custom Field 4:</label>
            <input class="form-control" placeholder="Custom Field 4" name="custom_field4" type="text" id="custom_field4">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field5">Custom Field 5:</label>
            <input class="form-control" placeholder="Custom Field 5" name="custom_field5" type="text" id="custom_field5">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field6">Custom Field 6:</label>
            <input class="form-control" placeholder="Custom Field 6" name="custom_field6" type="text" id="custom_field6">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field7">Custom Field 7:</label>
            <input class="form-control" placeholder="Custom Field 7" name="custom_field7" type="text" id="custom_field7">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field8">Custom Field 8:</label>
            <input class="form-control" placeholder="Custom Field 8" name="custom_field8" type="text" id="custom_field8">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field9">Custom Field 9:</label>
            <input class="form-control" placeholder="Custom Field 9" name="custom_field9" type="text" id="custom_field9">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <label for="custom_field10">Custom Field 10:</label>
            <input class="form-control" placeholder="Custom Field 10" name="custom_field10" type="text" id="custom_field10">
        </div>
      </div>
      <div class="col-md-12 shipping_addr_div"><hr></div>
      <div class="col-md-8 col-md-offset-2 shipping_addr_div" >
          <strong>Shipping Address</strong><br>
          <input class="form-control" placeholder="Search address" id="shipping_address" name="shipping_address" type="text">
        <div id="map"></div>
      </div>
      <input id="position" name="position" type="hidden">

      </div>
      </div>
    </div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </form>
  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --></div>
<!-- /.content -->
<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

<div class="modal fade" id="configure_search_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					Search products by				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<input class="input-icheck search_fields" checked="checked" name="search_fields[]" type="checkbox" value="name"> Product Name				            </label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<input class="input-icheck search_fields" checked="checked" name="search_fields[]" type="checkbox" value="sku"> SKU				            </label>
						</div>
					</div>
										<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<input class="input-icheck search_fields" checked="checked" name="search_fields[]" type="checkbox" value="lot"> Lot Number				            </label>
						</div>
					</div>
									</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade no-print" id="recent_transactions_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Recent Transactions</h4>
			</div>
			<div class="modal-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_final" data-toggle="tab" aria-expanded="true"><b><i class="fa fa-check"></i> Final</b></a></li>

						<li class=""><a href="#tab_quotation" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> Quotation</b></a></li>
						
						<li class=""><a href="#tab_draft" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> Draft</b></a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_final">
						</div>
						<div class="tab-pane" id="tab_quotation">
						</div>
						<div class="tab-pane" id="tab_draft">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="weighing_scale_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Weighing Scale</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
				        <div class="form-group">
				            <label for="weighing_scale_barcode">Weighing scale barcode:</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Scan the barcode from weighing sale and submit" data-html="true" data-trigger="hover"></i>				            <input class="form-control" name="weighing_scale_barcode" type="text" id="weighing_scale_barcode">
				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="weighing_scale_submit">Submit</button>
			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                <div class='scrolltop no-print'>
                    <div class='scroll icon'><i class="fas fa-angle-up"></i></div>
                </div>

                
                <!-- This will be printed -->
                <section class="invoice print_section" id="receipt_section">
                </section>
                
            </div>
            <div class="modal fade" id="todays_profit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Today's profit</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="modal_today" value="2021-09-02">
        <div class="row">
          <div id="todays_profit">
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>            <!-- /.content-wrapper -->

                            <!-- Main Footer -->
  <footer class="no-print text-center text-info">
    <!-- To the right -->
    <!-- <div class="pull-right hidden-xs">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <small>
    	<b>Wonder POS - VCloud Version 10 | Copyright &copy; 2021 All rights reserved.</b>
    </small>
</footer>            

        </div>


<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?v=$asset_v"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?v=$asset_v"></script>
<![endif]-->
<!--<script src="http://cloudpos.ekart.today/js/vendor.js?v=37"></script>-->

<!--    <script src="http://cloudpos.ekart.today/js/lang/en.js?v=37"></script>-->

<script>
    moment.tz.setDefault('Asia/Kolkata');
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
                    $.fn.dataTable.ext.errMode = 'throw';
            });
    
    var financial_year = {
        start: moment('2021-04-01'),
        end: moment('2022-03-31'),
    }
    
    var datepicker_date_format = "dd-mm-yyyy";
    var moment_date_format = "DD-MM-YYYY";
    var moment_time_format = "hh:mm A";

    var app_locale = "en";

    var non_utf8_languages = [
                "ar",
                "hi",
                "ps",
            ];

    var __default_datatable_page_entries = "25";

    var __new_notification_count_interval = "60000";
</script>

<!--    <script src="http://cloudpos.ekart.today/js/lang/en.js?v=37"></script>-->

<!--<script src="http://cloudpos.ekart.today/js/functions.js?v=37"></script>-->
<!--<script src="http://cloudpos.ekart.today/js/common.js?v=37"></script>-->
<!--<script src="http://cloudpos.ekart.today/js/app.js?v=37"></script>-->
<!--<script src="http://cloudpos.ekart.today/js/help-tour.js?v=37"></script>-->
<!--<script src="http://cloudpos.ekart.today/js/documents_and_note.js?v=37"></script>-->

<!-- TODO -->

<!--	<script src="http://cloudpos.ekart.today/js/pos.js?v=37"></script>-->
<!--	<script src="http://cloudpos.ekart.today/js/printer.js?v=37"></script>-->
<!--	<script src="http://cloudpos.ekart.today/js/product.js?v=37"></script>-->
<!--	<script src="http://cloudpos.ekart.today/js/opening_stock.js?v=37"></script>-->
	<script type="text/javascript">
	$(document).ready( function() {
		//shortcut for express checkout
					Mousetrap.bind('shift+e', function(e) {
				e.preventDefault();
				$('button.pos-express-finalize[data-pay_method="cash"]').trigger('click');
			});
		
		//shortcut for cancel checkout
					Mousetrap.bind('shift+c', function(e) {
				e.preventDefault();
				$('#pos-cancel').trigger('click');
			});
		
		//shortcut for draft checkout
					Mousetrap.bind('shift+d', function(e) {
				e.preventDefault();
				$('#pos-draft').trigger('click');
			});
		
		//shortcut for draft pay & checkout
					Mousetrap.bind('shift+p', function(e) {
				e.preventDefault();
				$('#pos-finalize').trigger('click');
			});
		
		//shortcut for edit discount
					Mousetrap.bind('shift+i', function(e) {
				e.preventDefault();
				$('#pos-edit-discount').trigger('click');
			});
		
		//shortcut for edit tax
					Mousetrap.bind('shift+t', function(e) {
				e.preventDefault();
				$('#pos-edit-tax').trigger('click');
			});
		
		//shortcut for add payment row
					var payment_modal = document.querySelector('#modal_payment');
			Mousetrap.bind('shift+r', function(e, combo) {
				if($('#modal_payment').is(':visible')){
					e.preventDefault();
					$('#add-payment-row').trigger('click');
				}
			});
		
		//shortcut for add finalize payment
					var payment_modal = document.querySelector('#modal_payment');
			Mousetrap(payment_modal).bind('shift+f', function(e, combo) {
				if($('#modal_payment').is(':visible')){
					e.preventDefault();
					$('#pos-save').trigger('click');
				}
			});
		
		//Shortcuts to go recent product quantity
					shortcut_length_prev = 0;
			shortcut_position_now = null;

			Mousetrap.bind('f2', function(e, combo) {
				var length_now = $('table#pos_table tr').length;

				if(length_now != shortcut_length_prev){
					shortcut_length_prev = length_now;
					shortcut_position_now = length_now;
				} else {
					shortcut_position_now = shortcut_position_now - 1;
				}

				var last_qty_field = $('table#pos_table tr').eq(shortcut_position_now - 1).contents().find('input.pos_quantity');
				if(last_qty_field.length >=1){
					last_qty_field.focus().select();
				} else {
					shortcut_position_now = length_now + 1;
					Mousetrap.trigger('f2');
				}
			});

			//On focus of quantity field go back to search when stop typing
			var timeout = null;
			$('table#pos_table').on('focus', 'input.pos_quantity', function () {
			    var that = this;

			    $(this).on('keyup', function(e){

			    	if (timeout !== null) {
			        	clearTimeout(timeout);
			    	}

			    	var code = e.keyCode || e.which;
			    	if (code != '9') {
    					timeout = setTimeout(function () {
			        		$('input#search_product').focus().select();
			    		}, 5000);
    				}
			    });
			});
		
		//shortcut to go to add new products
					Mousetrap.bind('f4', function(e) {
				$('input#search_product').focus().select();
			});
		
		//shortcut for weighing scale
			});
</script>
	<!-- Call restaurant module if defined -->
        	<script src="pos/restaurant.js?v=37"></script>
        <!-- include module js -->
    

<script type="text/javascript">
    $(document).ready( function(){
        var locale = "en";
        var isRTL =  false; 
        $('#calendar').fullCalendar('option', {
            locale: locale,
            isRTL: isRTL
        });
    });
</script>        <div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
    </body>

</html>