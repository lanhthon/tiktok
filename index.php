<?php


include 'config.php';


if (isset($_POST["submit"])) {
	
	$video_name = $_FILES["uploadvid"]["name"];
        $video_tmp_name = $_FILES["uploadvid"]["tmp_name"];
 $video_size = $_FILES["uploadvid"]["size"];
  $video_new_name = "uploads/" ."video_user_". $video_name;  
  
  $img_name = $_FILES["uploadimg"]["name"];
        $img_tmp_name = $_FILES["uploadimg"]["tmp_name"];
 $img_size = $_FILES["uploadimg"]["size"];
  $img_new_name ="uploads/avatar/" ."img_user_". $img_name;  
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
	$content = mysqli_real_escape_string($conn, $_POST["content"]);
	
  if ($video_size > 15242880) {
            echo "<script>alert('Video quá lớn kích cỡ ảnh không quá 15MB.');</script>";
        } else {
            $sql = "INSERT INTO posts (src_video, src_avatar,name,content) VALUES ('$video_new_name', '$img_new_name', '$name', '$content')";
            $result = mysqli_query($conn, $sql);
            }
            if ($result) {
              

 move_uploaded_file($video_tmp_name, "uploads/" ."video_user_". $video_name);
 move_uploaded_file($img_tmp_name, "uploads/avatar/" ."img_user_". $img_name);
 }
	};
	?>
<!DOCTYPE html>
<html lang="vi">
  <head>
            



  	
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	
    <meta charset="utf-8" />
<meta name="mobile-web-app-capable" content="yes">
	

    <title>Lành Thôn</title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    


<script src="https://kit.fontawesome.com/2535cfbbab.js" crossorigin="anonymous"></script>

<link href='https://css.gg/music.css' rel='stylesheet'>
    <link href='https://css.gg/spinner.css' rel='stylesheet'>
    <link href='https://css.gg/heart.css' rel='stylesheet'>
   <link href='https://css.gg/add-r.css' rel='stylesheet'>
   <link href='https://css.gg/home.css' rel='stylesheet'>
<link href='https://css.gg/user.css' rel='stylesheet'>
<link href='https://css.gg/comment.css' rel='stylesheet'>
<link href='https://css.gg/user-add.css' rel='stylesheet'>


    

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
<style>
 
  html{
  scroll-snap-type: y mandatory;
  	}
body {
	overflow-x: hidden;
 	
  
  color:#fff;
 background-color:#000;
background-repeat:no-repeat;
 
 

}
#nen{
	background-size:cover; 
	
	}
.myvideo{
	
width: 100%;
height:700px;

	position: relative;

	}

video {
scroll-snap-align: start;

min-width: 100%;
min-height: 100%;
width: 100%;
height: 100%;
z-index: -1;
background-size: 50%;
}

/*****************************/

.overlay {

  
  position: absolute;
  
  width: 100%;
height: 100%;
  
}


.nencuoi {
	text-align: center;
    border-top: 0.5px solid #fff;
 padding-top:20px;
 padding-left: 25px;
 z-index:5;
 
  display: grid;
  grid-template-columns: 60px 60px 60px 60px 60px;
    position: fixed;

  grid-gap: 5px;

    
   height: 60px;
   width: 100%;
font-size:12px;
  

bottom: 0;
  background-color: rgba(0, 0, 0, 0.8);
  
  
color: #fff;

}
 .nhac{
    display: grid;
  grid-template-columns: 40px 240px 50px;

background-color: rgba(0, 0, 0, 0);

  grid-gap: 5px;
  padding-top: 5px;
  
  

}
#avatar{
	
border-radius:50%;
	}
.imgnhac{
	animation: xoayvong 6s linear 0s infinite;
  
    height:40px;
    width:40px;
border-radius:50%;
    
    
}
.icon{
	padding-top: 15px;
	
	}

