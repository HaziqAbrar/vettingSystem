<x-sidebarStudent>
<div class="container-table101">

    <div class="row">
        <div class="col">
            <h2 class="mb-4 mt-2"><b>DASHBOARD</b></h2>
        </div>
        <div class="col">
            <div class="dropdown">
            @if ($data==true)
            <button class="bx bx-envelope bx-md bx-tada" style="position: absolute; top: 8px; right: 40px" type="button" id="dropdownMenuButton" data-toggle="dropdown" ></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 @foreach ($notis as $noti)
                 <?php $sv = $users->where('email',$noti->sender)->first()?>
                <a class="dropdown-item" href="/propose/{{$noti->id}}"><p><b> {{$sv->name}} </b></p>
                <p> {{$noti->notice}} </p>
                </a>
                @endforeach
            @else
            <button class="bx bx-envelope bx-md " style="position: absolute; top: 8px; right: 40px" type="button" id="dropdownMenuButton" data-toggle="dropdown" ></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"><p> No message </p>

                </a>
            @endif
            </div>
            </div>
        </div>
    </div>
    <div class="row" style=" align-items: center;
  justify-content: center;">
        <div class="card mt-5 ml-3 mr-5 mb-5" style="width: 50%;" >
        <div class="card-body">
            <h5 class="card-title">NOTICE</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">Guideline</p>
            <p class="card-text">1. Please upload your profile photo at account page.</p>
            <p class="card-text">2. Please update your details at about page.</p>
            <p class="card-text">3. Students are required to apply 3 titles.</p>
            <!-- <a href="#" class="card-link">Card link</a> -->
            <!-- <a href="#" class="card-link">Another link</a> -->
        </div>
        </div>
    </div>
    <div class="row">
    @if ($check==true)

         <h3 class="ml-3">Titles Applied </h3>
            <div class="limiter">
                    <div class="wrap-table100">
                        <div class="table100">
                <table class="w3-table w3-hoverable mt-1 ml-3">
                    <thead>
                    <tr class="table100-head">
                        <th>Code</th>
                        <th>Title</th>
                        <th>Supervisor</th>
                        <th >Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <?php $f = $first->where('email',$email)->first();
                    $title1 =$titles->where('id',$f->title)->first();
                    $sv1 = $users->where('email',$title1->email)->first()?>
                    <tr class="w3-border">
                        <td >{{$f->title}}</td>
                        <td>{{$title1->title}}</td>
                        <td> {{$sv1->name}}</td>
                        
                        <td >{{$f->status}}</td>
                        @if ($f->agree=="no")
                        <td class="text-center">
                        <a  href="/title/agree1/{{$f->id}}"  class="btn btn-info">Agree</button>
                        </td>
                        @else
                        <td class="text-center">{{$f->agree}}</td>
                        @endif
                    </tr>
                    <?php $s = $second->where('email',$email)->first();
                    $title2 =$titles->where('id',$s->title)->first();
                    $sv2 = $users->where('email',$title2->email)->first()?>
                    <tr class="w3-border">
                        <td >{{$s->title}}</td>
                        <td>{{$title2->title}}</td>
                        <td> {{$sv2->name}}</td>
                        
                        <td >{{$s->status}}</td>
                        @if ($s->agree=="no")
                        <td class="text-center">
                        <a  href="/title/agree2/{{$s->id}}"  class="btn btn-info">Agree</button>
                        </td>
                        @else
                        <td class="text-center">{{$s->agree}}</td>
                        @endif
                    </tr>
                    <?php $t = $third->where('email',$email)->first();
                    $title3 =$titles->where('id',$t->title)->first();
                    $sv3 = $users->where('email',$title3->email)->first()?>
                    <tr class="w3-border">
                        <td >{{$t->title}}</td>
                        <td>{{$title3->title}}</td>
                        <td> {{$sv3->name}}</td>
                        
                        <td >{{$t->status}}</td>
                        @if ($t->agree=="no")
                        <td class="text-center">
                        <a  href="/title/agree3/{{$t->id}}"class="btn btn-info">Agree</button>
                        </td>
                        @else
                        <td class="text-center">{{$t->agree}}</td>
                        @endif
                    </tr>
                
                </table>
                </div>
            </div>
            </div>
    @endif
    </div>



    
</div>
</x-sidebarStudent>