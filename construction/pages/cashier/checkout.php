<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>
<br>
<br>
<body onLoad="document.getElementById('country').focus();">
<br>
<br>
<form action="savesales.php" method="post">
<div id="ac">
<input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="hidden" name="tvat" value="<?php echo $_GET['totalvat']; ?>" />
<input type="hidden" name="tamount" value="<?php echo $_GET['total']; ?>" />
<input type="hidden" name="tcharge" value="<?php echo $_GET['tcharge']; ?>" />
<input type="hidden" name="tdiscount" value="<?php echo $_GET['tdiscount']; ?>" />
<input type="hidden" name="btype" value="<?php echo $_GET['btype']; ?>" />
<input type="hidden" name="tvatper" value="<?php echo $_GET['totalvatper']; ?>" />
<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
<input type="hidden" name="cashier"/>
<input type="hidden" name="p_amount" value="<?php echo $_GET['p_amount']; ?>" />
<input type="text" size="25" value="" name="cname" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" placeholder="Enter Customer Name" style="width: 268px;" /><br><br>
     
      <div class="suggestionsBox" id="suggestions" style="display: none;">
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
<?php
$asas=$_GET['pt'];
if($asas=='credit') {
?><input type="date" name="due" placeholder="Due Date" style="width: 268px; margin-bottom: 15px;" /><br>
<?php
}
if($asas=='cash') {
?><input type="hidden" name="cash" placeholder="Cash" style="width: 268px; margin-bottom: 15px;" /><br>
<?php
}
?><input class="btn btn-primary btn-block" type="submit" value="save" style="width: 268px;" />
</div>
</form>
</body>
</html>