<x-sidebar>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- W3 Schools -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script> -->

    <title>@yield('title')</title>
<style>
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
          }
    .card-1 {
      
    }
    .my-custom-scrollbar {
        position: relative;
        height: 400px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
</style>

<div >
  <div class="row">
    <div class="col">
      <h1 >Postgraduate</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Title</th>
      <th scope="col">Supervisor</th>
      <th scope="col">WaitingList</th>
      
    </tr>
  </thead>
  <tbody>
  
  
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