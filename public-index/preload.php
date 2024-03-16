<style>
 #preloader{
	background: #fff url(load.gif) no-repeat center center;
	 height: 100vh;
	 width: 100%;
	 position: fixed;
	 z-index: 100;
	 background-size: 20%;
	 display: flex;
	 justify-content: center;
	 align-items: center;
 }
 @media (max-width: 768px) {
	 #preloader {
		 background-size: 20%; /* Adjust background size for smaller screens */
	 }
 }

 @media (max-width: 576px) {
	 #preloader {
		 
		 background-size: 60%; /* Adjust background size for even smaller screens */
	 }
 }
</style>


<div id="preloader">

</div>

<<script>
var loader = document.getElementById("preloader");

// Show preloader for 3 seconds
setTimeout(function(){
    loader.style.display = "none";
    // Add any additional actions you want to perform after preloader is hidden
}, 1000); // 3000 milliseconds (3 seconds)
</script>