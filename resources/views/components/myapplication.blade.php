<!-- use app\u\papplication;

       $count1 = DB::table('papplications')->where('email',auth()->user()->email)->value('first choice');
       $title1 = DB::table('ptitles')->where('id',$count1)->value('title');
       $count2 = DB::table('papplications')->where('email',auth()->user()->email)->value('second choice');
       $title2 = DB::table('ptitles')->where('id',$count2)->value('title');
       $count3 = DB::table('papplications')->where('email',auth()->user()->email)->value('third choice');
       $title3 = DB::table('ptitles')->where('id',$count3)->value('title');
    //    $count2 = DB::table('papplications')->where('second_choice',$ttl->id)->count('second_choice');
    //    $count3 = DB::table('papplications')->where('third_choice',$ttl->id)->count('third_choice');
    //   $total = $count1 + $count2 + $count3;
       -->
       <div class="container">
  <!-- <div class="row"> -->
<div class="col-4">
      <h1 class="mt-3">My Application</h1>

<ul class="list-group">
  <li class="list-group-item"><b>1)</b> title1</li>
  <li class="list-group-item"><b>2)</b> title2</li>
  <li class="list-group-item"><b>3)</b> title3</li>
  
</ul>
  </div>
</div>
  
  <!-- </div> -->
<!-- </div> -->