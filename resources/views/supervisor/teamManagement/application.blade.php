<x-sidebarSupervisor>
<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

<div class="row d-flex justify-content-center">
  <div class="col-12">
    <h1 class="mt-5 text-center">
          Code {{$title->id}} : {{$title->title}}
    </h1>
    <div class="text-center mt-3">
  				<a href="/supervisor/teams/meeting/{{$title->id}}"><button type="submit" class="btn btn-primary">Notify Meeting</button></a>
  			</div>
  </div>
</div>
  
<div class="row py-5">
          <div class="col-lg-12 mx-auto">
            <div class="card rounded shadow border-0">
              <div class="card-body p-5 bg-white rounded">
                <div class="table-responsive">
                  <table id="example" style="width:100%" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Year/Session</th>
                        <th class="text-center">Details</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($apps1 as $app)
            				    <tr class="w3-border">
            				    	<td class="counterCell"></td>
                          <?php $name=$student->where('email',$app->email)->first();?>
            				      	<td>{{$name->getAttribute('name')}}</td>
            				      	<td>{{$app->email}}</td>
                        
            				      	<td>Session 2 of 2019/2020</td>
            				     	  
              				     	 <td class="text-center">
              				     
                              <!-- <form action="/supervisor/teams/title/student" method="post">
                              @csrf
                                <div >
                                  <input type="hidden" name="email" value="{{$app->email}}"></input>
                                  <button type="submit"  class="btn btn-info">Details</button>
                                </div>
                              </form> -->
                                  <a  href="/supervisor/teams/title/{{$app->id}}" type="submit"><u>View</u></a>
                             


            						     </td>
                             <td class="text-center">
                             <form>
                              <div class="">
                                {{csrf_field()}}
                                <input type="hidden" class="acceptservice1" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-info serviacceptbtn1">Accept</button>
                            

                              </div>
                            </form>
                              <form>
                              <div class="mt-3">
                                {{csrf_field()}}
                                <input type="hidden" class="deleteservice1" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-danger servideletebtn1">Reject</button>
                            

                              </div>
                            </form>
                             </td>
            				    </tr>
                        <script>
       
      
    $(document).ready(function(){

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.serviacceptbtn1').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".acceptservice1").val();
        // alert(delete_id);

        swal({
          title: "Accept student?",
          text: "Accepted student will appear under your team ",
          type: "info",
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
              url: '/supervisor/teamManagement1/accept/'+delete_id,
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
      $('.servideletebtn1').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".deleteservice1").val();
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
              url: '/supervisor/teamManagement1/'+delete_id,
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
            				@endforeach
                      @foreach($apps2 as $app)
            				    <tr class="w3-border">
            				    	<td class="counterCell"></td>
                          <?php $name=$student->where('email',$app->email)->first();?>
            				      	<td>{{$name->getAttribute('name')}}</td>
            				      	<td>{{$app->email}}</td>
                        
            				      	<td>Session 2 of 2019/2020</td>
            				     	  
              				     	 <td class="text-center">
              				     
                              <!-- <form action="/supervisor/teams/title/student" method="post">
                              @csrf
                                <div >
                                  <input type="hidden" name="email" value="{{$app->email}}"></input>
                                  <button type="submit"  class="btn btn-info">Details</button>
                                </div>
                              </form> -->
                                  <a  href="/supervisor/teams/title/{{$app->id}}" type="submit"><u>View</u></a>
                             


            						     </td>
                             <td class="text-center">
                             <form>
                              <div class="">
                                {{csrf_field()}}
                                <input type="hidden" class="acceptservice2" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-info serviacceptbtn2">Accept</button>
                            

                              </div>
                            </form>
                              <form>
                              <div class="mt-3">
                                {{csrf_field()}}
                                <input type="hidden" class="deleteservice2" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-danger servideletebtn2">Reject</button>
                            

                              </div>
                            </form>
                             </td>
            				    </tr>
                        <script>

      
    $(document).ready(function(){

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.serviacceptbtn2').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".acceptservice2").val();
        // alert(delete_id);

        swal({
          title: "Accept student?",
          text: "Accepted student will appear under your team",
          type: "info",
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
              url: '/supervisor/teamManagement2/accept/'+delete_id,
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
      $('.servideletebtn2').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".deleteservice2").val();
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
              url: '/supervisor/teamManagement2/'+delete_id,
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
            				@endforeach
                      @foreach($apps3 as $app)
            				    <tr class="w3-border">
            				    	<td class="counterCell"></td>
                          <?php $name=$student->where('email',$app->email)->first();?>
            				      	<td>{{$name->getAttribute('name')}}</td>
            				      	<td>{{$app->email}}</td>
                        
            				      	<td>Session 2 of 2019/2020</td>
            				     	  
              				     	 <td class="text-center">
              				     
                              <!-- <form action="/supervisor/teams/title/student" method="post">
                              @csrf
                                <div >
                                  <input type="hidden" name="email" value="{{$app->email}}"></input>
                                  <button type="submit"  class="btn btn-info">Details</button>
                                </div>
                              </form> -->
                                  <a  href="/supervisor/teams/title/{{$app->id}}" type="submit"><u>View</u></a>
                             


            						     </td>
                             <td class="text-center">
                             <form>
                              <div class="">
                                {{csrf_field()}}
                                <input type="hidden" class="acceptservice3" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-info serviacceptbtn3">Accept</button>
                            

                              </div>
                            </form>
                              <form>
                              <div class="mt-3">
                                {{csrf_field()}}
                                <input type="hidden" class="deleteservice3" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-danger servideletebtn3">Reject</button>
                            

                              </div>
                            </form>
                             </td>
            				    </tr>
                        <script>
      
    $(document).ready(function(){

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.serviacceptbtn3').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".acceptservice3").val();
        // alert(delete_id);

        swal({
          title: "Reject student?",
          text: "Accepted student will appear under your team",
          type: "info",
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
              url: '/supervisor/teamManagement3/accept/'+delete_id,
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
      $('.servideletebtn3').click(function(e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find(".deleteservice3").val();
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
              url: '/supervisor/teamManagement3/'+delete_id,
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
            				@endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mr-5" align="center">
    <!-- <a class="w3-margin btn btn-dark message" href="/supervisor/application" role="button">Back</a> -->
   <a class="w3-margin btn btn-dark" href="/supervisor/teams" role="button">Back</a>
       
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button> -->
    </div>



      <script>
          $(document).ready(function() {
            $('#example').DataTable();
          });
      </script>


     

</div>
</x-sidebarSupervisor>