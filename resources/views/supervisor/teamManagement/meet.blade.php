<x-sidebarSupervisor>
<div class="container mt-5" style="border:solid; padding-bottom: 30px;">

<div class="row d-flex justify-content-center">
  <div class="col-10">
    <h1 class="mt-5 text-center">
    Notify Student Meeting
    </h1>
    <div class="text-center">
    <a >Here is for you to notify the preferred students to propose a meeting with you.</a> 
    </div>
    <form method="post" action="/supervisor">
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
        <label for="name">Link</label>
          <input type="text" class="form-control @error('Link') is-invalid @enderror" name="Link" >
          <!-- <input type="datetime-local" id="birthdaytime" name="birthdaytime"> -->
          @error('Link')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

    

  

      





      <div class="form-group">
        <label for="description">Description</label>
        <textarea rows="10" class="form-control @error('description') is-invalid @enderror" name="description"  id="demo" >{{old('description')}}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <button onclick="myFunction()">Try it</button>



<script>
var fruits = ["Banana", "Orange", "Apple", "Mango"];
document.getElementById("demo").innerHTML = fruits;

function myFunction() {
  fruits.push("Kiwi");
  document.getElementById("demo").innerHTML = fruits;
}
</script>

      <div class="text-left mt-3">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>


    </form>
    <button onclick="myFunction()">Try it</button>
  </div>
</div>
</div>
</x-sidebarSupervisor>