	<!DOCTYPE html>
<html>
<style>
	.backimg {
		background-image: url("<?php echo base_url('assets/back.png'); ?>");
	
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		height:217px;
		width:335px;
		position:relative;
		
	}
	.backimg1 {
		background-image: url("<?php echo base_url('assets/back.png'); ?>");
	
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		height:217px;
		width:335px;
		position:relative;
		float:right;
		top:-217px
	}
	.card-number{
	position: absolute;
    left: 50%;
    top: 70%;
    transform: translate(-50%,-50%);
	font-size:30px;
	letter-spacing:5px;
	color:#fff;
	width:280px;
	
	
		
	}

input[type="text"]
{
    background: transparent;
    border: none;
}
.row1{
	margin:10px 0px;
}
</style>
<body style="height:1122px;width:794px;padding:10px;">
<?php foreach($card_num_list as $list){ ?>

<?php //echo '<pre>';print_r($list);exit; ?>
	<div class="row1" >
	<?php if(isset($list[0]) && $list[0]!=''){ ?>
		<div class="backimg" >
			<h1 class="card-number"><input class="card-number" type="text" style="" value="<?php echo chunk_split(isset($list[0])?$list[0]:'', 4, ' '); ?>"></h1>
		</div>
		<?php } ?>
		<?php if(isset($list[1]) && $list[1]!=''){ ?>
		<div class="backimg1 " >
			<h1 class="card-number"><input class="card-number" type="text" style="" value="<?php echo chunk_split(isset($list[1])?$list[1]:'', 4, ' '); ?>"></h1>
		</div>
		<?php } ?>
	</div>
<?php } ?>
<br>
<div style="margin:20px auto;">	
	<a href="javascript:void(0);" onclick="myFunction()" style="background-color:#003f7f;color:#fff;padding:10px 20px; text-decoration: none;border-radius: 6px;" class="btn btn-primary btn-sm text-center">Print</a>
</div>

</body>
</html>
 <script>
function myFunction() {
    window.print();
}
</script>

<?php //exit; ?>