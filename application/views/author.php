<html>
  <head>
    <meta charset="utf-8">
    <title>全部文章</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <style>
    #header{
      background-color: #007bff;
      padding: 10px;
    }
    .nav-link{
      color: white;
    }
    #main{
      padding: 60px 10%;
    }
    #button{
      margin-top: 30px;
    }
  </style>
  <body>
    <div id="header">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="/pcone/">全部文章</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pcone/user">我的文章</a>
        </li>
        <li class="nav-item">
            <?
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
      <div class="row">
        <?php foreach($article as $data){?>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                  <?php echo $data->title; ?>
                </h3>
                <p class="card-text"><?php echo $data->content; ?></p>
                <hr>
                <a href="<?=site_url("post/edit/".$data->id)?>" class="btn btn-primary" >編輯文章</a>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php  if (isset($errorMessage)){?>
        <div class="alert alert-danger">
          <?=$errorMessage?>
        </div>
      <?php }?>
    </div>
  </body>
</html>
