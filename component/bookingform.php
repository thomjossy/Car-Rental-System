<div class="container d-flex flex-column mt-2">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
<div class="card mb-4 ">
  <!-- Card Header -->
  <div class="card-header d-flex align-items-center justify-content-between">
     <h4 class="mb-0">
        <i class="mdi mdi-twitter text-primary mdi-24px align-middle me-2"></i>Book for
        this Vehicle
</h4>

  </div>
  <!-- Card Body -->
  <div class="card-body">
      <?php if(!empty($errors)){?>
          <div class="alert alert-danger" role="alert">
              <?php echo $errors?>
          </div>
          <?php
      }
      ?>
     <!-- Form -->
     <form method="post" action="">
        <div class="mb-3 mb-4">
           <label for="" class="form-label">Whats is the distance you will be going with this Vehicle<span class="text-danger">*</span>
           </label>
           <input name="distance" class="form-control" id="twiiterAppid" placeholder="The expected distance " type="text" required>
           <small class="text-muted">  What distance will you be travelling
<span class="text-primary"></span></small>
        </div>
         <div class="mb-3 mb-4">
             <label for="twiiterAppid" class="form-label">Whats are the miles you will be travelling with this Vehicle<span class="text-danger">*</span>
             </label>
             <input name="mile" class="form-control" id="twiiterAppid" placeholder="The expected Miles " type="text" required>
             <small class="text-muted">If you are not certain with your answers please pause and calculate the miles you will be travelling
                 <span class="text-primary"></span></small>
         </div>

         <div class="mb-3 mb-4">
             <label for="twiiterAppid" class="form-label">Which day are you Returning the vehicle<span class="text-danger">*</span>
             </label>
             <input name="return" class="form-control flatpickr" id="twiiterAppid" placeholder="The date you Are returning the vehicle" type="text" required>
             <small class="text-muted">It is very important and compulsory that you have to remember that you pick this date to return this vehicle
                 <span class="text-primary"></span></small>
         </div>
        <button type="submit" class="btn btn-primary">
Book this Vehicle
</button>
  </form>
    </div>
 </div>
</div>
    </div>
</div>
