

<?php




// Bước này dùng để kiểm tra thôi chứ ko có tác dụng gì
// Mục đích là ngưng xử lý 3 giây để mình xem dòng chữ loadding 
// Sau khi test xong bạn xóa đi nhé
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    sleep(1);
}
 
// Thiết lập kết quả trả về là html và charset là utf8 để khỏi lỗi font

 
// Kết nối database
include 'config.php';

// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
 
// Kiểm tra trang hiện tại có bé hơn 1 hay không
if ($page < 1) {
    $page = 1;
}
 
// Số record trên một trang
$limit = 2;
 
// Tìm start
$start = ($limit * $page) - $limit;
 
// Câu truy vấn
// Trong câu truy vấn này chúng ta sẽ lấy limit tăng lên 1
// Lý do là vì ta không có viết code đếm record nên dựa vào tổng số kết quả trả về để:
// - Nếu kết quả trả về bằng $limit + 1 thì còn phân trang
// - Nếu kết quả trả về bé hơn $limit + 1 thì nghĩa là hết dữ liệu nên ngưng phân trang

 
$sql = "select * from posts where yn='0' ORDER BY date DESC limit $start,".($limit + 1);


// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql) or die ('Lỗi câu truy vấn');

// Duyệt kết quả rồi đưa vào mảng result
$result = array();
while ($row = mysqli_fetch_array($query))
{
    // Thêm vào result
    array_push($result, $row);
}
 
// Hiển thị dữ liệu
$total = count($result);
// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check phân trang thôi
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row

if ($total > $limit){
    for ($i = 0; $i < $total - 1; $i++)
    {
 $sql = "UPDATE posts SET tim = tim+100 WHERE  yn='0'";
        mysqli_query($conn,$sql);

    $view = '<div class="myvideo">
<video class="overlay" autoplay loop id="bgvid">
             <source type="video/mp4" src="'.$result[$i]["src_video"].'">
           </video>

         <div class="overlay nenphai">
       <img onclick="avatar()" id="avatar" class="avatar" src="'.$result[$i]["src_avatar"].'" height="50px" width="50px" border="1px"><br><br>
       <i id="tim" onclick="tim()" class="fa fa-heart" style="font-size:30px;color:white"></i><br><p id="heard">'.$result[$i]["tim"].'K</p><br>
        <i onclick="comment()" class="material-icons" style="font-size:30px;color:white">chat_bubble</i><br><p>'.$result[$i]["comment"].'20K</p><div id="bl"></div><br>
      <i onclick="luu()" class="material-icons" style="font-size:30px;color:white">turned_in</i><br><div id="luu">'.$result[$i]["luu"].'</div><br>
      <i onclick="share()" class="fa fa-reply" style="font-size:30px;color:white"></i><p id="share">'.$result[$i]["share"].'</p><br>
       </div>
<div class="overlay info">
    
    <h3>'.$result[$i]["name"].'</h3>
    <p>'.$result[$i]["content"].'</p>
 
<div class="nhac">
<i class="fas fa-music icon" style="font-size:15px;color:white"></i>
<marquee class="nhac" width="60%"><p>Nhạc của '.$result[$i]["name"].' </p></marquee><img id="avatar" class="app-logo imgnhac" src="'.$result[$i]["src_avatar"].'" height="40px" width="40px" border="1px"></div>

  </div></div>';
       
  
        echo $view;
       


    }
}
else{
    for ($i = 0; $i < $total; $i++)
    {
    	$sql = "UPDATE posts SET tim = tim+99 WHERE  yn='0'";
        mysqli_query($conn,$sql);

        $view = '<div class="myvideo">
<video class="overlay" autoplay loop id="bgvid">
             <source type="video/mp4" src="'.$result[$i]["src_video"].'">
           </video>

         <div class="overlay nenphai">
       <img onclick="avatar()" id="avatar" class="avatar" src="'.$result[$i]["src_avatar"].'" height="50px" width="50px" border="1px"><br><br>
       <i id="tim" onclick="tim()" class="fa fa-heart" style="font-size:30px;color:white"></i><br><p id="heard">'.$result[$i]["tim"].'K</p><br>
        <i onclick="comment()" class="material-icons" style="font-size:30px;color:white">chat_bubble</i><br><p>'.$result[$i]["comment"].'15K</p><div id="bl"></div><br>
      <i onclick="luu()" class="material-icons" style="font-size:30px;color:white">turned_in</i><br><div id="luu">'.$result[$i]["luu"].'</div><br>
      <i onclick="share()" class="fa fa-reply" style="font-size:30px;color:white"></i><p id="share">'.$result[$i]["share"].'</p><br>
       </div>
<div class="overlay info">
    
    <h3>'.$result[$i]["name"].'</h3>
    <p>'.$result[$i]["content"].'</p>
 
<div class="nhac">
<i class="fas fa-music icon" style="font-size:15px;color:white"></i>
<marquee class="nhac" width="60%"><p>Nhạc của '.$result[$i]["name"].' </p></marquee><img id="avatar" class="app-logo imgnhac" src="'.$result[$i]["src_avatar"].'" height="40px" width="40px" border="1px"></div>

  </div></div>';
       
    
        echo $view;
       


    

    }
}
 
 
// Nếu hết dữ liệu thì stop không phan trang nữa
// Ta chỉ cần kiểm tra xem tổng số record có nhiều hơn limit hay không
// vì trong câu truy vấn mình select với limit = limit + 1
if ($total <= $limit){
    echo '<script language="javascript">stopped = true; </script>';
}
$conn->close();
?>
 