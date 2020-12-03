<x-sidebarStudent>



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
              {{$student->about}}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <div class="mr-5" align="center">
    <a class="w3-margin btn btn-dark message" href="#edit" role="button">Edit</a>
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    </div>
   
    <!-- <a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a> -->

    <!-- ======= Contact Section ======= -->
    <section id="edit" class="edit">
      <div class="container">

        <div class="section-title">
          <h2>Update</h2>
          
        </div>

        

          <div class="">
            <form action="/portfolio" method="post" role="form" >
            @csrf
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="department">Department</label>
                  <input type="text" name="department" class="form-control" id="department" value="{{$student->department}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-3">
                  <label for="level">Level</label>
                  <input type="text" class="form-control" name="level" id="level" value="{{$student->level}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-3">
                  <label for="cgpa">CGPA</label>
                  <input type="text" class="form-control" name="cgpa" id="cgpa" value="{{$student->cgpa}}" data-rule="minlen:1" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-3">
                  <label for="year">Year</label>
                  <input type="text" class="form-control" name="year" id="year" value="{{$student->year}}" data-rule="minlen:1" data-msg="Please enter at least 1 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                  <label for="skills">Skills</label>
                  <input type="text" class="form-control" name="skills" id="skills" value="{{$student->skills}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="about">About Yourself</label>
                <textarea type="text" class="form-control" name="about" id="about" rows="10" value="{{$student->about}}" data-rule="required" data-msg="Please write something for us">{{$student->about}}</textarea>
                <div class="validate"></div>
              </div>
             
              <div class="text-center"><button class="w3-margin btn btn-dark message" type="submit" >Update</button>
              <!-- <input type="submit" value="Update"> -->
              </div>
              <!-- <div class="mr-5" align="center">
              <a class="w3-margin btn btn-dark message" type="submit"  role="button">Update</a>
              </div> -->
            </form>
          </div>

        </div>

      </div>
      @if (session('status'))
          <div class=" alert alert-success">
            {{ session('status') }}
          </div>
        @endif
    </section><!-- End Contact Section -->

</x-sidebarStudent>