.info {
	background-color: rgba(0, 0, 0, 0);
	height:13%;
	width:100%;
	bottom:13%;
    padding-left: 10px;
    font-size:12px;
    
      z-index:-1;
 
  

  


  
  
  
color: #ccc;


}

	
.nentren {
    text-align: center;
position: fixed;
     
  display: grid;
   grid-gap: 20px;

  grid-template-columns: 60px 60px;


  padding-left: 120px;

    
   
    width: 100%;
font-size:16px;
  

top: 0;
  background-color: rgba(0, 0, 0, 0);
  
  
color: #ccc;


}

.nenphai {
	
	  text-align: center;
    width: 15%;
    height: 100%;
    font-size:12px;
    padding-top: 180px;
      
  padding-right:5px;
  padding-left:15px;
   grid-gap: 10px;
  right: 10px;

  background-color: rgba(0, 0, 0, 0);
  
  
color: #ccc;


}


/* Chrome, Safari, Opera */ 
@-webkit-keyframes xoayvong {
  from {
    -webkit-transform:rotate(0deg);
    -moz-transform:rotate(0deg);
    -o-transform:rotate(0deg);
  }
  to {
    -webkit-transform:rotate(360deg);
    -moz-transform:rotate(360deg);
    -o-transform:rotate(360deg);
  }
}
/* Standard syntax */ 
@keyframes xoayvong {
  from {
    -webkit-transform:rotate(0deg);
    -moz-transform:rotate(0deg);
    -o-transform:rotate(0deg);
  }
  to {
    -webkit-transform:rotate(360deg);
    -moz-transform:rotate(360deg);
    -o-transform:rotate(360deg);
  }
}

/* Thong bao Popup  */
.tbpopup .tboverlay {
position:fixed;
top:0px;
left:0px;
width:100vw;
height:100vh;
background:rgba(0,0,0,0.7);
z-index:1;
display:none;
}
 
.tbpopup .tbcontent {
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%) scale(0);
background:rgba(255,255,255,0.1);
max-width:500px;
z-index:2;
text-align:center;
padding:20px;
box-sizing:border-box;
font-family:"Open Sans",sans-serif;
border-radius:20px;
display: block;
position: fixed;
box-shadow:0px 0px 10px #111;
}
@media (max-width: 700px) {
.tbpopup .tbcontent {width:90%;}
}
 
.tbpopup .tbclose-btn {
cursor:pointer;
position:absolute;
right:20px;
top:20px;
width:35px;
height:35px;
color:#fff;
font-size:30px;
font-weight:700;
line-height:35px;
text-align:center;
border-radius:50%;
text-align:center;
}
 
.tbpopup.active .tboverlay {
display:block;
}
 
.tbpopup.active .tbcontent {
transition:all 300ms ease-in-out;
transform:translate(-50%,-50%) scale(1);
}
.tbbuttom{background:#00cc00;color:#fff}
.btn-one {
	line-height: 50px;
	height: 50px;
	text-align: center;
	width: 150px;
	cursor: pointer;
background:rgba(0,206,209);
	color: #fff;
	border-radius:20px;
	position: relative;
	
	border-width: 0.7px;
	
	border-style: solid;
	border-color: white;
	
	
}

.chat{
	padding-left: 25px;
	overflow: scroll;
	height: 70%;
   width: 91%;
	}
#upvideo{
	display:none;
	}
#bl{
	display:none;
	}
.nenbl {
	
	border-radius:10px;
	
	text-align: left;
    border-top: 0.5px solid #fff;
 padding-top:30px;
 padding-left: 2px;
 
 z-index:5;
  
 
    position: fixed;

  

    
   height: 70%;
   width: 99%;
font-size:12px;
  

bottom: 0px;
right:0;
left:0;
  background-color: white;
  
  
color: #333;
animation: myfirst 0.2s linear 0s  alternate;
}
.close {
	right:10px;
	top: 10px;
	position:absolute;
	font-weight: bold;
	}
	
	.container {
		padding-top:20px;
  display: grid;
  grid-template-columns: 35px auto 35px;

}
input[type=text] {
	border-radius:30px;
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #fff;
  outline: none;
  background-color: #F1F1F1;
}

