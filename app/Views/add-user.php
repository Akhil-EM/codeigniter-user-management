<!-- TOP Nav Bar END -->
<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">User</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <form method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <div class="add-img-user profile-img-edit">
                           <img class="profile-pic img-fluid" src="/images/user/11.png" alt="profile-pic">
                           <div class="p-image">
                              <a href="javascript:void();" class="upload-button btn iq-bg-primary">File Upload</a>
                              <input class="file-upload" type="file" accept="image/*" name="image">
                           </div>
                        </div>
                        <div class="img-extension mt-3">
                           <div class="d-inline-block align-items-center">
                              <span>Only</span>
                              <a href="javascript:void();">.jpg</a>
                              <a href="javascript:void();">.png</a>
                              <a href="javascript:void();">.jpeg</a>
                              <span>allowed</span>
                           </div>
                        </div>
                        <?php if ($validation && $validation->getError('image')) : ?>
                           <div class="text-danger d-flex"><?= $validation->getError('image') ?></div>
                        <?php endif; ?>
                     </div>
                     <div class="form-group">
                        <label>User Role:</label>
                        <select class="form-control" name="role_id">
                           <option value="">Select Role</option>
                           <?php foreach ($roles as $roleArray) : ?>
                              <option value="<?= $roleArray['role_id']  ?>" <?= ($payload['role_id'] === $roleArray['role_id']) ? 'selected' : ''; ?>><?= $roleArray['role'] ?></option>
                           <?php endforeach; ?>
                        </select>
                        <?php if ($validation && $validation->getError('role_id')) : ?>
                           <div class="text-danger d-flex"><?= $validation->getError('role_id') ?></div>
                        <?php endif; ?>
                     </div>
               </div>
            </div>
         </div>
         <div class="col-lg-9">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">User Information</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="new-user-info">
                     <?php $validation =  \Config\Services::validation(); ?>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label for="fname">Name:</label>
                           <input type="text" class="form-control" name="name" id="fname" placeholder="Name" value="<?= $payload['name'] ?>">
                           <?php if ($validation && $validation->getError('name')) : ?>
                              <div class="text-danger"><?= $validation->getError('name') ?></div>
                           <?php endif; ?>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="add1">Address:</label>
                           <textarea cols="3" class="form-control" name="address" id="add1" placeholder="Address"><?= $payload['address'] ?></textarea>
                           <?php if ($validation && $validation->getError('address')) : ?>
                              <div class="text-danger"><?= $validation->getError('address') ?></div>
                           <?php endif; ?>
                        </div>
                        <div class="form-group col-sm-6">
                           <label>Country:</label>
                           <select class="form-control" name="country_id" id="selectcountry">
                              <option value="">Select Country</option>
                              <?php foreach ($countries as $countryArray) : ?>
                                 <option value="<?= $countryArray['country_id']  ?>" <?= ($countryArray['country_id'] === $payload['country_id']) ? 'selected' : '' ?>><?= $countryArray['country'] ?></option>
                              <?php endforeach; ?>
                           </select>
                           <?php if ($validation && $validation->getError('country_id')) : ?>
                              <div class="text-danger"><?= $validation->getError('country_id') ?></div>
                           <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="pno">Pin Code:</label>
                           <input type="text" class="form-control" name="zip_code" id="pno" placeholder="Pin Code" value="<?= $payload['zip_code'] ?>">
                           <?php if ($validation && $validation->getError('zip_code')) : ?>
                              <div class="text-danger"><?= $validation->getError('zip_code') ?></div>
                           <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="mobno">Mobile Number:</label>
                           <input type="text" class="form-control" name="mobile" id="mobno" placeholder="Mobile Number" value="<?= $payload['mobile'] ?>">
                           <?php if ($validation && $validation->getError('mobile')) : ?>
                              <div class="text-danger"><?= $validation->getError('mobile') ?></div>
                           <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="email">Email:</label>
                           <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= $payload['email'] ?>">
                           <?php if ($validation && $validation->getError('email')) : ?>
                              <div class="text-danger"><?= $validation->getError('email') ?></div>
                           <?php endif; ?>
                        </div>
                     </div>
                     <hr>

                     <button type="submit" class="btn btn-primary"><?= ($isEdit)? "Update User" :"Add New User"?></button>
                     <!-- Toast Component -->
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- user data insert success -->
<?php if ($dbSuccess) : ?>
   <script>
      Swal.fire({
         icon: 'success',
         text: 'New user added successfully.',
         timer: 2000,
         showConfirmButton: false,
         showCloseButton: true
      });
   </script>
<?php endif; ?>