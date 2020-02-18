<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>contact about website</title>
  </head>
  <body>
    <!--===============below loader are include =================-->
    <?php include('plugins/loader/loader1.html'); ?>
    <!--=================ended==================================-->
    <?php  include "nav_menu.php";  ?>
    <style>

      .ab{
        font-family:arial;
        position: absolute;
        left: 50%;
        transform: translate(-50%,-500px);
        width: 100%;
        height: auto;
        box-sizing: border-box;
        background: rgba(0,166,138,1.0);
        padding: 10px;  /*it inside increase the padding */
       border-radius: 20px;
      }
      #c1{
        background: #13bca4;
        border:solid 1px #008c7e;
        border-radius: 6px;
        margin-top: 5px;
        opacity: 0.8
      }
      #r{
        margin: 0 auto;
      }
      #r2{
          margin: 0 auto;
        margin-top: 10px;
        background: #13bca4;
        border:solid 1px #008c7e;
        border-radius: 6px;
        opacity: 0.9
      }
      #abdiv{padding-top: 10px;padding-bottom: 10px}
      @media(max-width: 960px){#abdiv{padding-top: 0px;padding-bottom: 0px} .ab{margin-top: 150px}
       .ab{
          font-family:arial;
          position: absolute;
          left: 50%;
          transform: translate(-50%,-500px);
          width: 100%;
          height: auto;
          box-sizing: border-box;
          background: rgba(0,166,138,1.0);
          padding: 10px;  /*it inside increase the padding */
         border-radius: 20px;
        }}
    </style>
          <div id="md">
            <div class="ab" id="abdiv">

                <div class="row" id="r2">
                  <div class="col-lg-6"><b>Address: University Of Peshawar , Peshawar, Pakistan</b> </div>
                </div>
                <div class="row" style="margin: 0 auto">
                  <br>
                    <strong>Location Map</strong>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.371302814191!2d71.48602918153502!3d34.00867892747324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d92de8c4cd1d21%3A0x56a608fc5c4c5df6!2sUniversity%20of%20Peshawar!5e0!3m2!1sen!2s!4v1578487801424!5m2!1sen!2s" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                  </div>
                <div id="11">  <?php include'footer.php'; ?></div>
              </div>
            </div>

  </body>
</html>
