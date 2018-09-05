<?php include_once("inc/function.php");?>
<?php
  class action
  {
    public function addPost($value, $file)
    {
      connect_db();
      $post_title = $value['post_title'];
      $post_category = $value['post_category'];
      $post_description_first = $value['post_description_first'];
      $post_description_second = $value['post_description_second'];
      $today = date("Y-m-d");

      $errors= array();
      $file_name = $file['image']['name'];
      $file_size =$file['image']['size'];
      $file_tmp =$file['image']['tmp_name'];
      $file_type=$file['image']['type'];
      $file_ext=strtolower(end(explode('.',$file['image']['name'])));

      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
           $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Warning</strong> You should be selected jpg, jpeg, pnf file.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
           return $error;
        }elseif($file_size > 2097152) {
           $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                      <strong>Warning</strong> Please select less than 2mb.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
           return $error;
        }elseif(empty($errors)==true) {
             if (empty($post_title) || empty($post_category) || empty($post_description_first) || empty($post_description_second)) {
                $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                   <strong>Warning</strong> Please complete the input fields.
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                   </button>
                 </div>";
                 return $error;
             }else {
              move_uploaded_file($file_tmp,"image/".$file_name);
               $query = mysql_query("INSERT INTO post(post_title, post_category,post_date,post_image,post_details_first,post_details_second)
                  VALUES ('$post_title','$post_category','$today','$file_name','$post_description_first','$post_description_second')");
               if ($query) {
                 $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Successfully</strong> data inserted.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                  return $error;
               }else {
                 $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Danger</strong> Here is some problem.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                 return $error;
               }
             }
        }
    }


    public function postDetails($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }

    public function postcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }

    public function postDetailslist()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }

    public function singlePostDetails($id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE id = '$id'");
      return $sql;
    }

    public function postDetailsCategory($category)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category = '$category' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }

    public function addJobPost($value, $file)
    {
      connect_db();
      $job_title = $value['job_title'];
      $job_category = $value['job_category'];
      $job_description = $value['job_description'];
      $job_type = $value['job_type'];
      $today = date("Y-m-d");

      $errors= array();
      $companyImage_name = $file['companyImage']['name'];
      $circularImage_name = $file['circularImage']['name'];

      if ($companyImage_name == "" && $circularImage_name=="") {
           if (empty($job_title) || empty($job_category) || empty($job_description) || empty($job_type)) {
              $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>Warning</strong> Please complete the input fields.
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                 </button>
               </div>";
               return $error;
           }else {
             $query = mysql_query("INSERT INTO job_post(job_title, job_category,job_type,post_date,job_details)
                VALUES ('$job_title','$job_category','$job_type','$today','$job_description')");
             if ($query) {
               $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Successfully</strong> data inserted.
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
                return $error;
             }else {
               $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                          <strong>Danger</strong> Here is some problem.
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>";
               return $error;
             }
           }
      }elseif ($companyImage_name == "" && $circularImage_name!="") {

        $circularImage_size =$file['circularImage']['size'];
        $circularImage_tmp =$file['circularImage']['tmp_name'];
        $circularImage_type=$file['circularImage']['type'];
        $circularImage_ext=strtolower(end(explode('.',$file['circularImage']['name'])));

        $expensions= array("jpeg","jpg","png");
        if(in_array($circularImage_ext,$expensions)=== false){
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> You should be selected jpg, jpeg, pnf file.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif($circularImage_size > 2097152) {
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> Please select less than 2mb.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif(empty($errors)==true) {
               if (empty($job_title) || empty($job_category) || empty($job_description) || empty($job_type)) {
                  $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                     <strong>Warning</strong> Please complete the input fields.
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                     </button>
                   </div>";
                   return $error;
               }else {
                move_uploaded_file($circularImage_tmp,"image/".$circularImage_name);
                 $query = mysql_query("INSERT INTO job_post(job_title, job_category,job_type,post_date,circular_image,job_details)
                    VALUES ('$job_title','$job_category','$job_type','$today','$circularImage_name','$job_description')");
                 if ($query) {
                   $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Successfully</strong> data inserted.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    return $error;
                 }else {
                   $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>Danger</strong> Here is some problem.
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";
                   return $error;
                 }
               }
          }
      }elseif ($companyImage_name != "" && $circularImage_name=="") {

        $companyImage_size =$file['companyImage']['size'];
        $companyImage_tmp =$file['companyImage']['tmp_name'];
        $companyImage_type=$file['companyImage']['type'];
        $companyImage_ext=strtolower(end(explode('.',$file['companyImage']['name'])));

        $expensions= array("jpeg","jpg","png");
        if(in_array($companyImage_ext,$expensions)=== false){
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> You should be selected jpg, jpeg, pnf file.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif($companyImage_size > 2097152) {
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> Please select less than 2mb.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif(empty($errors)==true) {
               if (empty($job_title) || empty($job_category) || empty($job_description) || empty($job_type)) {
                  $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                     <strong>Warning</strong> Please complete the input fields.
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                     </button>
                   </div>";
                   return $error;
               }else {
                move_uploaded_file($companyImage_tmp,"image/".$companyImage_name);
                 $query = mysql_query("INSERT INTO job_post(job_title, job_category,job_type,post_date,company_image,job_details)
                    VALUES ('$job_title','$job_category','$job_type','$today','$companyImage_name','$job_description')");
                 if ($query) {
                   $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Successfully</strong> data inserted.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    return $error;
                 }else {
                   $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>Danger</strong> Here is some problem.
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";
                   return $error;
                 }
               }
          }
      }else {

        $companyImage_size =$file['companyImage']['size'];
        $companyImage_tmp =$file['companyImage']['tmp_name'];
        $companyImage_type=$file['companyImage']['type'];
        $companyImage_ext=strtolower(end(explode('.',$file['companyImage']['name'])));


        $circularImage_size =$file['circularImage']['size'];
        $circularImage_tmp =$file['circularImage']['tmp_name'];
        $circularImage_type=$file['circularImage']['type'];
        $circularImage_ext=strtolower(end(explode('.',$file['circularImage']['name'])));

        $expensions= array("jpeg","jpg","png");
        if(in_array($companyImage_ext,$expensions)=== false || in_array($circularImage_ext,$expensions)=== false){
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> You should be selected jpg, jpeg, pnf file.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif($companyImage_size > 2097152 || $circularImage_size > 2097152) {
             $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Warning</strong> Please select less than 2mb.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
             return $error;
          }elseif(empty($errors)==true) {
               if (empty($job_title) || empty($job_category) || empty($job_description) || empty($job_type)) {
                  $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                     <strong>Warning</strong> Please complete the input fields.
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                     </button>
                   </div>";
                   return $error;
               }else {
                move_uploaded_file($companyImage_tmp,"image/".$companyImage_name);
                move_uploaded_file($circularImage_tmp,"image/".$circularImage_name);
                 $query = mysql_query("INSERT INTO job_post(job_title, job_category,job_type,post_date,company_image,circular_image,job_details)
                    VALUES ('$job_title','$job_category','$job_type','$today','$companyImage_name','$circularImage_name','$job_description')");
                 if ($query) {
                   $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Successfully</strong> data inserted.
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>";
                    return $error;
                 }else {
                   $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                              <strong>Danger</strong> Here is some problem.
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>";
                   return $error;
                 }
               }
          }
      }
    }

    public function jobDetails($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }

    public function jobtcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }

    public function jobDetailslist()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }

    public function singleJobDetails($id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post WHERE id = '$id'");
      return $sql;
    }

    public function jobDetailsCategory($category)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post WHERE job_category = '$category' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }

    //Blog Delete
    public function postDelete($id)
    {
      connect_db();
      $sql = mysql_query("DELETE FROM post WHERE id = '$id'");
      if ($sql) {
        header("location:blog-list.php");
      }
    }
    //Job Delete
    public function jobDelete($id)
    {
      connect_db();
      $sql = mysql_query("DELETE FROM job_post WHERE id = '$id'");
      if ($sql) {
        header("location:job-list.php");
      }
    }
    public function addAdmin($value)
    {
      connect_db();
      $username = $value['username'];
      $password = $value['password'];
      $password = md5($password);

      $sql = mysql_query("SELECT * FROM admin WHERE username = '$username'");
      $res = mysql_fetch_assoc($sql);
      if ($res) {
        $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
           <strong>This</strong> Admin allready added.
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
           </button>
         </div>";
         return $error;
      }else {
        if (empty($username) || empty($password)) {
           $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Warning</strong> Please complete the input fields.
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
            return $error;
        }else {
          $query = mysql_query("INSERT INTO admin(username, password)
             VALUES ('$username','$password')");
          if ($query) {
            $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
               <strong>Successfully</strong> admin added.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
             return $error;
          }else {
            $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                       <strong>Danger</strong> Here is some problem.
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                       </button>
                     </div>";
            return $error;
          }
        }
      }
    }
    //admin Login
    public function adminlogin($value)
    {
      connect_db();
      $username = $value['username'];
      $password = $value['password'];
      $password = md5($password);

      $sql = mysql_query("select * from admin where username='$username' and password='$password'");
      $res = mysql_fetch_assoc($sql);
      if ($res) {
        $_SESSION['username'] = $res['username'];
        header("location:dashboard");
      }else {
        $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                   <strong>Danger</strong> invalid username & password.
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                   </button>
                 </div>";
        return $error;
      }
    }
    //update admin info
    public function updatePassword($value)
    {
      connect_db();
      $username = $value['username'];
      $password = $value['password'];
      $password = md5($password);

      $sql = mysql_query("UPDATE admin SET password='$password' WHERE username='$username'");
      if ($sql) {
        $error = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                   <strong>Successfully</strong> updated.
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                   </button>
                 </div>";
        return $error;
      }else {
        $error = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                   <strong>Danger</strong> invalid username & password.
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                   </button>
                 </div>";
        return $error;
      }
    }

  }
?>
