<div class="buttons">
    <button class="btn btn-info btn-sm" onclick="window.print('<?=base_url()?>quotation_maid/print_preview/<?=$quotation['quotation_id']?>')" type="button">Print</button>
    <button class="btn btn-danger btn-sm" onclick="self.close()" type="button">Close</button>
</div>
<div id="content">
    <!-- <div id="background">
        <p id="bg-text">Firstcom Solutions</p>
    </div> -->
    <div class="page">
        <div class="subpage">
        <div class="content-top">
            <div class="top">
                <div class="sub-header">
                <div class="logo"><img src="<?=base_url()?>public/img/logo.png" /></div>
                <div class="address">
799 North Bridge Road<br/>
Singapore 198767<br/>
(Formerly from 37 Kallang Pudding Road,<br/>
#08-07 Tong Lee Building B)<br/>
Telephone: 6547 4428<br/>
Email: admin@hydroflux.com.sg<br/>
                </div>
                </div>
            	<div class="page-info">
            		<div class="row">
            			<div class="col-top-3_7">
            				<div class="font-bold">To:</div>
            				<div><?=$quotation['customer_name']?></div>
                            <div class="font-bold">Address:</div>
            				<div><?=nl2br(trim($customer_info['customer_address']))?></div>
            			</div>
                        <div class="col-top-3">
                        </div>
            			<div class="col-top-3">
            				<div class="logo"></div>
            				<div class="bg-black"><?=$quotation['quotation_no']?></div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-mid-3_7">
            				<div class="attention">
            					<div class="font-bold col-left-3">Attention:</div>&nbsp<div class="font-normal"><?=$customer_info['customer_name']?></div>
            				</div>
            				<div class="hp">
                                <div class="font-bold col-left-3">Handphone:</div>&nbsp<div class="font-normal"><?=$customer_info['customer_cp']?></div>
                            </div>
            			</div>
            			<div class="col-mid-3">
                            <div class="phone">
                                <div class="font-bold col-left-3">Tel:</div>&nbsp<div class="font-normal"><?=$customer_info['customer_tel']?></div>
                            </div>
            				<div class="fax">
            					<div class="font-bold col-left-3">Fax:</div>&nbsp<div class="font-normal"><?=$customer_info['customer_fax']?></div>
            				</div>
            			</div>
            			<div class="col-mid-3">
            				<!-- <div class="form_no">
            					<div class="font-bold col-left-4">Quot No.</div>&nbsp<div class="font-bold-lg"><?=$quotation['quotation_no']?></div>
            				</div> -->
            				<div class="date">
            					<div class="font-bold col-left-4">Date:</div>&nbsp<div class="font-normal"><?=date('d M Y',$quotation['quotation_date'])?></div>
            				</div>
            				<div class="terms">
            					<div class="font-bold col-left-4">Terms:</div>&nbsp<div class="font-normal"><?=$quotation['payment_terms']?></div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <table class="item">
                <thead>
                    <tr class="item_list">
                        <th class="col-6">Maid Name</th>
                        <th>Price</th>
                       <!-- <th class="col-1">XXX</th>-->
                        <!-- <th class="col-4">Remark</th> -->
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quotation_products as $quotation_product): ?>
                        <tr>
                            <td><?=$quotation_product['maid_name']?></td>
                            <td>$<?=number_format($quotation_product['unit_price'], 2)?></td>
                          <!--  <td><?=$quotation_product['quantity']?></td>-->
                            <!-- <td><?=nl2br($quotation_product['remark'])?></td> -->
                            <td class="border-right">$<?=number_format($quotation_product['total_amount'], 2)?></td>
                        </tr>
                    <?php endforeach ?>
                        <tr>
                            <td style="border-left:none" class="border-top">
                               <div class="row">
                                   <!-- <div><b>Terms & Conditions</b></div>
                                   <div class="row">Goods received in good order & are non-refundable</div> -->
                               </div>   
                            </td>
                            <td class="border-top text-right details" colspan="2">
                                <div class="row">Total:</div>
                                <div class="row">Add <?=$quotation['gst']?>% GST:</div>
                                <div class="row">Total Inc GST:</div>
                            </td>
                            <td class="border-top border-right border-bottom">
                                <div class="row">$<?=number_format($quotation['total_amount'], 2)?></div>
                                <div class="row">$<?=number_format($quotation['total_amount']*$quotation['gst']/100, 2)?></div>
                                <div class="row">$<?=number_format($quotation['total_inc_gst'], 2)?></div>
                            </td>
                        </tr>
                </tbody>
            </table>
            </div>
            <div class="content-bottom">
                <div class="col-6_2 text-left">
                    <div class="row">
                        <div class="font-bold">Terms & Conditions:</div>
                    </div>
                    <div class="row" style="font-size:11px">
                        <ol>
                            <li>Quotation is only valid for 2 weeks from issued date</li>
                        <li>HYDROFLUX PTE LTD reserves the right to amend any information of the above quotation without any prior notice</li>
                        <li>Payment terms: 50% Deposit 50% COD unless otherwise stated</li>
                        <li>Cheque payments to be made payable to "HYDROFLUX PTE LTD"</li>
                        <li>By signing and acknowledging, the purchaser accepting this quotation agrees to all terms and conditions stated herein</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="font-bold">Remark:</div>
                    </div>
                    
                    <div class="row" style="font-size:11px">
                        <?=nl2br($quotation['remark'])?>
                    </div>
                    
                </div>
            <div class="bottom">
            	<div class="inscribe">
            		<table class="inscribe">
            			<tr>
            				<th class="table-col-left-5">Issued By: <?=$quotation['issued_by']?></th>
            				<th class="table-col-left-5 inscribe-r">Received By: </th>
            			</tr>
            			<tr>
            				<td class="inscribe-b"></td>
            				<td class="inscribe-b inscribe-r" valign="bottom">
            					<div class="row" >
                                    Date:<br>
            						(COMPANY STAMP & SIGNATURE)
            					</div>
            				</td class="inscribe-b">
            			</tr>
            		</table>
            	</div>
            </div>
            </div>
        </div>    
    </div>
</div>