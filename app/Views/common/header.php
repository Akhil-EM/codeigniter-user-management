<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title ?></title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="/css/responsive.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
            <div class="loader">
               <div class="cube">
                  <div class="sides">
                     <div class="top"></div>
                     <div class="right"></div>
                     <div class="bottom"></div>
                     <div class="left"></div>
                     <div class="front"></div>
                     <div class="back"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="/">
                  <img src="/images/logo.png" class="img-fluid" alt="">
                  <span>Sofbox</span>
               </a>
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="line-menu half start"></div>
                     <div class="line-menu"></div>
                     <div class="line-menu half end"></div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="iq-menu-title"><i class="ri-separator"></i><span></span></li>
                     <li <?php if ($title === 'Home'): ?>class="active"<?php endif; ?>><a href="/" class="iq-waves-effect"><i
                              class="ri-home-4-line"></i><span>Dashboard</span></a></li>
                     <li <?php if ($title === 'User Add' || $title === 'User List'): ?>class="active"<?php endif; ?>>
                        <a href="#user-info" class="iq-waves-effect collapsed" data-toggle="collapse"
                           aria-expanded="false"><i class="ri-user-line"></i><span>User</span><i
                              class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="user-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li <?php if ($title === 'User Add'): ?>class="active"<?php endif; ?>><a href="/add-user">User Add</a></li>
                           <li <?php if ($title === 'User List'): ?>class="active"<?php endif; ?>><a href="/user-list">User List</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                        <img src="/images/logo.png" class="img-fluid" alt="">
                        <span>Sofbox</span>
                     </a>
                  </div>
               </div>
               <div class="navbar-breadcrumb">
                  <h5 class="mb-0"><?= $title ?></h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <?php if ( $title !== 'Home' ) : ?>
                         <li class="breadcrumb-item active" aria-current="page"><?= $title  ?></li>
                        <?php endif; ?>
                     </ul>
                  </nav>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img
                              src="/images/user/1.jpg" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="/profile" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 
                                 <div class="d-inline-block w-100 text-center p-3">
                                 <form action="/sign-out" method="post">
                                    <button class="iq-bg-danger iq-sign-btn" type="submit">
                                        Sign out
                                    </button>
                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->