input[type=text]:focus {
  background-color: #CCFFCC;
}
.comment {
	
	bottom: 0;
right:0;
left:0;
	padding-left:20px;
	padding-right:20px;
	padding-bottom:5px;
	text-align: center;
	box-sizing: border-box;
	background-color: white;
	height:150px;
	width:100%;
	position:fixed;
	
	border-top: 0.3px solid #000;
	}
	.iconcm{
		
		height:50px;
		  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
		grid-gap: 20px;
		text-align: center;
		font-size:20px;
		}
.avatarcm{
			
			padding-top:50px;
			}
			



@keyframes myfirst {
   0%   {height: 0%}
3%   {height: 20%}
  5%   {height: 25%}
  10%   {height: 30%}
  15%  {height: 35%}
  20%  height: 40%}
  35%  {height: 45%}
  45% {height: 50%}
  55% {height: 55%}
    75% {height: 60%}
    95% {height: 65%}
    100% {height: 70%}
}
.button {
  position:relative;
  padding: 10px 20px;  
  border: none;
  background: none;
  cursor: pointer;
  
  font-family: "Source Code Pro";
  font-weight: 900;
  text-transform: uppercase;
  font-size: 15px;  
  color: var(--text-color);
  
  background-color: var(--btn-color);
  box-shadow: var(--shadow-color) 2px 2px 22px;
  border-radius: 4px; 
  z-index: 0;  
  overflow: hidden;   
}

.button:focus {
  outline-color: transparent;
  box-shadow: var(--btn-color) 2px 2px 22px;
}

.right::after, .button::after {
  content: var(--content);
  display: block;
  position: absolute;
  white-space: nowrap;
  padding: 40px 40px;
  pointer-events:none;
}

.button::after{
  font-weight: 200;
  top: -30px;
  left: -20px;
} 

.input-file-container {
  position: relative;
  width: 100%;
  text-align: center;
  
} 
.js .input-file-trigger {

  display: block;
  padding: 14px 45px;
  background: #39D2B4;
  color: #fff;
  font-size: 1em;
  transition: all .4s;
  cursor: pointer;
}
.js .input-file {
  text-align: center;
  
  
  width: 100%;
  opacity: 0;
  padding: 14px 0;
  cursor: pointer;
}
.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #34495E;
  color: #39D2B4;
}

.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}
.js .file-return:not(:empty):before {
  content: "Selected file: ";
  font-style: normal;
  font-weight: normal;
}

a {
	color:#39D2B4;
	}
	





</style>
  

</head>


    
<body onload="thongbaopopup()">

      <script>

</script>
<center>
	<!-- Thong bao pupup -->
<div class="tbpopup" id="tbpopup-1">
<div class="tboverlay"></div>
<div class="tbcontent">
<div class="tbclose-btn" onclick="thongbaopopup()">&times;</div>
<h3>Tik Tok clone</h3>
<h3>Chỉ hiện thị dc trên mobie</h3>
<p>(Html,Css,JavaScript,php,sql)</p>
<p>Chỉ chức năng up video là dùng dc :₫</p>

<p>Source: <a href="https://github.com/lanhthon/tiktok.git">https://github.com/lanhthon/tiktok.git</a></p>
<button class="btn-one" onclick="thongbaopopup()">OK</button>
</div>
</div>
<!-- Thong bao pupup -->
    <div class="nentren">
  <p onclick="fl()" id="fl">Follow</p>
    <p onclick="fy()" id="fy">For you</p>
</div>
<div class="nencuoi">
    <i class="gg-home"><br><br>Home</i> 
<i onclick="user()" class="gg-user-add"><br><br>Friends</i>
<i onclick="add()" class="gg-add-r"></i>
<i onclick="u()" class="gg-comment"><br><br>Inbox</i>
<i onclick="user()" class="gg-user"><br><br>Profile</i>
</div>
    <div id="upvideo" class="nenbl" style="text-align:center;height:90%">
    	<form action="" method="post" enctype="multipart/form-data">
<h3 id="loading">Up Video</h3>
  <div class="input-file-container">  
    
    <label tabindex="0" for="my-file" id="vidbtn" class="input-file-trigger">Select a Video...
