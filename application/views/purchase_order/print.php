<div class="buttons">
    <button class="btn btn-info btn-sm" onclick="window.print('<?=base_url()?>purchase_order/print_preview/<?=$purchase_order['purchase_order_id']?>')" type="button">Print</button>
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
            			<div class="col-top-3">
            				<div class="font-bold">Supplier:</div>
            				<div><?=$purchase_order['company_name']?></div>
                            <div class="font-bold">Address:</div>
            				<div><?=nl2br(trim($supplier_info['address']))?></div>
            			</div>
                        <div class="col-top-3">
                        </div>
            			<div class="col-top-3_7">
            				<div class="bg-black">PURCHASE ORDER</div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-mid-3_7">
            				<div class="attention">
            					<div class="font-bold col-left-3">Attention:</div>&nbsp<div class="font-normal"><?=$supplier_info['contact_person']?></div>
            				</div>
            				<div class="phone">
            					<div class="font-bold col-left-3">Tel:</div>&nbsp<div class="font-normal"><?=$supplier_info['tel']?></div>
            				</div>
            			</div>
            			<div class="col-mid-3">
            				<div class="fax">
            					<div class="font-bold col-left-3">Fax:</div>&nbsp<div class="font-normal"><?=$supplier_info['fax']?></div>
            				</div>
            			</div>
            			<div class="col-mid-3">
            				<div class="form_no">
            					<div class="font-bold col-left-4">PO No.</div>&nbsp<div class="font-bold-lg"><?=$purchase_order['po_no']?></div>
            				</div>
            				<div class="date">
            					<div class="font-bold col-left-4">Date:</div>&nbsp<div class="font-normal"><?=date('d M Y',$purchase_order['po_date'])?></div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <table class="item">
                <thead>
                    <tr class="item_list">
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="col-4">Remark</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($po_products as $po_product): ?>
                        <tr>
                            <td class="border-bottom"><?=$po_product['product_name']?></td>
                            <td class="border-bottom">$<?=number_format($po_product['unit_price'], 2)?></td>
                            <td class="border-bottom"><?=$po_product['quantity']?></td>
                            <td class="border-bottom"><?=nl2br($po_product['remark'])?></td>
                            <td class="border-right border-bottom">$<?=number_format($po_product['quantity'] * $po_product['unit_price'], 2)?></td>
                        </tr>
                    <?php endforeach ?>
                        <tr>
                            <td colspan="4" class="text-right details">
                                <div class="row">Total:</div>
                                <div class="row">Add <?=$purchase_order['gst']?>% GST:</div>
                                <div class="row">Total Inc GST:</div>
                            </td>
                            <td class="border-top border-right border-bottom">
                                <div class="row">$<?=number_format($purchase_order['total_amount'], 2)?></div>
                                <div class="row">$<?=number_format($purchase_order['total_amount']*$purchase_order['gst']/100, 2)?></div>
                                <div class="row">$<?=number_format($purchase_order['total_inc_gst'], 2)?></div>
                            </td>
                        </tr>
                </tbody>
            </table>
            </div>
            <div class="content-bottom">
            <div class="col-6_2 text-left">
                <div class="row">
                    <div class="font-bold">Remark:</div>
                </div>
                <div class="row">
                    <div class="font-bold"><?=nl2br($purchase_order['remark'])?></div>
                </div>
            </div>
            <div class="bottom">
            	<div class="inscribe">
            		<table class="inscribe">
            			<tr>
            				<th class="table-col-left-5">Issued By: <?=$purchase_order['issued_by']?></th>
            				<th class="table-col-left-5 inscribe-r">Received By: </th>
            			</tr>
            			<tr>
            				<td class="inscribe-b"></td>
            				<td class="inscribe-b inscribe-r" valign="bottom">
            					<div class="row" >
            						Goods received in good order & are non-refundable<br>
            						(COMPANY STAMP & SIGNATURE)
            					</div>
            				</td class="inscribe-b">
            			</tr>
            		</table>
            	</div>
            </div>
            </div><!--end content bottom-->
        </div>    
    </div>
</div>