<x-sidebar>

<div class="w3-container ">
 
  
  <!-- <div class="row">
  
    <div class="col "> -->
        <div class="card w3-display-middle w3-hover-shadow " style="width: 32rem; height: auto;">
  
        <div class="card-body">
            <h5 class="card-title"><b>Code {{$title->id}}: {{$title->title}}</b></h5>
            <br>
            <h6 class="card-subtitle mb-3"><b>Supervisor</b>: {{$title->name}}</h6>
            <p class="card-text"><b>Description</b>: {{$title->description}}</p>
            
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

</x-sidebar>