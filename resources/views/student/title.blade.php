
<!-- testttt -->

<x-sidebar>



<div >
        <div class=row>
        <h1 class="mt-5 ml-5 text-center">
            FYP TITLE
            </h1>
          </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="row">
            <div class="col-9">
            <table class="w3-table w3-hoverable mt-3">
                <thead>
                      <tr class="w3-grey w3-border">
                        <th>Code</th>
                        <th>Title</th>
                        <th>Supervisor</th>
                        <th class="text-center">Waiting List</th>
                        <th class="text-center">Details</th>
                        
                        
                       
                      </tr>
                </thead>
                @foreach ($titleinfos as $ttl)
                    <tr class="w3-border">
                        
                          <td> {{$ttl->id}}</td>
                          <td> {{$ttl->title}}</td>
                          <td> {{$ttl->name}}</td>

                          <?php 
                           $count = DB::table('applications')->where('first choice',$ttl->id)->count('first choice');
                          ?>
                        <td class="text-center">{{$count}}</td>
                          
                      
                           
                            <td class="text-center">
                            <a  href="/supervisor/teams/{{$ttl->id}}"  class="btn btn-info">View</button>
                            </td>
                    </tr>
                @endforeach

            </table>
            </div>
            <div class="col">
           
            <div class="card w3-hover-shadow ">
          <div class="w3-margin">
        <form method="post" action="/title">
        @csrf
        <div class="form-group">
        <label for="first choice"><b>First Choice</b></label>
        <input autocomplete="off" type="text" class="form-control @error ('first_choice') is-invalid @enderror"
           id="first choice" placeholder="Enter Title Code" name="first choice">
        @error('first_choice')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>

        <form method="post" action="/title">
        <div class="form-group">
        <label for="second choice"><b>Second Choice</b></label>
        <input autocomplete="off" type="text" class="form-control @error ('second_choice') is-invalid @enderror" 
        id="second choice" placeholder="Enter Title Code" name="second choice">
        @error('second_choice')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>

        <form method="post" action="/title">
        <div class="form-group">
        <label for="third choice"><b>Third Choice</b></label>
        <input autocomplete="off" type="text" class="form-control @error ('third_choice') is-invalid @enderror" 
        id="third choice" placeholder="Enter Title Code" name="third choice">
        @error('third_choice')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>
        <button type="submit" class="
         btn btn-primary" style= "width: 14.7rem; float:right;">Apply!</button>
         
        </form>
        </div>
        </div>

        @if (session('status'))
          <div class="mt-3 alert alert-success">
            {{ session('status') }}
          </div>
        @endif

    </div>
  </div>
            </div>
            
            </div>
            </div>
      </div> 
        </div>
        <div align="right" class="w3-margin">
      <a class="w3-margin btn btn-dark " href="/supervisor/teams" role="button">Back</a>
      </div>
    </div>
</div>

</div>



</x-sidebar>
