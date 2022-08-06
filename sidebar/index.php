  <!doctype html>
<html lang="en">
  <head>
    <title>Sidebars · Bootstrap v5.1</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    <!-- Bootstrap core CSS -->

   <!-- add fontawesome link -->
<link rel="stylesheet" href="fontawesome/css/all.css">


  </head>
  <body>
<main>
  <div class="col-lg-4 col-xs-12 col-md-4 col-sm-12 p-3 shadow-lg " class="flex-shrink-0 p-3" style=" width:20%;background-color: lightgray; margin-top: 5%; border-radius: 12px;">
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          <b>Managing</b>
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <i class="fa fa-list-alt" aria-hidden="true" style="font-size:20px;color:#787878"></i>
              <a href="posts.php" class="link-dark rounded"><h5>Add Post</h5></a></li>
            <li>
             <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="view_post.php" class="link-dark rounded"><h5>View Post</h5></a>

            </li>
          </ul>
        </div>
      </li>

        <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dash-collapse" aria-expanded="false">
          <b>User Permission</b>
        </button>
        <div class="collapse" id="dash-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
             <li>
               <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="view_all_users.php" class="link-dark rounded"><h5>View User's</h5 ></a>
              </li>
              <li>
              <i class='fas fa-check-circle' style='font-size:20px;color:#787878'></i>
              <a href="approve.php" class="link-dark rounded"><h5>Approve</h5></a>
             </li>
             <li>
              <i class='fas fa-times-circle' style='font-size:20px;color:#787878'></i>
              <a href="reject.php" class="link-dark rounded"><h5>Reject</h5></a>
             </li>
             <li>
             <i class='fas fa-question-circle' style='font-size:20px;color:#787878'></i>
             <a href="pendding.php" class="link-dark rounded"><h5>Pendding</h5></a>
             </li>
          </ul>
        </div>
      </li>



      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          <b>Categories</b>
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <i class="fa fa-list-alt" aria-hidden="true" style="font-size:20px;color:#787878"></i>
              <a href="categories.php" class="link-dark rounded"><h5>Add Category</h5></a></li>
            <li>
             <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="view_categories.php" class="link-dark rounded"><h5>View Categories</h5 ></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"data-bs-target="#orders-collapse" aria-expanded="false"><b>Comments|Feedback|Followers</b>
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
             <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="comments.php " class="link-dark rounded"><h5>View Comments</h5></a></li>
            <li>
              
             <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="feedback.php" class="link-dark rounded"><h5>View Feedback</h5></a>
            </li>
            <li>
             <i class='fas fa-eye' style='font-size:20px;color:#787878'></i>
              <a href="follower.php" class="link-dark rounded"><h5>View Followers</h5></a>
            </li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          <b>Account</b>
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <i class='fas fa-user-plus' style='font-size:20px;color:#787878'></i>
              <a href="add_new_user.php" class="link-dark rounded"><h5>Add New User</h5></a></li>
            <li>
              <i class='fas fa-user-circle' style='font-size:20px;color:#787878'></i>
              <a href="profile.php" class="link-dark rounded"><h5>Profile</h5></a>
            </li>
            <li>
              <i class="fas fa-cog fa-spin" style='font-size:20px;color:#787878'></i>
              <a href="setting.php" class="link-dark rounded"><h5>Settings</h5></a>
            </li>
            <li>
              <i class='fas fa-sign-out-alt' style='font-size:20px;color:#787878'></i>
              <a href="logout.php" class="link-dark rounded"><h5>Sign out</h5></a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
  </body>
</html>
