<x-sidebarSupervisor>
<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

<div class="row d-flex justify-content-center">
  <div class="col-10">
    <h1 class="mt-5 text-center">
    Notify Student Meeting
    </h1>
    <div class="text-center">
    <a >Here is for you to notify the students to propose a meeting with you. Students who got the notification will then propose a meeting with you and provide the link for the meeting.</a> 
    </div>
    <form method="post" action="/supervisor/teams/meeting">
      @csrf

      <!-- <div class="form-group mt-3">
        <label for="name">Choose date and time</label>
          <input type="datetime-local" class="form-control @error('time') is-invalid @enderror" name="time" >
          
          @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div> -->
      <!-- <div class="form-group mt-2">
            <label for="level">Platform</label>
            <select v-model="selected" class="form-control @error('level') is-invalid @enderror" name='platform'>

              <option value="Postgraduate" name='level'>Google Meet</option>
              <option value="Undergraduate" name='level'>Microsfot Teams</option>
              <option value="Undergraduate" name='level'>Physical Meeting</option>
            </select>
              
              @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
        </div> -->
      <div class="form-group mt-3">
        <label for="platform">Platform you prefer</label>
          <input type="text" class="form-control @error('platform') is-invalid @enderror" name="platform" >
          <!-- <input type="datetime-local" id="birthdaytime" name="birthdaytime"> -->
          @error('platform')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

    

  

      





      <div class="form-group">
        <label for="notice">Notice</label>
        <textarea rows="10" class="form-control @error('notice') is-invalid @enderror" name="notice"  placeholder="(Your available time and date)" >{{old('description')}}</textarea>
        @error('notice')
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
</x-sidebarSupervisor>