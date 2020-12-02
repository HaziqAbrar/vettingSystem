<x-sidebar>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<x-jet-section-border />
<div>
  <form action="/portfolio" method="post">
  @csrf
    <label for="fname">Full Name</label>
    <input type="text" id="name" name="name" value="{{$student->name}}" >

    <label for="lname">Email</label>
    <input type="text" id="email" name="email" value="{{$student->email}}">
    
    <label for="lname">Department</label>
    <input type="text" id="department" name="department" value="{{$student->department}}">

    <label for="lname">Year</label>
    <input type="text" id="year" name="year" value="{{$student->year}}">

    <label for="lname">Latest CGPA</label>
    <input type="text" id="cgpa" name="cgpa" value="{{$student->cgpa}}">

    <label for="lname">Skills</label>
    <input type="text" id="skills" name="skills" value="{{$student->skills}}">
    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" value="Submit">
  </form>
  @if (session('status'))
          <div class=" alert alert-success">
            {{ session('status') }}
          </div>
        @endif
</div>

<x-jet-section-border />

</x-sidebar>