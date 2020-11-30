
<x-sidebarSupervisor>


  <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

  	<div class="row d-flex justify-content-center">
  		<div class="col-12">
  			<h1 class="mt-5 text-center">
              Code {{$title->id}} : {{$title->title}}
  			</h1>
  			@if (session('status'))
      			<div class="alert alert-success text-center">
          			{{ session('status') }}
      			</div>
  			@endif
  			
  			<table class="w3-table w3-hoverable mt-3">
  			    <thead>
  			      	<tr class="w3-grey w3-border">
  			        	<th>No.</th>
  			        	<th>Student Email</th>
  			        	<th>Year/Session</th>
  			        	
  			        	
  			        	<th class="text-center">Details</th>
  			      	</tr>
  			    </thead>
  			    @foreach($apps as $app)
  				    <tr class="w3-border">
  				    	<td class="counterCell"></td>
  				      	<td> {{$app->email}}</td>
  				      	<td>Session 2 of 2019/2020</td>
  				      
  				     	  
    				     	 <td class="text-center">
    				     	   <form action="/supervisor/teams/title/student" method="post">
    				    		 @csrf
    				    			<div >
    						   			<input type="hidden" name="email" value="{{$app->email}}"></input>
    						   			<button type="submit"  class="btn btn-info">Details</button>
                         <!-- <a  type="submit"  class="btn btn-info">View</button> -->
    				   				</div>
    							   </form>
                 
                      <form>
                        <div class="mt-3">
                          {{csrf_field()}}
                          <input type="hidden" class="deleteservice" value=""></input>
                          <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                          <button type="button" class="btn btn-danger servideletebtn">Reject</button>
                       

                        </div>
                      </form>
  						     </td>
  				    </tr>
  				@endforeach

  			</table>
              </div>
        </div> 
  		</div>
          <div align="right" class="w3-margin">
        <!-- <a class="w3-margin btn btn-dark " href="/supervisor/teams" role="button">Back</a> -->
       
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
          title: "Reject student?",
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
