<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">User List</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="table-responsive">
                     <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6">
                           <div id="user_list_datatable_info" class="dataTables_filter">
                              <form class="mr-3 position-relative">
                                 <div class="form-group mb-0">
                                    <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div class="user-list-files d-flex float-right">
                              <a href="/add-user" class="chat-icon-phone">
                                 Add User
                              </a>
                           </div>
                        </div>
                     </div>
                     <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                        <thead>
                           <tr>
                              <th>Sl No</th>
                              <th>Profile</th>
                              <th>Name</th>
                              <th>Role</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Address</th>
                              <th>Zipcode</th>
                              <th>Country</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($users as $key => $user) : {
                              } ?>
                              <tr>
                                 <td><b>
                                       <?= $key + 1 ?>
                                    </b></td>
                                 <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="<?= $user["image"] ?>" alt="profile"></td>
                                 <td><?= $user["name"]  ?></td>
                                 <td><?= $user["role"]; ?></td>
                                 <td><?= $user["mobile"]; ?></td>
                                 <td><?= $user["email"]; ?></td>
                                 <td><?= $user["address"]; ?></td>
                                 <td><?= $user["zip_code"]; ?></td>
                                 <td><?= $user["country"]; ?></td>


                                 <td>
                                    <div class="flex align-items-center list-user-action d-flex">
                                       <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="/edit-user/<?= $user['user_detail_id'] ?>"><i class="ri-pencil-line"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="deleteUser(<?= $user['user_detail_id'] ?>)" ><i class="ri-delete-bin-line"></i></a>
                                    </div>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="row justify-content-between mt-3">
                     <div id="user-list-page-info" class="col-md-6">
                        <span>Showing 1 to 5 of 5 entries</span>
                     </div>
                     <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                           <ul class="pagination justify-content-end mb-0">
                              <li class="page-item disabled">
                                 <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                 <a class="page-link" href="#">Next</a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
  function deleteUser(userId){
   Swal.fire({
        text: 'Do you want to Remove this user!',
        icon: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonText: 'Okay',
        cancelButtonText: 'Cancel',
    }).then(async (result) => {
        if (result.isConfirmed) {
            await fetch('/delete-user/'+userId);
            // User confirmed the action, perform the delete or other operation here
            Swal.fire('Deleted!', 'User has  deleted.', 'success');
        }
    });
  }
</script>