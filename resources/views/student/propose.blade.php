<x-sidebarStudent>
<div class="container-table101">
<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

<div class="row d-flex justify-content-center">
  <div class="col-10">
    <h1 class="mt-5 text-center">
    Propose Meeting
    </h1>
    <div class="text-center">
    <?php $sv = $users->where('email',$noti->sender)->first(); ?>
    <a >Notice from {{$sv->name}}: </a> 
    <p> {{$noti->notice}}</p>
    </div>
    <form method="post" action="/propose">
      @csrf


      <div class="form-group">
        <label for="time">Time and Date for Meeting</label>
                  <input type="datetime-local" class="form-control @error('time') is-invalid @enderror" name="time" >
                  <input type="hidden" id="sv" name="sv" value="{{$sv->email}}">
                  <input type="hidden" id="student" name="student" value="{{$email}}">
                  <input type="hidden" id="platform" name="platform" value="{{$noti->platform}}">
                  <input type="hidden" id="title_code" name="title_code" value="{{$noti->title_code}}">
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      

      <div class="form-group mt-3">
        <label for="link">Link for {{$noti->platform}}</label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder=""></input>

          <!-- <input type="datetime-local" id="birthdaytime" name="birthdaytime"> -->
          @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="text-left mt-3">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>


    </form>

  </div>
</div>
</div>
</div>
</x-sidebarStudent>