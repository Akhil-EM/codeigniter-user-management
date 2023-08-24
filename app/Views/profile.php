<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="iq-card">
               <div class="iq-card-body p-0">
                  <div class="iq-edit-list">
                     <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-3 p-0">
                           <a class="nav-link active" data-toggle="pill" href="#personal-information">
                              Personal Information
                           </a>
                        </li>
                        <li class="col-md-3 p-0">
                           <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                              Change Password
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-edit-list-data">
               <div class="tab-content">
                  <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Personal Information</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form>
                              <div class="form-group row align-items-center">
                                 <div class="col-md-12">
                                    <div class="profile-img-edit">
                                       <img class="profile-pic" src="images/user/11.png" alt="profile-pic">
                                       <div class="p-image">
                                          <i class="ri-pencil-line upload-button"></i>
                                          <input class="file-upload" type="file" accept="image/*" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class=" row align-items-center">
                                 <div class="form-group col-sm-6">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" id="fname" value="Nik">
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" value="Jhon">
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label for="uname">User Name:</label>
                                    <input type="text" class="form-control" id="uname" value="Nik@01" disabled>
                                 </div>
                                 
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <button type="reset" class="btn iq-bg-danger">Cancle</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Change Password</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form>
                              <div class="form-group">
                                 <label for="cpass">Current Password:</label>
                                 <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                 <input type="Password" class="form-control" id="cpass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="npass">New Password:</label>
                                 <input type="Password" class="form-control" id="npass" value="">
                              </div>
                              <div class="form-group">
                                 <label for="vpass">Verify Password:</label>
                                 <input type="Password" class="form-control" id="vpass" value="">
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Submit</button>
                              <button type="reset" class="btn iq-bg-danger">Cancle</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>