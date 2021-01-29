


<x-sidebarCoordinator>

  @if (session('status'))
  		<div class="alert alert-success text-center mt-5 mb-3">
  				{{ session('status') }}
  		</div>
  @endif

  <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

  	<div class="row d-flex justify-content-center">
  		<div class="col-10">
  			<h1 class="mt-5 text-center">
  				PENDING PROPOSED TITLE LIST
  			</h1>
  			<div class="text-center mt-5">
  				<a href="/coordinator/alltitle"><button type="button" class="btn btn-primary">Full Title Proposal List</button></a>
  			</div>

  			<ul class="list-group mt-5 ">
  				@foreach($assignto as $titleinfo)
  					@if($titleinfo->status=='Pending' && $titleinfo->level=='Undergraduate')
  						<li class="listinging list-group-item  align-items-center">
  							<div class="w3-row-padding">
  								<div class="w3-col m5 l6">{{ $titleinfo->title }}</div>
  								<div class="w3-col m3 l3">{{ $titleinfo->name }}</div>
  								<div class="w3-col m3 l2">{{ $titleinfo->created_at }}</div>
  								<div class="w3-col m1 l1">
  									<a href="/titledetail/{{ $titleinfo->id}}" class="w3-button w3-blue w3-round-large" style="padding: 5px;">Details</a>
  								</div>

  							</div>
  						</li>
  					@endif
  				@endforeach
  			</ul>
  		</div>
  	</div>
  </div>


</x-sidebarCoordinator>
