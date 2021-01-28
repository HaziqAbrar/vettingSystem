<x-sidebarStudent>
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/css/util.css">
	<link rel="stylesheet" type="text/css" href="/table/css/main.css">
<!--===============================================================================================-->
</head>
<div class="container-table100">
 
  
  <!-- <div class="row">
  
    <div class="col "> -->
        <div class="card w3-display-middle w3-hover-shadow " style="width: 32rem; height: auto;">
  
        <div class="card-body">
            <h5 class="card-title"><b>Code {{$title->id}}: {{$title->title}}</b></h5>
            <br>
            <h6 class="card-subtitle mb-3"><b>Supervisor</b>: {{$title->name}}</h6>
            <p class="card-text"><b>Description</b>: {{$title->description}}</p>
            <p class="card-text"><b>Tools</b>: {{$title->tools}}</p>
            
            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
        </div>
        <a class="w3-margin btn btn-dark" href="/title" role="button">Back</a>
        </div> 
      
      <!-- </div>
  </div> -->
</div>


</body>
</html>

</x-sidebarStudent>