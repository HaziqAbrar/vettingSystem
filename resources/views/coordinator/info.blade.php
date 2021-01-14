<x-sidebarCoordinator>

  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif

  <h1 class="text-center mt-5">Assign Title to Panel</h1>

  <div class="container mt-5 border">
    <h4>Title Details</h4>
    <div class="row">
      <div class=".col-md-6 .offset-md-3  m-3">
        <p>{{$titleinfo->name}}</p>
        <p>{{$titleinfo->title}}</p>
        <p>{{$titleinfo->description}}</p>
        <p>{{$titleinfo->tools}}</p>
        <p>Session {{$titleinfo->session}}</p>

      </div>
    </div>

  </div>

  <!-- <div class="container">

  </div> -->


  <div class="container mt-5 ">
    <div class="row">
      @foreach($panel as $ayam)
      <div class=".col-6 .col-md-4 mt-3 mx-2 p-3 border">
        <h1>{{$ayam->name}}</h1>
        <p>{{$ayam->email}}</p>
        <p>{{$ayam->department}}</p>
        <form method="post" action="/assignpanel">
          {{csrf_field()}}
          <input type="hidden" name="panol" value="{{$ayam->email}}">
          <input type="hidden" name="titid" value="{{$titleinfo->id}}">
          <!-- <button type="button" class="btn btn-secondary">Send</button> -->
          <button type="submit" class=" btn-success btn-sm" id="save" >simpan</button>
        </form>
      </div>
      @endforeach
    </div>
</div>

<script>
  $(document).on("click", "#save", function() {
    $('#message').submit(function(e) {
    e.preventDefault();
    //your ajax funtion here
    $.ajax({
      type: "post",
      url: '/assignpanel',
      data: $(".message").serialize(),
      success: function(store) {

      },
      error: function() {
      }
    });
    });
  });
</script>


</x-sidebarCoordinator>
