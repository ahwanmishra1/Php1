<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/styles.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
  </head>

  <body class="">





    <?php

      // define variables and set to empty values
      $firstNameErr = $lastNameErr = $aboutErr = $contactErr = $emailErr = $dobErr = $skillErr = $eduErr = $interestErr = $linkedinErr = $githubErr = $genderErr = $addressErr = $countryErr = $stateErr = $zipErr = $photoErr = "";
      $firstName = $lastName = $about = $contact = $email = $dob = $skill = $edu = $interest = $linkedin = $github = $gender = $address = $country = $state = $zip = $photo = "";

      if(isset($_POST["submit"]))
      {

        if (empty($_POST["firstName"])) {
          $firstNameErr = "Required";
        } else {
          $firstName = test_input($_POST["firstName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $firstNameErr = "Only letters and white space allowed";
          }
        }

        if (empty($_POST["lastName"])) {
          $lastNameErr = "Required";
        } else {
          $lastName = test_input($_POST["lastName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
            $lastNameErr = "Only letters and white space allowed";
          }
        }


        if (empty($_POST["about"])) {
          $aboutErr = "Required";
        } else {
          $about = test_input($_POST["about"]);
        }
        if (empty($_POST["address"])) {
          $addressErr = "Required";
        } else {
          $address = test_input($_POST["address"]);
        }
        if (empty($_POST["email"])) {
          $emailErr = "Required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }

        if (empty($_POST["linkedin"])) {
          $linkedinErr = "Required";
        } else {
          $linkedin = test_input($_POST["linkedin"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) {
            $linkedinErr = "Invalid URL";
          }
        }

        if (empty($_POST["github"])) {
          $githubErr = "Required";
        } else {
          $github = test_input($_POST["github"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github)) {
            $githubErr = "Invalid URL";
          }
        }


        if (empty($_POST["gender"])) {
          $genderErr = "Required";
        } else {
          $gender = test_input($_POST["gender"]);
        }


        if (empty($_POST["zip"])) {
          $zipErr = "Required";
        }
        else
        {
          $zip = test_input($_POST["zip"]);
          if (!(preg_match("/^[0-9]*$/",$zip) && ( strlen($zip) == 6)))
          {
            $zipErr = "Zip is invalid";
          }
        }

        if (empty($_POST["contact"])) {
          $contactErr = "Required";
        }
        else
        {
          $contact = test_input($_POST["contact"]);
          if (!(preg_match("/^[0-9]*$/",$contact) && ( strlen($contact) == 10)))
          {
            $contactErr = "Contact is invalid";
          }
        }

        $edu = test_input($_POST["edu"]);

        if (empty($_POST["edu"])) {
          $eduErr = "Required";
        }
        else
        {
          $edu = test_input($_POST["edu"]);
        }


        if (empty($_POST["dob"])) {
          $dobErr = "Required";
        }
        else
        {
          $dob = test_input($_POST["dob"]);
        }

        if (empty($_POST["state"])) {
          $stateErr = "Required";
        }
        else
        {
          $state = test_input($_POST["state"]);
        }

        if (empty($_POST["country"])) {
          $countryErr = "Required";
        }
        else
        {
          $country = test_input($_POST["country"]);
        }

        if(empty($_POST["interest"]))
        {
          $interestErr = "Required";
        }

        if(!empty($_POST['interest'])) {
          $xx = $_POST['interest'];
          $no_checked = count($_POST['interest']);
          echo "$no_checked";
          if($no_checked<2)
          {
            $interestErr = "Select at least two options";
          }
          else{
            for($i=0; $i < $no_checked; $i++)
            {
              $interest = $interest . " " . $xx[$i];
            }
          }
        }


        if(empty($_POST["skill"]))
        {
          $skillErr = "You must select a skill";
        }

        if(!empty($_POST['skill'])) {
          $xx = $_POST['skill'];
          $no_checked = count($_POST['skill']);
          echo "$no_checked";
          if($no_checked<2)
          {
            $skillErr = "Select at least two options";
          }
          else{
            for($i=0; $i < $no_checked; $i++)
            {
              $skill = $skill . " " . $xx[$i];
            }
          }
        }


        if (empty($_POST["photo"])) {
          $photoErr = "Required";
        }
        else {
          $photo = test_input($_POST["photo"]);
          $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
          $ext = pathinfo($photo, PATHINFO_EXTENSION);
          if(!in_array($ext,$allowed) )
          {
            $photoErr = "Upload image files only";
          }
        }


      }



      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>





    <!-- Header -->
    <div class="header">
      <div class="bg-light">
        <div class="sidebar p-5 col col-lg-4 col text-light">
            <h1>Resume</h1>
            <p>Help us help you build your own resume website using HTML, CSS, BootStrap, JavaScript and PHP.</p>
            <img src="https://pngimg.com/uploads/robot/robot_PNG57.png" height="750" width="750" alt="" class="m-5">
            <button type="button" class="mt-3 btn btn-lg btn-light">Get Started</button>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col col-lg-4 sig col-12"></div>
            <div class="sig col col-lg-2 col-12 "></div>
            <div class="sig col col-lg-4 col-12">
              <div class="signin">
                <h2 class="">Signup up to Profile</h2>
                <p class="mb-5">Already have an account? <a href="">Sign In</a></p>

                <!-- Signup Form -->
                <form method="post">
                  <h4 class="mb-3">Personal Details</h4>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" name="firstName" >
                      <div class="error"> <?php echo $firstNameErr;?></div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value=""  name="lastName" >
                      <div class="error"> <?php echo $lastNameErr;?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">About</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tell us something about yourself."  name="about" ></textarea>
                    <div class="error"> <?php echo $aboutErr;?></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="abc@xyz.com" name="email" >
                      <div class="error"> <?php echo $emailErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="contact">Contact</label>
                      <input type="text" class="form-control" id="contact" placeholder="9876543210" value=""  name="contact" >
                      <div class="error"> <?php echo $contactErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="datepicker">Date of birth</label>
                      <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy"  >
                          <input class="form-control" type="text" name="dob" />
                          <span class="input-group-addon"></i></span>
                      </div>
                      <div class="error"> <?php echo $dobErr;?></div>
                    </div>
                  </div>

                  <hr class="mb-4">
                  <h4 class="mb-3">Skills</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="html" id="html" name="skill[]">
                        <label class="custom-control-label" for="html">HTML</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="css" id="css" name="skill[]">
                        <label class="custom-control-label" for="css">CSS</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="bootstrap" id="bootstrap" name="skill[]">
                        <label class="custom-control-label" for="bootstrap">BootStrap</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="php" id="php" name="skill[]">
                        <label class="custom-control-label" for="php">Php</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="git" id="git" name="skill[]">
                        <label class="custom-control-label" for="git">GitHub</label>
                      </div>
                    </div>
                  </div>
                  <div class="error"> <?php echo $skillErr;?></div>



                  <hr class="mb-4">


                  <h4 class="mb-3">Qualification</h4>
                  <div class="mb-3">
                    <label for="educaation">Educational Qualification</label>
                    <select name="edu" class="custom-select d-block w-100" id="education" >
                      <option  value="">Choose...</option>
                      <option  value="btech">B.Tech</option>
                      <option  value="mtech">M.Tech</option>
                      <option  value="bca">BCA</option>
                      <option  value="mca">MCA</option>
                    </select>
                    <div class="error"> <?php echo $eduErr;?></div>
                  </div>


                  <div class="mb-3">
                    <label for="interests">Interests</label>
                    <select  multiple="multiple" name="interest[]" class="form-select d-block w-100"  id="interests">
                      <option value="Dancing">Dancing</option>
                      <option value="Singing" >Singing</option>
                      <option value="Playing">Playing</option>
                      <option value="Cooking">Cooking</option>
                    </select>
                    <div class="error"> <?php echo $interestErr;?></div>
                  </div>


                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="LinkedIn">LinkedIn Profile</label>
                        <input type="text" class="form-control" id="LinkedIn" placeholder="www.LinkedIn.com/abc" name="linkedin">
                        <div class="error"> <?php echo $linkedinErr;?></div>
                      </div>

                      <div class="col-md-6">
                        <label for="GitHub">GitHub Profile</label>
                        <input type="text" class="form-control" id="GitHub" placeholder="www.GitHub.com/abc" name="github">
                        <div class="error"> <?php echo $githubErr;?></div>
                      </div>



                    </div>

                  </div>



                  <hr class="mb-4">

                  <h4 class="mb-3">Gender</h4>

                  <div class="d-block mb-3">
                    <div class="custom-control custom-radio">
                      <input id="male" value="Male" name="gender" type="radio" class="custom-control-input" name="gender" >
                      <label class="custom-control-label" for="male">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="female" value="Female" name="gender" type="radio" class="custom-control-input" name="gender">
                      <label class="custom-control-label" for="female">female</label>
                    </div>
                  </div>
                  <div class="error"> <?php echo $genderErr;?></div>

                  <hr class="mb-4">


                  <h4 class="mb-3">Address</h4>

                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" >
                    <div class="error"> <?php echo $addressErr;?></div>

                  </div>


                  <div class="row">
                    <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
                      <select name="country" class="custom-select d-block w-100" id="country" >
                        <option value="">Choose...</option>
                        <option value="India">India</option>
                      </select>
                      <div class="error"> <?php echo $countryErr;?></div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select name="state" class="custom-select d-block w-100" id="state" >
                        <option  value="">Choose...</option>
                        <option  value="Odisha">Odisha</option>
                      </select>
                      <div class="error"> <?php echo $stateErr;?></div>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input name="zip" type="text" class="form-control" id="zip" placeholder="" >
                      <div class="error"> <?php echo $zipErr;?></div>
                    </div>
                  </div>

                  <hr class="mb-4">



                  <h4 class="mb-3">Profile Photo</h4>

                    <div class="form-group">
                      <!-- <label for="exampleFormControlFile1">Profile Photo</label> -->
                      <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                      <div class="error"> <?php echo $photoErr;?></div>
                    </div>

                  <hr class="mb-4">

                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Process">Build Resume</button>



                </form>
                <!-- output -->

              </div>
              <div class="output_section mb-5">
                <?php
                  echo "<h2 class='mb-5'>Your Input:</h2>";
                  echo "<span class='output_text'>First Name: </span>";
                  echo $firstName;
                  echo "<br>";
                  echo "<span class='output_text'>Last Name: </span>";
                  echo $lastName;
                  echo "<br>";
                  echo "<span class='output_text'>About: </span>";
                  echo $about;
                  echo "<br>";
                  echo "<span class='output_text'>Email: </span>";
                  echo $email;
                  echo "<br>";
                  echo "<span class='output_text'>Contact: </span>";
                  echo $contact;
                  echo "<br>";
                  echo "<span class='output_text'>Date of Birth: </span>";
                  echo $dob;
                  echo "<br>";
                  echo "<span class='output_text'>Skills: </span>";
                  echo $skill;
                  echo "<br>";
                  echo "<span class='output_text'>Educational Qualification: </span>";
                  echo $edu;
                  echo "<br>";
                  echo "<span class='output_text'>Interests: </span>";
                  echo $interest;
                  echo "<br>";
                  echo "<span class='output_text'>LinkedIn: </span>";
                  echo $linkedin;
                  echo "<br>";
                  echo "<span class='output_text'>GitHub: </span>";
                  echo $github;
                  echo "<br>";

                  echo "<span class='output_text'>Gender: </span>";
                  echo $gender;
                  echo "<br>";
                  echo "<span class='output_text'>Address: </span>";
                  echo $address;
                  echo "<br>";
                  echo "<span class='output_text'>Country: </span>";
                  echo $country;
                  echo "<br>";

                  echo "<span class='output_text'>State: </span>";
                  echo $state;
                  echo "<br>";
                  echo "<span class='output_text'>Zip: </span>";
                  echo $zip;
                  echo "<br>";
                  echo "<span class='output_text'>Photo: </span>";
                  echo $photo;
                  echo "<br>";
                ?>
              </div>
            </div>
            <div class="sig col col-lg-2 col-12"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/31875a1568.js" crossorigin="anonymous"></script>

    <!-- External JavaScript -->
    <script src="js/index.js"></script>

    <!-- BootStrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  </body>
</html>
