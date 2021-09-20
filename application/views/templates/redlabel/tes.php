
<body onLoad="app.show(buttonTest)">
   <template id="popover.html">
      <ons-popover direction="up down" cancelable cover-target>
        <div style="text-align: center;">
        <ons-col>
    <h5>Login untuk pesan makanan!</h5>
<a href="<?php echo $loginURL;?>">
<ons-button><i class="zmdi zmdi-google-plus"></i> Login with Gmail</ons-button>
</a>
</ons-row>
  </ons-col>
          <ons-button onclick="vc()">Close</ons-button>
        </div>
      </ons-popover>
    </template> 