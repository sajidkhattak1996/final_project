<?php
if (isset($_GET['cid'])  && isset($_GET['cn']) && isset($_GET['sub']) && isset($_GET['tn']))
{
  $cid=$_GET['cid'];
  $cn=$_GET['cn'];
  $sub=$_GET['sub'];
  $tn=$_GET['tn'];

}

 ?>


    <style type="text/css">
        .tabletabs{

                        width:98.5%;
                        margin: 0 auto;
                        border-radius: 30px 30px 0px 0px;
                        height:30px;
                        margin-bottom: -20px;

                  }


                      #table_maindiv {

                        	border-radius: 10px;
                        	padding-top:10px;
                        	padding-bottom: 10px;
                        	width: 100%;
                  }
                #b1:hover{color: blue;border-color: #008c7e}
                  #b3:hover{color: blue;border-color: #008c7e}
                    #b4:hover{color: blue;border-color: #008c7e}
                      #b5:hover{color: blue;border-color: #008c7e}
                  #b1{
                    background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                    background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                    background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                    background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
                    color: blue;
                    border-left: solid 1px rgba(172,239,224,0.66);
                    border-top: solid 1px rgba(172,239,224,0.66);
                    border-right: solid 1px rgba(172,239,224,0.66);

                    border-radius: 7px 7px 0px 0px;
                  }
                  #b1,#b3,#b4,#b5{
                      background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
                      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
                      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
                      background-image: linear-gradient(180deg,rgba(127,243,228,0.52) 0%,rgba(237,251,249,0.81) 100%);
                      color: #6f9de8;
                      border:solid 1px rgba(127,243,228,0.52);
                      border-radius: 7px 7px 0px 0px;
                  }
                  #b1:hover{
                      background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                       background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                       background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                       background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                       color: #1f5de8;
                  }
                  #b2:hover{
                     background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      color: #1f5de8;
                  }
                  #b3:hover{
                     background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      color: #1f5de8;
                  }
                  #b4:hover{
                     background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      color: #1f5de8;
                  }
                  #b5:hover{
                     background-image: -webkit-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -moz-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: -o-linear-gradient(270deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      background-image: linear-gradient(180deg,rgba(127,243,228,0.9) 0%,rgba(237,251,249,0.9) 100%);
                      color: #1f5de8;
                  }

                  @media (max-width: 600px) { .tabletabs{ margin-left: -50px;} }


    .dropbtn {
          background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          color: blue;
          border-left: solid 1px rgba(172,239,224,0.66);
          border-top: solid 1px rgba(172,239,224,0.66);
          border-right: solid 1px rgba(172,239,224,0.66);

          border-radius: 7px 7px 7px 7px;
          width: 50px;
          font-weight: bolder;
          padding: 5px;
          font-size: 22px;
          cursor: pointer;
        }
        .dropdown {
          position: relative;
          display: inline-block;
        }
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        .dropdown-content a {
          color: black;
          padding: 5px 16px;
          text-decoration: none;
          display: block;
          border-radius: 12px;
          border-bottom: solid 1px #008c7e;
          border-top: solid 1px #008c7e;
        }
        .dropdown-content a:hover {
          background-image: -webkit-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: -moz-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: -o-linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          background-image: linear-gradient(180deg,rgba(172,239,224,0.66) 21.76%,rgba(0,140,126,1.00) 98.45%);
          color: #000;
          border:solid 1px rgba(127,243,228,0.52);
          border-radius: 12px;
          font-weight: bolder;
        }
        .dropdown:hover .dropdown-content {
          display: block;

        }
        .dropdown:hover .dropbtn {
          background-color: #008c7e;
          color: #fff;
        }
        @media (max-width: 549px){  #mobile_menu_div{  display: block;} .tabletabs{ display: none}   }
        @media (min-width: 550px) { #mobile_menu_div{ display: none }   .tabletabs{ display: block}  }
    </style>



<!--=======table top menu started ====-->
<div class="container-fluid" id="table_maindiv" style="height: 38px;">
    <!-- below area and button such etc -->
    <div class="tabletabs" >

              <ul>
                    <a href="std_share_main_page.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"> <button id="b1" type="submit">  <b>     View Slides   </b> </button>  </a>
                    <a href="std_view_active_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"> <button id="b4" type="submit">  <b>      Active Notification          </b>  </button> </a>
                    <a href="std_view_expire_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"> <button id="b3" type="submit">  <b>      Expire Notification          </b>  </button> </a>
                    <a href="std_view_all_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"> <button id="b5" type="submit">  <b>      All Notification          </b>  </button> </a>
              </ul>

      </div>
      <div id="mobile_menu_div" style="width:35%;margin-top: -10px;margin-left: 5px;padding-bottom: 2px;">


                <style>

                </style>

                      <div class="dropdown">
                          <button class="dropbtn"><span class="glyphicon glyphicon-list" ></span> </button>
                          <div class="dropdown-content">
                            <a href="std_share_main_page.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"><button name="class_r_view" style="background: none ; border: none"> View Slides </button></a>
                            <a href="std_view_active_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"><button name="quize_r_view" style="background: none ; border: none"> Active Notification        </button></a>
                            <a href="std_view_expire_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"><button name="quize_r_view" style="background: none ; border: none"> Expire Notification        </button></a>
                            <a href="std_view_all_notification.php?cid=<?php echo $cid; ?>&cn=<?php echo $cn; ?>&sub=<?php echo $sub; ?>&tn=<?php echo $tn; ?>"><button name="quize_r_view" style="background: none ; border: none"> All Notification        </button></a>
                          </div>
                        </div>


      </div>

  </div>
<!--==================ended================================================================================-->
