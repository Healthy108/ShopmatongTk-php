<!-- header -->
<div class="header_Top">

  <!-- dropdoen-btn -->
  <div class="dropdown" hidden>
    <button onclick="myFunction()" class="dropbtn">&equiv;</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="?option=home">Home</a>
      <a href="?option=news">News</a>
      <a href="?option=feedback">FeedBack</a>
      <?php if(empty($_SESSION['member'])):?>
        <a href="?option=signin">Signin</a>
        <a href="?option=register">Register</a>
        <?php else:?>
          <a href="?option=cartcontainer">Cart</a>
          <!-- <a href="?option=cart">Cart</a> -->
        <section><a href="?option=logout">LogOut</a></section>
      <?php endif;?>
    </div>
  </div>

  <!-- logo -->
  <div style="display: flex; cursor: pointer" class="logo_container">
      <a href="?option=home"><img src="images/logo-con-ong-10.jpg" alt="Logo shopTK" class="logo"></a>
      <h1 onclick="location='?option=home'" class="logo_title">SHOP*TK</h1>
  </div>

  <!-- Search --> 
  <form autocomplete class="search" action="#products"> 
      <input autocomplete="on" type="search" name="keyword" value="<?=isset($_GET['keyword'])?$_GET['keyword']:""?>" placeholder="Enter keywords!" >
      <br>
      <input type="submit" value="Search">
  </form>

  <!-- menu top -->
    <a href="?option=home"><b>HOME <i class="fa-solid fa-house"></i></b></a>
    <a href="?option=feedback"><b>FEEDBACK <i class="fa-solid fa-comment"></i></b></a>
    <a href="?option=news"><b>NEWS <i class="fa-solid fa-newspaper"></i></b></a>
      <?php if(empty($_SESSION['member'])):?>
        <a href="?option=signin"><b>SIGNIN <i class="fa-sharp fa-solid fa-right-to-bracket"></i></b></a>
        <a href="?option=register"><b> REGISTER <i class="fa-sharp fa-solid fa-id-card"></i></b></a>
      <?php else:?>
        <!-- <a href="?option=cart"><b>CART <i class="fas fa-shopping-cart"></i></b></a> -->
        <a href="?option=cartcontainer"><b>CART <i class="fas fa-shopping-cart"></i></b></a>
    		<section class="hellomember">
          <span style="color: red; font-weight: bold; cursor: pointer" onclick="location='?option=user'"> 
            <b style="color: #000;">Hello:</b> 
            <?=$_SESSION['member']?>
          </span> 
          [<a href="?option=logout">Logout</a>]
        </section>
    	<?php endif; ?>
  


  <script>
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  </script>

</p>
</div>
