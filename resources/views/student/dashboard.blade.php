<x-sidebarStudent>
<div class="container-table101">

    <div class="row">
        <div class="col">
            <h2 class="mb-4 mt-2"><b>DASHBOARD</b></h2>
        </div>
        <div class="col">
            <div class="dropdown">
            <button class="bx bx-envelope bx-md bx-tada" style="position: absolute; top: 8px; right: 40px" type="button" id="dropdownMenuButton" data-toggle="dropdown" ></button>
            <!-- <a href="dashboard"><i class="bx bx-home dropdown-toggle"></i> <span>Home</span></a> -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                 ?>
                <a class="dropdown-item" href="#"><h4> {{$noti->sender}} </h4>
                <p> {{$noti->notice}} </p>
                </a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card mt-5 ml-3 mr-5 mb-5" style="width: 100%">
        <div class="card-body">
            <h5 class="card-title">NOTICE</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        </div>
    </div>
    <div class="row">
      
            <div class="limiter">
                    <div class="wrap-table100">
                        <div class="table100">
                <table class="w3-table w3-hoverable mt-5 ml-3">
                    <thead>
                    <tr class="table100-head">
                        <th>Code</th>
                        <th>Title</th>
                        <th>Supervisor</th>
                        <th class="text-center">Applications</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    
                    <tr class="w3-border">
                        <td> id</td>
                        <td>title</td>
                        <td> name</td>
                        
                        <td class="text-center">count</td>
                        <td class="text-center">
                        <a  href="/title/id"  class="btn btn-info">View</button>
                        </td>
                    </tr>
                
                </table>
                </div>
            </div>
            </div>
    </div>



    
</div>
</x-sidebarStudent>