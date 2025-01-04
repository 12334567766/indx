<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Haroon Gujjar!</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
             <h4>Contact Us!</h4>
        </div>
        <div class="card-body">

          <form action="sendmail.php" method="POST">

          
          <div class="mb-3">
               <label for="fullname">Full Name</label> 
               <input type="text" name="full_name" id="fullname" required class="form-control" />
          </div>
          <div class="mb-3">
               <label for="fathername">Father Name</label> 
               <input type="text" name="father_name" id="fathername" required class="form-control" />
          </div>
          <div class="mb-3">
               <label for="phonenumber">Phone Number</label> 
               <input type="text" name="phone_number" id="phonenumber" required class="form-control" />
          </div>
          <div class="mb-3">
               <label for="email_adress">Email Adress</label> 
               <input type="email" name="email" id="email_adress" required class="form-control" />
          </div>
          <div class="mb-3">
               <label for="subject">Subject</label> 
               <input type="text" name="subject" id="subject" required class="form-control" />
          </div>
          <div class="mb-3">
               <label for="message">Message</label> 
                <textarea name="message" id="message" class="form-control" required rows="3"></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" name="submitContact" class="btn btn-primary">Submit</button>
          </div>

           
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

      var messageText = "<?= $_SESSION['status'] ?? ''; ?>";
      if(messageText !=''){

        
              Swal.fire({
          title: "Thank you",
          text: messageText,
          icon: "success"
        });
        <?php unset($_SESSION['status']) ?>
      }
    </script>

  </body>
</html>