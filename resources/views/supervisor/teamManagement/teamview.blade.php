<x-sidebarSupervisor>
@foreach ($titleinfos as $ttl)
    <div class="row">
        <div class="container mt-5" style="border:solid; padding-bottom: 30px;">

            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h1 class="mt-5 text-center">
                        Code {{$ttl->id}}: {{$ttl->title}}
                    </h1>
                    <?php $team = $teams->where('title',$ttl->id);
                    
                    // dd($team);?>
                   
                    <table class="w3-table w3-hoverable mt-3">
                        <thead>
                            <tr class="w3-grey w3-border">
                                <th style="width:5%">No</th>
                                <th style="width:45%">Student Name</th>
                                <th style="width:20%">Matric No</th>
                                <th style="width:30%">Email</th>
                                <!-- <th>Time</th> -->



                            </tr>
                        </thead>
                        @foreach($team as $team)
                        <?php $student=$students->where('email',$team->email)->first();?>
                        <tr class="w3-border">

                            <td class="counterCell"></td>

                            <td> {{$student->name}}</td>
                            <td> {{$student->matrix}}</td>

                            <td>{{$student->email}}</td>
                            <!-- <td>time}}</td> -->
                            


                           
                        </tr>
                        @endforeach
                     

                    </table>
                </div>
            </div>
        </div>

    </div>
 

@endforeach
</x-sidebarSupervisor>