<x-sidebarSupervisor>



    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="/images/{{$student->avatar}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>{{$student->name}}</h3>
            <p class="font-italic">
            
            </p>
            <div class="row"> 
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong>Department:</strong> {{$student->department}}</li>
                  <li><i class="icofont-rounded-right"></i> <strong>Year:</strong> {{$student->year}}</li>
                  <li><i class="icofont-rounded-right"></i> <strong>Skills:</strong> {{$student->skills}}</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong>Level:</strong> {{$student->level}}</li>
                  <li><i class="icofont-rounded-right"></i> <strong>CGPA:</strong> {{$student->cgpa}}</li>
                  <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> {{$student->email}}</li>
                </ul>
              </div>
            </div>
            <p>
            </p>
            <p>
              <strong>About me: </strong>
              {{$student->about}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <div class="mr-5" align="center">
    <!-- <a class="w3-margin btn btn-dark message" href="/supervisor/application" role="button">Back</a> -->
   <a class="w3-margin btn btn-dark" href="/supervisor/teams/{{$first['first choice']}}" role="button">Back</a>
       
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button> -->
    </div>
    


  
    

</x-sidebarSupervisor>