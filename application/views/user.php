<html>
  <head>
    <meta charset="utf-8">
    <title>會員登入</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <style>
    #header{
      background-color: #007bff;
      padding: 10px;
    }
    #main{
      padding: 60px 10%;
    }
    #button{
      margin-top: 30px;
    }
    .tab-pane{
      margin: 50px 200px;
    }
    #header .nav-link{
      color: white;
    }
    #userName{
      margin: 0;
    }
  </style>
  <body>
    <div id="header">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="/pcone/">全部文章</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pcone/blog/author">我的文章</a>
        </li>
        <li class="nav-item">
            <?
              session_start();
              if (isset($_SESSION["accessToken"]) && $_SESSION["accessToken"] != null) {
                echo '<a class="nav-link" href="/pcone/user/logout"> 登出';
              } else {
                echo '<a class="nav-link" href="/pcone/user"> 登入';
              }
            ?>
          </a>
        </li>
      </ul>
    </div>

    <div id="main">
      <nav>
        <div class="nav nav-pills" id="nav-pills" role="tablist">
          <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true"> 會員登入 </a>
          <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">　會員註冊　</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
          <form class="form-horizontal" method="post"  action="<?=site_url("/user/signin")?>">
            <div class="row form-group">
                <label for="email" class="col-sm-2 control-label">帳號</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="signinemail" placeholder="請輸入 E-mail">
                </div>
            </div>
            <div class="row form-group">
                <label for="passsword" class="col-sm-2 control-label">密碼</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="signinpassword" placeholder="請輸入密碼">
                </div>
            </div>
            <br>
            <div align="center"><button type="submit" class="btn btn-primary">Submit</button></div>
          </form>
        </div>
        <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
          <form class="form-horizontal" method="post" action="<?=site_url("/user/signup")?>">
            <div class="row form-group">
                <label for="name" class="col-sm-2 control-label">名稱</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name" placeholder="請輸入會員名稱">
                </div>
            </div>
            <div class="row form-group">
                <label for="email" class="col-sm-2 control-label">帳號</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="signupemail" placeholder="請輸入 E-mail">
                </div>
            </div>
            <div class="row form-group">
                <label for="passsword" class="col-sm-2 control-label">密碼</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="signuppassword" placeholder="請輸入密碼">
                </div>
            </div>
            <br>
            <div align="center"><button type="submit" class="btn btn-primary">Submit</button></div>
          </form>
        </div>
      </div>
      <?php  if (isset($errorMessage)){?>
        <div class="alert alert-danger">
          <?=$errorMessage?>
        </div>
      <?php }?>

    </div>
  </body>
</html>
