<x-sidebarSupervisor>


  <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

    <div class="row d-flex justify-content-center">
      <div class="col-10">
        <h1 class="mt-5 text-center">
        PROPOSED TITLE LIST
        </h1>
        <form method="post" action="/supervisor">
          @csrf

          <div class="form-group mt-3">
            <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name='name' placeholder="Write name here" value="{{old('name')}}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name='email' placeholder="Write email here" value="{{old('email')}}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="title">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name='title' placeholder="Write title here" value="{{old('title')}}">
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>


          <div class="form-group">
            <label for="level">Level of Study</label>
            <select v-model="selected" class="form-control @error('level') is-invalid @enderror" name='level'>
              <!-- This slot appears above the options from 'options' prop -->

              <option :value=null :disabled>-- Please select an option --</option>

              <!-- These options will appear after the ones from 'options' prop -->
              <option value="Postgraduate" name='level'>Postgraduate</option>
              <option value="Undergraduate" name='level'>Undergraduate</option>
            </select>
              <!-- <input type="text" class="form-control @error('level') is-invalid @enderror" name='level' placeholder="Write level here" value="{{old('level')}}"> -->
              @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>


          <div class="form-group">
            <label for="level">Session</label>
            <select v-model="selected" class="form-control @error('session') is-invalid @enderror" name='session'>
              <!-- This slot appears above the options from 'options' prop -->

              <option :value=null :disabled>-- Please select an option --</option>

              <!-- These options will appear after the ones from 'options' prop -->
              <option value="1" name='session'>1</option>
              <option value="2" name='session'>2</option>
            </select>
              <!-- <input type="text" class="form-control @error('level') is-invalid @enderror" name='level' placeholder="Write level here" value="{{old('level')}}"> -->
              @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>


          <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="10" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="(Write down description here)" >{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>


          <div class="text-left mt-3">
            <button type="submit" class="btn btn-primary">Propose Title</button>
          </div>


        </form>
      </div>
    </div>
  </div>


</x-sidebarSupervisor>