<input class="input-file" id="uploadvid" name="uploadvid" type="file" accept="video/*" required></label>
  </div>
  <p id="vidtext" class="file-return"></p>
  <hr>
  <div class="input-file-container">  
    
    <label for="my-file" id="imgbtn" class="input-file-trigger">Select a avatar...
<input class="input-file" id="uploadimg" name="uploadimg" type="file" accept="image/*" required>
</label>
  </div>
  <p id="imgtext" class="file-return"></p>
  <h3>You name</h3>
             <input class="form-control" type="text" id="name" name="name" placeholder="name" value="" required>
             	  <h3>Video content</h3>
                <input class="form-control" type="text" id="content" name="content" placeholder="content" value="" required><br>
                	
            
    	<button onclick="loanding()" type="submit" name="submit" class="btn-one">OK</button>
       
        </form>
    	</div>
<div id="bl" class="nenbl">
    <div class="close" style="color:#000;font-size:30px;" onclick="dong()">&times;</div>
    <div class="chat">
               <div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận </p>
         <div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
<div class="container">
           <img id="avatar" class="avater" src="avatar.jpg" height="30px" width="30px" border="1px">
<h3>Name</h3></div>
<p>Bình luận ở đây</p>
</div>
<div class="comment">
	<div class="iconcm">
	<h3>😀</h3><h3>😆</h3><h3>🥰</h3>
	<h3>😍</h3><h3>🙄</h3><h3>🤗</h3>
	</div>
	<div class="container">
	<img id="avatar" class="avatercm" src="avatar.jpg" height="30px" width="30px" border="1px">
<input type="text" placeholder="Add comment"><h3>send</h3>
	</div>
</div>
</div>
 


    








</center>

    <div id="nen">
    <?php


include 'list.php';
?>

</div>
 </div>

  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>





    <script>
    	var x = (screen.availHeight-115);
    window.addEventListener('scroll', function (){
var n = document.getElementsByClassName("myvideo");
var i;
for (i = 0; i < n.length; i++) {
    n[i].style.height= x+"px";
    
}
    });
function loading(){
	document.getElementById("loading").innerHTML="ĐANG TẢI VIDEO LÊN...";
	}
    function tim() {

document.getElementById("tim").style.color='red';
	}
	function comment() {
document.getElementById("bl").style.display='block';

	}
	function dong() {
document.getElementById("bl").style.display='none';

	}
	function dong() {
document.getElementById("bl").style.display='none';

	}
document.querySelector("html").classList.add('js');

var fileInput  = document.getElementById("uploadvid"),  
    button     = document.getElementById("vidbtn"),
    the_return = document.getElementById("vidtext");
  var fileInputimg  = document.getElementById("uploadimg"),  
    buttonimg     = document.getElementById("imgbtn")
    the_returnimg = document.getElementById("imgtext");
          
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  

buttonimg.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInputimg.focus();  
    }  
});
buttonimg.addEventListener( "click", function( event ) {
   fileInputimg.focus();
   return false;
});  
fileInputimg.addEventListener( "change", function( event ) {  
    the_returnimg.innerHTML = this.value;  
});  



function add() {
document.getElementById("upvideo").style.display='block';

	};
	
    	function thongbaopopup(){
document.getElementById("tbpopup-1").classList.toggle("active");
var vid=document.getElementById("bgvid");
vid.play();
}

      window.addEventListener('load', videoScroll);
window.addEventListener('scroll', videoScroll);



      

      
        
      



function videoScroll() {

  if ( document.querySelectorAll('video[autoplay]').length > 0) {
    var windowHeight = window.innerHeight,
        videoEl = document.querySelectorAll('video[autoplay]');

    for (var i = 0; i < videoEl.length; i++) {

      var thisVideoEl = videoEl[i],
          videoHeight = thisVideoEl.clientHeight,
          videoClientRect = thisVideoEl.getBoundingClientRect().top;

      if ( videoClientRect <= ( (windowHeight) - (videoHeight*.5) ) && videoClientRect >= ( 0 - ( videoHeight*.5 ) ) ) {
     
   thisVideoEl.play();
   
      } else {
        thisVideoEl.pause();
        
      }

    }
  }

};



    </script>
  


</body>
</html>




