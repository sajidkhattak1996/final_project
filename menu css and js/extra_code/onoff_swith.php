<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style>
    .onoffswitch {
position: relative; width: 60px;
-webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
display: none;
}
.onoffswitch-label {
display: block; overflow: hidden; cursor: pointer;
border: 2px solid #0B9978; border-radius: 22px;
}
.onoffswitch-inner {
display: block; width: 200%; margin-left: -100%;
transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
display: block; float: left; width: 50%; height: 14px; padding: 0; line-height: 14px;
font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
box-sizing: border-box;
}
.onoffswitch-inner:before {
content: "ON";
padding-left: 10px;
background-color: #0010F5; color: #FFFFFF;
}
.onoffswitch-inner:after {
content: "OFF";
padding-right: 10px;
background-color: #F0114C; color: #FFFFFF;
text-align: right;
}
.onoffswitch-switch {
display: block; width: 14px; margin: 0px;
background: #13F5DB;
position: absolute; top: 0; bottom: 0;
right: 42px;
border: 2px solid #0B9978; border-radius: 22px;
transition: all 0.3s ease-in 0s;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
right: 0px;
}



    </style>

  </head>
  <body>
chalsdjfing
<br>
<input type="checkbox" name="jkjk" id="pp" onchange="test()">

<br>  <br>

    <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" onchange="me()" id="myonoffswitch" value="sajid"  checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
<button type="button" name="button" onclick="ch()" id="pp">slkjfl</button>

<script type="text/javascript">
var b=document.getElementById("myonoffswitch").value;

alert(b);

function me(){
  var a=document.getElementById("myonoffswitch");
  if (a.checked==true) {
    alert('testing chekcedc  ');
  }else {
    alert('not cccccccccccccccccccccc');
  }

}

function ch(){
  var t=document.getElementById("myonoffswitch").value;
  alert(t);
}

function test(){
  var u=document.getElementById("pp");
  if (u.checked == true) {
    alert("checked ");
  }else {
    alert('not checked....');
  }
}
</script>

  </body>
</html>
