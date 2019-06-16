<html>
  <head>
    <meta charset="utf-8">
    <title>文章管理</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <style>
    body {
      padding: 10%;
    }
  </style>
  <body>
    <div id="main">
      <form class="form-horizontal" method="post"  action="<?=site_url("/post/write")?>">
        <div class="row form-group">
            <label for="title" class="col-sm-2 control-label">文章標題</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" id="title">
            </div>
        </div>
        <div class="row form-group">
            <label for="title" class="col-sm-2 control-label">文章內容</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="content" name="content" style="height:200px;"></textarea>
            </div>
        </div>
        <div align="center"><button type="submit" class="btn btn-primary"> 發文 </button></div>
      </form>
      <?php  if (isset($errorMessage)){?>
        <div class="alert alert-danger">
          <?=$errorMessage?>
        </div>
      <?php }?>

    </div>
  </body>
</html>
