<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload a File</title>
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
  <div class="container">
<nav class="navbar">
          <span class="logo">What'sUpDoc?</span>
          <ul class="nav__list">
            <li><a href="index.php" class="nav__link">home</a></li>
            <li><a href="#" class="nav__link">about</a></li>
            <li><a href="#" class="nav__link">contact</a></li>
          </ul>
          <a href="login.php"><button class="signIn">Logout</button></a>
</nav>  
    <div class=fieldset__file>
    <form method=post action="uploadphp.php" enctype="multipart/form-data">
      <h1 class="sign">Upload A File<h1>
    		<span class =input__text>Choose A File: </span><input class=browse type="file" name="fileToUpload"><br><br>
    		<input class=register type="submit" name="submit" value="Upload File">
        <input type="button" class="back" value="Back" onclick="history.back()">
    	</form>
    </div>
</div>
  </body>
</html>
