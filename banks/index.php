<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style type="text/css">
.navbar-inverse{
	border-radius:0px 0px 0px 0px;
}
.input-types{
	height:50px;
	border-radius:0px 0px 0px 0px;
	font-family: 'Lato',sans-serif;
	font-size:18px;
}	
h6{font-family: 'Lato', sans-serif; font-size:22px;font-weight:600}
h7{font-family: 'Lato', sans-serif; font-size:182px;}
</style>
</head>
<body>
<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bank Details</a>
    </div>
  </div>
</nav>


<div class="container" style="margin-top:100px">
	<div class="form-horizontal">
	  	<legend><h6><center>SEARCH BANK BRANCH AND IFSC</center></h6></legend>
	    <div class="form-group" style="margin-top:30px">
	      <div class="col-lg-12">
	        <input type="text" class="form-control input-types" id="bank_name" onkeypress="check_bank()" placeholder="ENTER YOUR BANK NAME">
	      </div>
	    </div>
	    <div class="form-group" style="margin-top:20px">
	      <div class="col-lg-12">
	        <input type="text" class="form-control input-types" id="bank_branch" onkeypress="check_branch()" placeholder="ENTER YOUR BRANCH NAME">
	      </div>
	    </div>
		<div class="container" id='data_show' style="max-height:300px;overflow-y:scroll"></div>
	</div>

</div>


</body>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

function check_branch(){
    var bank_branch = $("#bank_branch").val();
    var bank_name = $("#bank_name").val();
   	
   	var xmlhttp; 
	  if(window.XMLHttpRequest)
	  { //code for IE7+, firefox, chrome, opera,safari
	    xmlhttp = new XMLHttpRequest();
	  }else{
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	    var xmlhttp = new XMLHttpRequest();
	  
	    xmlhttp.onreadystatechange = function()
	  {
	    if(xmlhttp.readyState==4 && xmlhttp.status==200){
	    	//console.log(xmlhttp.responseText);
	   		document.getElementById('data_show').innerHTML = xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open('GET','forms/bank.php?bank_branch='+bank_branch+'&bank_name='+bank_name,true);
	  xmlhttp.send();
}

function check_bank(){
    var bank_name = $("#bank_name").val();
   	
   	var xmlhttp; 
	  if(window.XMLHttpRequest)
	  { //code for IE7+, firefox, chrome, opera,safari
	    xmlhttp = new XMLHttpRequest();
	  }else{
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	    var xmlhttp = new XMLHttpRequest();
	  
	    xmlhttp.onreadystatechange = function()
	  {
	    if(xmlhttp.readyState==4 && xmlhttp.status==200){
	    	//console.log(xmlhttp.responseText);
	   		document.getElementById('data_show').innerHTML = xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open('GET','forms/bank.php?bank_name='+bank_name,true);
	  xmlhttp.send();
}



</script>

</html>