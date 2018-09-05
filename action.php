<?php include_once("inc/function.php");?>
<?php
  class action
  {
    //Job section
    public function jobList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY RAND() DESC LIMIT 0,8");
      return $sql;
    }
    public function jobsList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function jobDetails($job_id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post WHERE id = '$job_id'");
      return $sql;
    }
    public function postDetailsCategory($category)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category = '$category' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }
    public function jobcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_post ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }

    //News Section
    public function newsList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='News' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }
    public function newsLists()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='News' ORDER BY id DESC LIMIT 0,1");
      return $sql;
    }
    public function newssList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='News' ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function newscount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='News' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //Entertainment Section
    public function entertainmentList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Entertainments' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }
    public function entertainmentLists()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Entertainments' ORDER BY id DESC LIMIT 0,1");
      return $sql;
    }
    public function entertainmentsList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Entertainments' ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function entertainmentcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Entertainments' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //Internationnal Section
    public function internationalList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Internationnal' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }
    public function internationalLists()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Internationnal' ORDER BY id DESC LIMIT 0,1");
      return $sql;
    }
    //Sport Section
    public function sportList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Sports' ORDER BY RAND() DESC LIMIT 0,8");
      return $sql;
    }
    public function sportLists()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Sports' ORDER BY id DESC LIMIT 0,1");
      return $sql;
    }
    public function sportsList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Sports' ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function sportcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Sports' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //Education Section
    public function educationList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Education' ORDER BY RAND() DESC LIMIT 0,8");
      return $sql;
    }
    public function educationsList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Education' ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function educationcount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='Education' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //General Knowledge Section
    public function generalknowledgeList()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='General Knowledge' ORDER BY RAND() DESC LIMIT 0,8");
      return $sql;
    }
    public function generalknowledgesList($page1)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='General Knowledge' ORDER BY id DESC LIMIT $page1,10");
      return $sql;
    }
    public function generalknowledgecount()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='General Knowledge' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //Pst Details Section
    public function postDetails($id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE id = '$id'");
      return $sql;
    }
    public function relatedPost($category)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post WHERE post_category='$category' ORDER BY RAND() DESC LIMIT 0,5");
      return $sql;
    }
    public function newPost()
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post ORDER BY id DESC LIMIT 0,3");
      return $sql;
    }
    //Job Comments
    public function addjobcomment($value, $job_id)
    {
      connect_db();
      $name = $value['name'];
      $email = $value['email'];
      $comment = $value['comment'];

         if (empty($name) || empty($email) || empty($comment)) {
            $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>Warning</strong> Please complete the input fields.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
             return $error;
         }else {
           $query = mysql_query("INSERT INTO job_comment(job_id,viewer_name, viewer_email,comments)
              VALUES ('$job_id','$name','$email','$comment')");
           if ($query) {
             header("location:job-details?job_id=$job_id");
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
    //get job comments
    public function getjobcomment($job_id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_comment WHERE job_id='$job_id' ORDER BY id DESC LIMIT 0,5");
      return $sql;
    }
    public function totalcomment($job_id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM job_comment WHERE job_id='$job_id' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    //Post Comments
    public function addpostcomment($value, $id, $category)
    {
      connect_db();
      $name = $value['name'];
      $email = $value['email'];
      $comment = $value['comment'];

         if (empty($name) || empty($email) || empty($comment)) {
            $error = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>Warning</strong> Please complete the input fields.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
             return $error;
         }else {
           $query = mysql_query("INSERT INTO post_comment(post_id,viewer_name, viewer_email,viewer_comment)
              VALUES ('$id','$name','$email','$comment')");
           if ($query) {
             header("location:details?id=$id & category=$category");
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
    //get post comments
    public function getpostcomment($id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post_comment WHERE post_id='$id' ORDER BY id DESC LIMIT 0,5");
      return $sql;
    }
    public function totalpostcomment($id)
    {
      connect_db();
      $sql = mysql_query("SELECT * FROM post_comment WHERE post_id='$id' ORDER BY id DESC");
      $count = mysql_num_rows($sql);
      return $count;
    }
    

  }
?>
