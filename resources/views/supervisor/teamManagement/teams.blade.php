
<x-sidebarSupervisor>


<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <h1 class="mt-5 text-center">
            My Titles
            </h1>
          
            
            <table class="w3-table w3-hoverable mt-3">
                <thead>
                      <tr class="w3-grey w3-border">
                        <th>Code</th>
                        <th>Title</th>
                        <th class="text-center">Application</th>
                        <th class="text-center">Details</th>
                        
                        
                       
                      </tr>
                </thead>
                @foreach ($myteam as $ttl)
                    <tr class="w3-border">
                        
                          <td> {{$ttl->id}}</td>
                          <td> {{$ttl->title}}</td>

                        <?php 
                    
                        // $count = DB::table('applications')->where('first choice',$ttl->id)->count('first choice');
                        $count1 = DB::table('firsts')->where('title',$ttl->id)->count('title');
                        $count2 = DB::table('seconds')->where('title',$ttl->id)->count('title');
                        $count3 = DB::table('thirds')->where('title',$ttl->id)->count('title');
                        $count=$count1+$count2+$count3;
                        ?>
                        <td class="text-center">{{$count}}</td>
                          
                      
                           
                            <td class="text-center">
                            <a  href="/supervisor/teams/{{$ttl->id}}"  class="btn btn-info">View</button>
                            </td>
                    </tr>
                @endforeach

            </table>
            </div>
      </div> 
        </div>
        <!-- <div align="right" class="w3-margin">
      <a class="w3-margin btn btn-dark " href="/supervisor/teams" role="button">Back</a>
      </div> -->
    </div>
</div>




</x-sidebarSupervisor>