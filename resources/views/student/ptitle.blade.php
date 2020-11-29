<x-sidebar>







<div >
  <div class="row">
    <div class="col">
      <h1 >FYP TITLE</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="text-center">Code</th>
      <th scope="col" class="text-center">Title</th>
      <th scope="col" class="text-center">Supervisor</th>
      <th scope="col" class="text-center">WaitingList</th>
      
    </tr>
  </thead>
  <tbody>
 
  @foreach ($titleinfos as $ttl)
    <tr>
      <th scope="row" class="text-center">{{$ttl->id}}</th>
      <td class="text-center">
      <h5><a href="/title/{{$ttl->id}}"><b>
      <u >{{$ttl->title}}</u></b></a></h5>
      </td>
      <td class="text-center">{{$ttl->name}}</td>
      <?php 
     
       
     
       $count1 = DB::table('applications')->where('first choice',$ttl->id)->count('first choice');
       $count2 = DB::table('applications')->where('second choice',$ttl->id)->count('second choice');
       $count3 = DB::table('applications')->where('third choice',$ttl->id)->count('third choice');
      $total = $count1 + $count2 + $count3;
      ?>
      <td class="text-center">{{$total}}</td>
  
    </tr>
    
    @endforeach
  
  </tbody>
</table>
    </div>
    </div>

    <div class="col">
    <div class="card w3-hover-shadow ">
    <div class="w3-margin">
        <form method="post" action="">
        @csrf
        <div class="form-group">
        <label for="first choice"><b>First Choice</b></label>
        <input autocomplete="off" type="text" class="form-control @error ('first_choice') is-invalid @enderror"
           id="first choice" placeholder="Enter Title Code" name="first choice">
        @error('first_choice')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>

        <form method="post" action="">
        <div class="form-group">
        <label for="second choice"><b>Second Choice</b></label>
        <input autocomplete="off" type="text" class="form-control @error ('second_choice') is-invalid @enderror" 
        id="second choice" placeholder="Enter Title Code" name="second choice">
        @error('second_choice')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>

        <form method="post" action="">
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

    

   


</x-sidebar>