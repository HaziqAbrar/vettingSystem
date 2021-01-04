<x-sidebarSupervisor>


  <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

  	<div class="row d-flex justify-content-center">
  		<div class="col-12">
  			<h1 class="mt-5 text-center">
  				PROPOSED TITLE LIST
  			</h1>
  			@if (session('status'))
      			<div class="alert alert-success text-center">
          			{{ session('status') }}
      			</div>
  			@endif
  			<div class="text-center mt-3">
  				<a href="/supervisor/create"><button type="button" class="btn btn-primary">Propose a Title</button></a>
  			</div>
  			<table class="w3-table w3-hoverable mt-3">
  			    <thead>
  			      	<tr class="w3-grey w3-border">
  			        	<th>No.</th>
  			        	<th>Title Name</th>
  			        	<th>Year/Session</th>
  			        	<th>Comments</th>
  			        	<th>Status</th>
  			        	<th>Details</th>
  			      	</tr>
  			    </thead>
  			    @foreach ($mytitle as $titleinfo)
  				    <tr class="w3-border">
  				    	<td class="counterCell"></td>
  				      	<td>{{ $titleinfo->title }}</td>
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
  				      	<td>
  				      		@if (empty($titleinfo->comment))
  				      			<p>Not Available</p>
  							    @else
  								    <p>Available</p>
  				      		@endif
  				      	</td>
  				     	   <td>{{ $titleinfo->status }}</td>
    				     	 <td class="text-center">
    				     	   <form action="/titleinfosv/{{ $titleinfo->id }}" method="get">
    				    		 {{csrf_field()}}
    				    			<div >
    						   			<input type="hidden" name="Details" value="Details"></input>
    						   			<button type="submit" class="btn btn-info">Details</button>
    				   				</div>
    							   </form>

                      <form>
                        <div class="mt-3">
                          {{csrf_field()}}
                          <input type="hidden" class="deleteservice" value="{{ $titleinfo->id }}"></input>
                          <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                          <button type="button" class="btn btn-danger servideletebtn">Delete</button>
                        </div>
                      </form>
  						     </td>
  				    </tr>
  				@endforeach

  			</table>
  		</div>
  	</div>
  </div>

  <script>
    $(document).ready(function(){



      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.servideletebtn').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".deleteservice").val();
        // alert(delete_id);

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var data={
              "_token": $('input[name="csrf-token"]').val(),
              "id": delete_id,
            };

            $.ajax({
              type: "DELETE",
              url: '/supervisor/'+delete_id,
              data: data,
              success: function(response){
                swal(response.status, {
                  icon: "success",
                })
                .then((result) => {
                  location.reload();
                });
              }
            });


          }
        });
      });
    });
  </script>




</x-sidebarSupervisor>
