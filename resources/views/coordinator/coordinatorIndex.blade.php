


<x-sidebarCoordinator>

<!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">

          <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

          	<div class="row d-flex justify-content-center">
          		<div class="col-10">
          			<h3 class="mt-5 text-center">
          				UNDERGRADUATE TITLE LIST
          			</h3> -->
          			<!-- <div class="text-center mt-5">
          				<a href="#"><button type="button" class="btn btn-primary">Full Title Proposal List</button></a>
          			</div> -->

                <!-- <ul class="list-group mt-5 ">
          				@foreach($titleinfos as $titleinfo)
          					@if($titleinfo->level=='Postgraduate')
          						<li class="listinging list-group-item  align-items-center">
          							<div class="w3-row-padding">
          								<div class="w3-col m5 l6">{{ $titleinfo->title }}</div>
          								<div class="w3-col m3 l3">{{ $titleinfo->name }}</div>
          								<div class="w3-col m3 l2">{{ $titleinfo->created_at->format('d F Y') }}</div>

          								<div class="w3-col m1 l1">
          									<a href="#" class="w3-button w3-blue w3-round-large" style="padding: 5px;">Details</a>
          								</div>
                        </div>
          						</li>
          					@endif
          				@endforeach
            		</ul>
              </div>
            </div>
          </div> -->


<div class="container py-5">
  <header class="text-center text-white">
    <h1 class="display-4">Awaiting Assign</h1>


  </header>
  <div class="row py-5">
    <div class="col-lg-12 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Proposal by</th>
                  <th>Session</th>
                  <!-- <th>Comment</th> -->
                  <th>Assign</th>
                </tr>
              </thead>

              <tbody>
                @foreach($titleinfos as $titleinfo)
      				    <tr class="w3-border">

                    <!-- Title ID -->
      				    	<td class="counterCell"></td>


                    <!-- Title name -->
      				      <td>{{ $titleinfo->title }}</td>


                    <!-- Proposer name -->
  				     	    <td>{{ $titleinfo->name }}</td>


                    <!-- Session -->
    				      	<td>Session {{ $titleinfo->session }} of <span id="{{ $titleinfo->id }}">{{ $titleinfo->created_at->format('Y') }}</span>/<span id="nani{{$titleinfo->id }}"></span></td>
                    <script>

                          var tahun1 =parseInt(document.getElementById("{{ $titleinfo->id }}").innerHTML);
                          var tahun2;
                          if ({{ $titleinfo->session }}==1) {
                             tahun2 = tahun1 + 1;
                          } else {
                            tahun2 = tahun1;
                            tahun1 = tahun1 - 1;
                          }
                          document.getElementById("{{  $titleinfo->id }}").innerHTML = tahun1;
                          document.getElementById("nani{{  $titleinfo->id }}").innerHTML = tahun2;
                    </script>


                    <!-- Comment availability -->
    				      	<!-- <td>
    				      		@if (empty($titleinfo->comment))
    				      			<p>Not Available</p>
    							    @else
    								    <p>Available</p>
    				      		@endif
    				      	</td> -->


                    <!-- Detail assign button -->
    				     	  <td class="text-center">
    				     	   <!-- <form action="/info/{{ $titleinfo->id }}" method="get"> -->
    				    		 {{csrf_field()}}
  				    			<div >
  						   			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Details</button>
  				   				</div>


                    <!-- Modal starts here -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title" id="myModalLabel">Title Detail</h4>
                                  </div>
                              <div class="modal-body">
                                  <center>
                                  <img src="" alt="gambar supervisor" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                  <!-- <h3 class="media-heading"> {{ $titleinfo->session }} <small> {{ $titleinfo->name }} </small></h3> -->
                                  <span><strong>Tools needed: </strong></span>
                                      <span class="label label-warning">HTML5/CSS</span>
                                      <span class="label label-info">Adobe CS 5.5</span>
                                      <span class="label label-info">Microsoft Office</span>
                                      <span class="label label-success">Windows XP, Vista, 7</span>
                                  </center>
                                  <hr>
                                  <center>
                                  <p class="text-left"><strong>Bio: </strong><br>
                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                                  <br>
                                  </center>
                              </div>
                              <div class="modal-footer">

                                    <form>
                                      <div class="mt-3">
                                        {{csrf_field()}}
                                        <input type="hidden" class="assignservice" value="{{  $titleinfo->id }}"></input>
                                        <button type="button" class="btn btn-danger serviassignbtn">Assign</button>
                                      </div>
                                    </form>
                                    <form>
                                    <div class="mt-3">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>


      						</td>
      				   </tr>
      				 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Datatable JS -->
<script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
</script>

<!-- Assign button JS -->
<script>
  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('.serviassignbtn').click(function(e){
      e.preventDefault();

      var assign_id = $(this).closest("tr").find(".assignservice").val();
      // alert(delete_id);

      var data={
        "_token": $('input[name="csrf-token"]').val(),
        "id": assign_id,
      };



          $.ajax({
            type: "GET",
            url: '/info/'+assign_id,
            data: data,
            success: function(response){
                window.location.href = "/info/"+assign_id ;
            }
          });



      });
    });

</script>


</x-sidebarCoordinator>
