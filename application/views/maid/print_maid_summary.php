<!DOCTYPE html>
<html>
<head>
	<title></title>

	
	
	
	<link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style type="text/css">
	body{
		font-family: sans-serif;
		font-size: 14px;
	}


	img{
		height: 250px;
		width: 250px;
		margin: 50px 0px 50px 0px;
	}

	.table-cont{
		padding: 0% 15%;
	}


</style>


<script type="text/javascript">window.print();</script>
	<center>
<?php if(!empty($maid)) {?>


		<img  src="<?=base_url()?><?=$maid['maid_img']?>">

<div class="table-cont">
	<table class="table table-striped table-hover">
        
                        <tbody>
                                
                                <tr>
                                    <td>
                                        <b>Name</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_name']?>
                                   </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>Ref No</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_ref_no']?>
                                   </td>
                                </tr>
                                                        

                                <tr>
                                    <td>
                                        <b>Date of birth</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_bday']?>
                                   </td>
                                </tr>

                                  <tr>
                                    <td>
                                        <b>Age</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_age']?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Place of birth</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_place_birth']?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Height</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_height']?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Weight</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_weight']?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Nationality</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_nationality']?>
                                   </td>
                                </tr>

                                

                                <tr>
                                    <td>
                                        <b>Religion</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_religion']?>
                                   </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Education Level</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_educ']?>
                                   </td>
                                </tr>

                             

                                <tr>
                                    <td>
                                        <b>Marital status</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_mar_status']?>
                                   </td>
                                </tr>

                                 <tr>
                                    <td>
                                        <b>Salary</b>
                                   </td> 
                                   <td>
                                        <?=$maid['maid_salary']?>
                                   </td>
                                </tr>

                        </tbody>
                    </table>
            </div>


<?php }else { ?>

<h3>	Maid Not Found.	</h3>
<?php } ?>
</center>

</body>
</html>
