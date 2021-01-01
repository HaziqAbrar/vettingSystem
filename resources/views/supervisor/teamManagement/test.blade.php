<x-sidebarSupervisor>
<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

<div class="row d-flex justify-content-center">
  <div class="col-12">
    <h1 class="mt-5 text-center">
          Code {{$title->id}} : {{$title->title}}
    </h1>
    <div class="text-center mt-3">
  				<a href="/supervisor/teams/meeting"><button type="button" class="btn btn-primary">Arrange Meeting</button></a>
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
                      @foreach($apps as $app)
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
                             <td>
                             <form>
                              <div class="">
                                {{csrf_field()}}
                                <input type="hidden" class="deleteservice" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-info servideletebtn">Accept</button>
                            

                              </div>
                            </form>
                              <form>
                              <div class="mt-3">
                                {{csrf_field()}}
                                <input type="hidden" class="deleteservice" value="{{$app->id}}"></input>
                                <!-- <input type="hidden" name="Delete" value="Delete"></input> -->
                                <button type="button" class="btn btn-danger servideletebtn">Reject</button>
                            

                              </div>
                            </form>
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
              url: '/supervisor/teamManagement/'+delete_id,
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

</div>
</x-sidebarSupervisor>