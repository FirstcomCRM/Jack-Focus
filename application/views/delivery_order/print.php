<div class="buttons">
    <button class="btn btn-info btn-sm" onclick="window.print('<?=base_url()?>invoice/print_preview/<?=$invoice['invoice_id']?>')" type="button">Print</button>
    <button class="btn btn-danger btn-sm" onclick="self.close()" type="button">Close</button>
</div>
<div id="content">
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
            				<div class="font-bold">Bill To:</div>
            				<div><?=$quotation['company_name']?></div>
                            <div class="font-bold">Address:</div>
            				<div><?=nl2br(trim($customer_info['address']))?></div>
            			</div>
                        <div class="col-top-3">
                            <div class="font-bold">Ship To:</div>
                            <div><?=nl2br(trim($invoice['shipping_address']))?></div>
                        </div>
            			<div class="col-top-3">
            				<div class="logo"></div>
            				<div class="bg-black"><?=$do['do_no']?></div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-mid-3_7">
            				<div class="attention">
            					<div class="font-bold col-left-3">Attention:</div>&nbsp<div class="font-normal"><?=$customer_info['contact_person']?></div>
            				</div>
                            <div class="inv_id">
                                <div class="font-bold col-left-3">Invoice No:</div>&nbsp<div class="font-normal"><?=$invoice['invoice_no']?></div>
                            </div>
            			</div>
            			<div class="col-mid-3">
                            
                            <div class="phone">
                                <div class="font-bold col-left-3">Tel:</div>&nbsp<div class="font-normal"><?=$customer_info['tel']?></div>
                            </div>
                            <div class="hp">
                                <div class="font-bold col-left-3">Hp:</div>&nbsp<div class="font-normal"><?=$customer_info['hp']?></div>
                            </div>
            				
            			</div>
            			<div class="col-mid-3">
                            <div class="fax">
                                <div class="font-bold col-left-3">Fax:</div>&nbsp<div class="font-normal"><?=$customer_info['fax']?></div>
                            </div>
            				<!-- <div class="form_no">
            					<div class="font-bold col-left-4">DO No.</div>&nbsp<div class="font-bold-lg"><?=$do['do_no']?></div>
            				</div> -->
                            
            				<div class="date">
            					<div class="font-bold col-left-4">Date:</div>&nbsp<div class="font-normal"><?=date('d M Y',$do['do_date'])?></div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <table class="item">
                <thead>
                    <tr class="item_list">
                        <th class="col-6">Product Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quotation_products as $quotation_product): ?>
                        <tr>
                            <td><?=$quotation_product['product_name']?></td>
                            <td class="border-right"><?=$quotation_product['quantity']?></td>
                        </tr>
                    <?php endforeach ?>
                        <tr>
                            <td colspan="2" style="border-left:none" class="border-top">
                                <div class="row" style="font-size:11px">
                                </div>
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
                				<th class="table-col-left-5" style="border:none"></th>
                				<th class="table-col-left-5 inscribe-r">Received By: </th>
                			</tr>
                			<tr>
                				<td class="inscribe-b" style="border:none"></td>
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