<div class="buttons">
    <button class="btn btn-info btn-sm" onclick="window.print('<?=base_url()?>debit_note/print_preview/<?=$debit_note['debit_note_id']?>')" type="button">Print</button>
    <button class="btn btn-danger btn-sm" onclick="self.close()" type="button">Close</button>
</div>
<div id="content">
    <div class="page">
        <div class="subpage">
            <div class="top">
                <div class="header">Firstcom Solution Pte Ltd</div>
                <div class="sub-header">
                    <div>60D Kallang Pudding Road, #02-01 Ingolstadt Centre Singapore 349321</div>
                    <div>Tel: 65 6848 4984 &nbsp&nbsp Fax: 65 6848 4984</div>
                    <div>E-mail: sales@firstcom.com.sg</div>
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
                        </div>
            			<div class="col-top-3">
            				<div class="logo"></div>
            				<div class="bg-black">Debit Note</div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-mid-3_7">
            				<div class="attention">
            					<div class="font-bold col-right-3">Attention:</div>&nbsp<div class="font-normal"><?=$customer_info['contact_person']?></div>
            				</div>
            				<div class="phone">
            					<div class="font-bold col-right-3">Tel:</div>&nbsp<div class="font-normal"><?=$customer_info['tel']?></div>
            				</div>
            			</div>
            			<div class="col-mid-3">
            				<div class="fax">
            					<div class="font-bold col-right-3">Fax:</div>&nbsp<div class="font-normal"><?=$customer_info['fax']?></div>
            				</div>
            			</div>
            			<div class="col-mid-3">
            				<div class="form_no">
            					<div class="font-bold col-right-4">DN No.</div>&nbsp<div class="font-bold-lg"><?=$debit_note['dn_no']?></div>
            				</div>
            				<div class="date">
            					<div class="font-bold col-right-4">Date:</div>&nbsp<div class="font-normal"><?=date('d M Y',$debit_note['dn_date'])?></div>
            				</div>
                            <div class="form_no">
                                <div class="font-bold col-right-4">Ref No.</div>&nbsp<div class="font-bold"><?=$invoice['invoice_no']?></div>
                            </div>
            			</div>
            		</div>
            	</div>
            </div>
            <table class="item">
                <thead>
                    <tr class="item_list">
                        <th>Amount</th>
                        <th>GST</th>
                        <th>Amount inc GST</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-bottom">$<?=number_format($debit_note['amount'], 2)?></td>
                        <td class="border-bottom"><?=$quotation['gst']?>%</td>
                        <td class="border-bottom border-right">$<?=number_format($debit_note['amount']*($quotation['gst']/100+1), 2)?></td>
                    </tr>
                </tbody>
            </table>
                <div class="col-6_2 text-left">
                    <div class="row">
                        <div class="font-bold">Remark:</div>
                    </div>
                    <div class="row">
                        <div class="font-bold-lg"><?=nl2br($debit_note['remark'])?></div>
                    </div>
                </div>
            <div class="bottom">
            	<div class="inscribe">
            		<table class="inscribe">
            			<tr>
            				<th class="table-col-left-5">Issued By: <?=$debit_note['issued_by']?></th>
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
        </div>    
    </div>
</div>