<div class="container">
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <?php if (session()->has('error')) { ?>
    <div class="alert alert-danger"><?= session()->pull('error') ?> </div>
    <?php } ?>
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="panel-title">المرصد الحضري</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
      </div>

      <div style="padding-top:30px" class="panel-body">

        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        <form action="<?=route("/admin/login")?>" method="post" id="loginform" class="form-horizontal" role="form">

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="bi bi-person"></i></span>
            <input id="login-username" type="text" class="form-control" name="username" required value=""
              placeholder="اسم المستخدم">
          </div>

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="bi bi-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" required
              placeholder="الرمز السري">
          </div>



          <div class="input-group">

          </div>


          <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls ">
              <button class="btn btn-success  btn-block" type="submit"> تسجيل</button>

            </div>
          </div>
        </form>


        <div class ="home">
          <a href="<?=route("")?>"> Accueil </a>
        </div>


      </div>
    </div>



  </div>
</div>