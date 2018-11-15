<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple Card Game</title>
  <style media="screen">
    @import url("css/styles.css");
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div id="top">
      <h1>A Simple Card Guessing Game!</h1>
      <h4>Guess if the hidden card is higher or lower value! </h4>
  </div>
  <div id="middle">
      <div id="buttons">
          <input type="button" class="button" value="Higher Value">
          <input type="button" class="button" value="Smaller Value">
      </div>
      <div id="resultArea">
        <h1>Sorry, try again!</h1>
      </div>
      <?php
          include 'inc/functions.php';
          play();
      ?>
  </div>
  <footer>
      <hr>
      CST336-40 Internet Programming 2018&copy; Guerrero <br/>
      <strong>Disclaimer:</strong> The information in this webpage is ficticious. <br/>
      It is used for academic purposes only.
      <figure>
          <img src="img/csumb_logo.png" alt="CSUMB logo"/>
      </figure>
  </footer>
</body>
</html>
