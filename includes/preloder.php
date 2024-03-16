<?php ?>
<!DOCTYPE html>
<html> 
<style>
#loading{
	 position: fixed;
	 width: 100%;
	 height: 100vh;
	 background: rgba(255, 255, 255)
	 url('images/loading.gif') no-repeat center;
	 z-index: 99999999;
}
</style>
<body>
<!--https://i.gifer.com/7TwJ.gif--https://media.giphy.com/media/y1ZBcOGOOtlpC/200.gif-->
<div id="loading"></div>
<a href="" class="back-to-top"><i class="icofont-simple-up"></i></a>
<script>
var preloader = document.getElementById('loading');
function mypre(){
	preloader.style.display='none';
}
</script>
</body>
</html>			