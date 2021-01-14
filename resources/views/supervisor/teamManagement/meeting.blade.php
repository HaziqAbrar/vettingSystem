<x-sidebarSupervisor>
    <div class="row">
        <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h1 class="mt-5 text-center">
                        Meeting Proposals
                    </h1>


                    <table class="w3-table w3-hoverable mt-3">
                        <thead>
                            <tr class="w3-grey w3-border">
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Title</th>
                                <th>Time</th>
                                <th>Comment</th>
                                <th class="text-center">Action</th>



                            </tr>
                        </thead>
                        @foreach ($meets as $meet)
                        <tr class="w3-border">

                            <td class="counterCell"></td>
                            <?php $title = $titles->where('id', $meet->title_code)->first();
                            $student = $students->where('email', $meet->student)->first(); ?>
                            <td> {{$student->name}}</td>

                            <td>{{$title->title}}</td>
                            <td>{{$meet->time}}</td>
                            <td>
                                <form method="post" action="/meetupdate">
                                    @csrf
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="comment" id="comment" rows="2" value="{{$student->about}}" data-msg="Please write something for us">{{$meet->comment}}</textarea>
                                        <input type="hidden" id="id" name="id" value="{{$meet->id}}">
                                    </div>
                            </td>



                            <td class="text-center">


                                <button type="submit" class="btn btn-info" name="button1" value="accept">Accept</button>
                                <button type="submit" class="btn btn-danger" name="button2" value="reject">Reject</button>

                                </form>


                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="container mt-5" style="border:solid; padding-bottom: 30px;">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h1 class="mt-5 text-center">
                        Upcoming Meeting
                    </h1>


                    <table class="w3-table w3-hoverable mt-3">
                        <thead>
                            <tr class="w3-grey w3-border">
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Title</th>
                                <th>Time</th>
                                <th>Link</th>
                                <th class="text-center">Status</th>



                            </tr>
                        </thead>
                        @foreach ($settle as $meet)
                        <tr class="w3-border">

                            <td class="counterCell"></td>
                            <?php $title = $titles->where('id', $meet->title_code)->first();
                            $student = $students->where('email', $meet->student)->first(); ?>
                            <td> {{$student->name}}</td>

                            <td>{{$title->title}}</td>
                            <td>{{$meet->time}}</td>
                            <td>{{$meet->link}}</td>



                            <td class="text-center">

                                <form method="post" action="/meet/done">
                                    <button type="submit" class="btn btn-info" name="button1" value="accept">Done</button>

                                </form>


                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

    </div>


</x-sidebarSupervisor>