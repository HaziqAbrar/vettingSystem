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



<x-sidebarCoordinator>




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
                    <th>Department</th>
                    <th>Details</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $id=0;?>
                  @foreach($titleinfos as $titleinfo)
                  @if($titleinfo->level == 'Undergraduate')
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

											<!-- Department -->
											<td>
												@if($titleinfo-> major == 'SE')
													<p>Software Engineering</p>
												@elseif($titleinfo-> major == 'IS')
													<p>Information System</p>
												@elseif($titleinfo-> major == 'AI')
													<p>Artificial Intelligence</p>
												@elseif($titleinfo-> major == 'MM')
													<p>Multimedia</p>
												@elseif($titleinfo-> major == 'STK')
													<p>Computer System and Network</p>
												@endif
											</td>


                      <!-- Detail assign button -->
      				     	  <td class="text-center">
      				     	   <!-- <form action="/info/{{ $titleinfo->id }}" method="get"> -->
      				    		 {{csrf_field()}}
    				    			<div >
    						   			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$id}}" >Details</button>
                        </div>



                      <!-- Modal starts here -->
                      <div class="modal fade" id="myModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" id="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title" id="myModalLabel">Title Detail</h4>
                                    </div>
                                <div class="modal-body">
                                    <center>

                                    <img src="/images/default-avatar.png" alt="gambar supervisor" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                    <h3 class="media-heading"><small> {{ $titleinfo->name }} </small></h3>
                                    <span class="text-uppercase"><strong>{{ $titleinfo->title }}</strong></span>

                                    </center>
                                    <hr>
                                    <center>
                                    <p class="text-left"><strong>Description </strong><br>{{ $titleinfo->description }}</p>
                                    <br>
                                    </center>
                                    <center>
                                      <p class="bold">{{ $titleinfo->status }}</p>
                                    </center>
                                </div>
                                <div class="modal-footer">


                                      <form>
                                      <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </form>
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
                                </div>
                            </div>
                        </div>
                    </div>


        						</td>
        				   </tr>
                   @endif
                   <?php $id+=1; ?>
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


</x-sidebarCoordinator>
