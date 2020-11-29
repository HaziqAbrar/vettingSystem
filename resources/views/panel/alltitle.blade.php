<style>
  table {
      counter-reset: tableCount;
  }
  .counterCell:before {
      content: counter(tableCount);
      counter-increment: tableCount;
  }


  .btnstyle a{
    padding: 10px;
    margin: 5px;"
  }

  .box{
    border: solid;
    padding: 0 5px;
  }
</style>



<x-sidebarPanel>




  <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

  	<div class="row d-flex justify-content-center">
  		<div class="col-12" style="padding-bottom:20px;">

          @foreach($titleinfos as $titleinfo)
            @if($titleinfo->level=='Postgraduate')

            <h1 class="mt-5 text-center" style="text-transform:uppercase; padding-bottom:20px; ">
              FULL {{ $titleinfo->level }} TITLE LIST
            </h1>
              @break
            @endif
          @endforeach


  			@if (session('status'))
      			<div class="alert alert-success text-center">
          			{{ session('status') }}
      			</div>
  			@endif

  			<table class="w3-table w3-hoverable mt-3">
  			    <thead>
  			      	<tr class="w3-grey w3-border">
  			        	<th>No.</th>
  			        	<th>Title Name</th>
  			        	<th>Name</th>
  			        	<th>Year/Sesion</th>
  			        	<th>Comments</th>
  			        	<th>Status</th>
  			        	<th>Details</th>
  			      	</tr>
  			    </thead>
  			    @foreach($titleinfos as $titleinfo)
  				    <tr class="w3-border">
  				    	<td class="counterCell"></td>
  				      	<td>{{ $titleinfo->title }}</td>
  				      	<td>{{ $titleinfo->name }}</td>
  				      	<td>Session 2 of 2020</td>
  				      	<td>
  				      		@if(empty($titleinfo->comment))
  								<p>Not Available</p>
  							@else
  								<p>Available</p>
  							@endif
  				      	</td>
  				     	<td>{{ $titleinfo->status }}</td>
  				     	<td>
  				     		<form action="#" method="get">
  				    		{{csrf_field()}}
  				    			<div >
  						   			<input type="hidden" name="Details" value="Details"></input>
  						   			<button type="submit" class="btn btn-info">Details</button>
  				   				</div>
  							</form>
  						</td>
  				    </tr>
  				@endforeach

  			</table>
  		</div>
  	</div>
  </div>


</x-sidebarPanel>
