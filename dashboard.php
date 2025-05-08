<?php
session_start();
// header("Cache-Control: no-cache, must-revalidate");
// header("Pragma: no-cache");
// header("Expires: 0");
// Proper cache control
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// cache-control => handle catching like images, scripts, ..
// no store => dont store any this for this page
// no-cache => check if page still up to date
// must-revalidate => check if server see if is still valid
// max-age => make browser check again the server 
header("Cache-Control: post-check=0, pre-check=0", false);
// post-check=0 this make sure browser check to the server if page is valid
// pre-check=0 ->  check if data is updated before displaying
// false -> not store the previous data
header("Pragma: no-cache");
//just like cache-control
header("Expires: 0");
// tell browser when page will be expired
// 0: means page will expred imediatelly so there is no need of storing cache only fetch fresh data
if(!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
} 

?>
<meta http-equiv="Cache-Control" content="no-store" />
<h2>Welcome, <?php echo $_SESSION['user']?></h2>
<a href="select.php">Get list of users</a>
<a href="logout.php">logout</a>
<script>
    // Force reload if user presses back button
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
</script>
