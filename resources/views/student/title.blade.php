<!-- testttt -->

<x-sidebarStudent>



    <div class="container-table100">



        <div class="row">
            <div class="col">
                <h1 class="mt-2  text-center " style="color:white">
                    FYP TITLE
                </h1>
                <!-- <div class="container-table100"> -->
                <div class="limiter">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table class="w3-table w3-hoverable mt-3 ">
                                <thead>
                                    <tr class="table100-head">
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Supervisor</th>
                                        <th class="text-center">Applications</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <?php $id=0;?>
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
                                        <!-- <a  href="/title/{{$ttl->id}}"  class="btn btn-info">View</button> -->
                                        <div>
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#myModal{{$id}}">Details</button>
                                        </div>
                                        <!-- Modal starts here -->
                                        <div class="modal fade" id="myModal{{$id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" id="">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true"></button>
                                                        <h4 class="modal-title" id="myModalLabel">Title Detail</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>

                                                            <img src="/images/default-avatar.png"
                                                                alt="gambar supervisor" name="aboutme" width="140"
                                                                height="140" border="0" class="img-circle"></a>
                                                            <h3 class="media-heading"><small> {{$ttl->name }}
                                                                </small></h3>
                                                            <span
                                                                class="text-uppercase"><strong> {{$ttl->title }}</strong></span>

                                                        </center>
                                                        <hr>
                                                        <center>
                                                            <p class="text-left"><strong>Description
                                                                </strong><br> {{$ttl->description }}</p>
                                                            <br>
                                                        </center>
                                                        <center>
                                                            <p class="text-left"><strong>Tools
                                                                </strong><br> {{$ttl->tools}}</p>
                                                            <br>
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer">


                                                        <form>
                                                            <div class="mt-3">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                        <script>
                                                        $(document).ready(function() {

                                                            $.ajaxSetup({
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $(
                                                                            'meta[name="csrf-token"]')
                                                                        .attr('content')
                                                                }
                                                            });


                                                            $('.serviassignbtn').click(function(e) {
                                                                e.preventDefault();

                                                                var assign_id = $(this).closest("tr")
                                                                    .find(".assignservice").val();
                                                                // alert(delete_id);

                                                                var data = {
                                                                    "_token": $(
                                                                        'input[name="csrf-token"]'
                                                                        ).val(),
                                                                    "id": assign_id,
                                                                };



                                                                $.ajax({
                                                                    type: "GET",
                                                                    url: '/info/' + assign_id,
                                                                    data: data,
                                                                    success: function(
                                                                    response) {
                                                                        window.location
                                                                            .href =
                                                                            "/info/" +
                                                                            assign_id;
                                                                    }
                                                                });



                                                            });
                                                        });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $id+=1; ?>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>

        </div>
        <style>
        input[type=text],
        select {
            width: 1050px;

        }

        .main-agileinfo {
            width: 100%;
            margin: 3em auto;
            background: rgba(0, 0, 0, 0.18);
            /* background: #fff ; */
            /* background-size: cover; */
        }

        .agileits-top {
            padding: 3em;
        }
        </style>
        <div class='row'>
            @if (session('status'))
            <div class="mt-3 alert alert">
                {{ session('status') }}
            </div>
            @endif

            @if ($data==false)
            <div class="mt-2 text-left">
                <div>
                    <div class="main-agileinfo">
                        <div class="agileits-top">
                            <form method="post" action="/title">
                                @csrf
                                <div class="form-group">
                                    <label style="color:white" for="first choice"><b>First Choice</b></label>
                                    <input autocomplete="off" type="text"
                                        class="form-control @error ('first_choice') is-invalid @enderror"
                                        id="first choice" placeholder="Enter Title Code" name="first choice">
                                    @error('first_choice')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="color:white" for="second choice"><b>Second Choice</b></label>
                                    <input autocomplete="off" type="text"
                                        class="form-control @error ('second_choice') is-invalid @enderror"
                                        id="second choice" placeholder="Enter Title Code" name="second choice">
                                    @error('second_choice')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="color:white" for="third choice"><b>Third Choice</b></label>
                                    <input autocomplete="off" type="text"
                                        class="form-control @error ('third_choice') is-invalid @enderror"
                                        id="third choice" placeholder="Enter Title Code" name="third choice">
                                    @error('third_choice')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div align="center">
                                    <button type="submit" class="
                  btn btn-info mt-2" style="width: auto; color:white ">Apply!</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        @else
        <h1></h1>
        @endif

    </div>


    </div>
    </div>









    <!--===============================================================================================-->
    <script src="/table/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/table/vendor/bootstrap/js/popper.js"></script>
    <script src="/table/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/table/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/table/js/main.js"></script>




</x-sidebarStudent>