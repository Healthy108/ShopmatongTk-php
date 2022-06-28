<a href="?option=home"><b>HOME</b></a><a href="?option=news"><b>NEWS</b></a><a href="?option=feedback"><b>FEEDBACK</b></a><a href="?option=cart"><b>CART</b></a>
	<?php if(empty($_SESSION['member'])):?>
	<a href="?option=signin"><b>SIGNIN</b></a><a href="?option=register"><b>REGISTER</b></a>
	<?php else:?>
		<section class="hellomember"><span style="color: red; font-weight: bold;"><b style="color: snow;">Hello:</b> <?=$_SESSION['member']?></span> [<a href="?option=logout">Logout</a>]</section>
	<?php endif; ?>

	<div class="dropdown" hidden>
  <button onclick="myFunction()" class="dropbtn">&equiv;</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="?option=home">Home</a>
    <a href="?option=news">News</a>
    <a href="?option=feedback">FeedBack</a>
    <a href="?option=cart">Cart</a>
    <?php if(empty($_SESSION['member'])):?>
    <a href="?option=signin">Signin</a>
    <a href="?option=register">Register</a>
    <?php else:?>
      <section><a href="?option=logout">LogOut</a></section>
    <?php endif;?>
  </div>
</div>
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

