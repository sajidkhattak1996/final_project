<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
         <script>
         $(document).ready(function() {
               $("#btn_click").click(function(event){
                   $('#div1').html();
               });
            });
         </script>
          <style>body{ font-size: 12px; font-family: Arial; }</style>
    </head>

<body>
    <br />
    <div id="div1" style="border:solid 1px red; width: 100px;">
        <?php  echo rand(10,100); ?>
    </div>
    <br /><br />

    <div id="div2" style="border:solid 1px green; width: 100px;">
        <button type="button" id="btn_click" /> click me!</button>
    </div>
</body>
</html>
