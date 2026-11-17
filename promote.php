<?php require_once 'includes/header.php'; ?>

<?php
$sql="SELECT * FROM offers2 ORDER BY id DESC";
$result=$connect->query($sql);

?>


<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Promote</li>
		</ol>

		<div class="panel panel-default" id="offer<?php echo $offer_id;?>">
			<div class="panel-heading">
			<h3 style="text-align: center;"><?php echo 'Promote website: www.'.$storename.'.av.ke'; ?></h3>
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
			<div class="col-md-6" id="copyText">
			 <?php $textToshare = ' Hello, I set up my online store. Enjoy shopping at: http://www.'.$storename.'.av.ke ';
			 echo 'COPY TEXT THAT YOU CAN SHARE:<br/>'. $textToshare;
			 ?>
			 </div>
			 <!--
			 <div class="col-md-3" style="margin-bottom: 10px;" ><button id="copyButton" style="-webkit-appearance:none;" onclick="copyToClipboard('copyText')" >
			  Copy text <i class="fa fa-copy" style="font-size: 32px;margin-left:5px;margin-right:  45px;"></i></button>
			 </div>-->
			 <div class="col-md-6">
			 <ul style="text-align: center;margin-bottom: 1">

			

						Share on
						<a href="http://www.facebook.com/sharer.php?u=http://<?php echo $storename; ?>.av.ke/&t=visit my online store" target="_blank" class="fa fa-facebook icon facebook" style="margin-left: 5px;font-size: 32px;"></a>
						<!--<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>-->
						
						<a href="https://twitter.com/share?url=http://<?php echo $storename; ?>.av.ke/&amp;text=Hello, I set up my online store. Enjoy shopping on my website: &amp;hashtags=<?php echo $storename;?>" target="_blank" class="fa fa-twitter icon twitter" style="margin-left: 15%;font-size: 32px;"> </a>

						
						<a href="whatsapp://send?text=<?php echo $textToshare;?>" data-action="share/whatsapp/share" class="fa fa-whatsapp" style="margin-left: 15%;font-size: 32px;"></a>

					
						<!--<li><a href="#" class="fa fa-instagram icon fa-instagram"> </a></li>-->
						<!--<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> -->
					
			

			</ul>
			 
			
			 </div>


			</div>
			</div>
			<!--offers title-->
			<ol class="breadcrumb">
		  	  
		  <li class="active">Offers</li>
		</ol>

<?php
while ($row=$result->fetch_assoc()){
	
	$offer_id=$row['id'];
	$title=$row['title'];
	$image_url=$row['image'];
	if($image_url==''){
		$image_url=$row['original_image'];
	}
	$product_id=$row['product_id'];


	$sqlproduct="SELECT name,image,price,profit FROM products WHERE id='$product_id'";
	$result2=$connect->query($sqlproduct);
	while($row=$result2->fetch_assoc()){
		$product_name=$row['name'];
		$product_price=$row['price'];
		$product_image=$row['image'];
		$product_profit=$row['profit'];
	}

?>

		

		<div class="panel panel-default" id="offer<?php echo $offer_id;?>">
			<div class="panel-heading">
			<h3 style="text-align: center;"><?php echo $title; ?></h3>
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">

			<div class="col-md-8">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $product_name; ?>" width="100%" >
			</div>
			<div class="col-md-4">
			<img src="<?php echo substr($product_image, 3);?>" alt="<?php echo $product_name; ?>" width="70%" style="margin: 0 15%";>
			<h3 style="text-align: center;"><?php echo $product_name; ?></h3>
			<h4 style="text-align: center;"><?php echo "Price: ".$product_price; ?></h4>
			<h4 style="text-align: center;"><?php echo "Profit: ".$product_profit; ?></h4><br/>
			
					<ul style="text-align: center;margin-bottom: 1">
						<div class="col-md-9">
						<h4>Share on</h4>
						<a href="http://www.facebook.com/sharer.php?u=http://.<?php echo $storename; ?>.av.ke/offers.php?offer=<?php echo $offer_id;?>" target="_blank" style="font-size: 32px;"><i class="fa fa-facebook"></i></a>
						<!--<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>-->
						
						<a href="https://twitter.com/share?url=http://<?php echo $storename; ?>.av.ke/offers.php?offer=<?php echo $offer_id;?>&amp;text=Hello, check out this amazing offer on my online store. Enjoy shopping.&amp;hashtags=<?php echo $storename;?>" target="_blank" class="fa fa-twitter icon twitter" style="margin-left: 15%;font-size: 32px;"> </a>

						
						<a href="whatsapp://send?text=Hello, check out this amazing offer on my online store. Enjoy shopping. http://<?php echo $storename; ?>.av.ke/offers.php?offer=<?php echo $offer_id;?>" data-action="share/whatsapp/share" class="fa fa-whatsapp" style="margin-left: 15%;font-size: 32px;"></a>

					</div>
					<div class="col-md-3">
						<!--without jpeg at the end, you get file instead of image at times-->
							<a href="<?php echo $image_url;?>" download="<?php echo $title;?>.jpeg"><div style="text-align: center;"><h4>Download</h4></div></a>
							   <a href="<?php echo $image_url;?>" download="<?php echo $title;?>.jpeg" class="fa fa-download" style="font-size: 32px;"></a>
					</div>

							   
							
						<!--<li><a href="#" class="fa fa-instagram icon fa-instagram"> </a></li>-->
						<!--<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="#" class="fa fa-rss icon rss"> </a></li> -->
					
				
			<a href="orders.php?o=add&id=<?php echo $product_id;?>"><button  type="submit" class="btn btn-success" id="generateReportBtn" style="margin: 5px 30%;width:40%"> <i class="glyphicon glyphicon-ok-sign"></i> Sell Now</button></a>

			</ul>
		
		<br/>
			</div>


				
				
			</div>
			<!-- /panel-body -->
		</div>
		</br>
		</br>

		<?php }
?>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/report.js"></script>
<script type="text/javascript">

<?php require_once 'includes/footer.php'; ?>