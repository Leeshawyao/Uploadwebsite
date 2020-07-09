<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery.min.js"></script>
    <script src="clipboard.min.js"></script>
</head>
<body>
	<?php
	if(isset($_POST['submit'])){

		//处理图片
		$Levels = $_POST['levels'];
		$file = $_FILES['file'];
		//print_r($file);
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		if(is_uploaded_file($fileTmpName))//注意tempName
		{
			//echo ("$fileName is uploaded via HTTP POST");
		}else{
			echo ("$fileName is not uploaded via HTTP POST");
		}

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		//echo ("The fileActualExt is ：$fileActualExt");

		$allowed = array('jpg', 'jpeg', 'png');

		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0){
				if($fileSize < 4194304){//4x1024x1024 Byte
					$IDnumber = uniqid();
					$fileNameNew = $IDnumber.".".$fileActualExt;
					// echo ("The fileNameNew is ：$fileNameNew ");
					if ($Levels == "xx") {
						$fileLevel = 'uploads/xiaoxue/';
						$fileDestination = 'uploads/xiaoxue/'.$fileNameNew;
					}else if ($Levels == "cz") {
						$fileLevel = 'uploads/chuzhong/';
						$fileDestination = 'uploads/chuzhong/'.$fileNameNew;
					}else{
						$fileLevel = 'uploads/gaozhong/';
						$fileDestination = 'uploads/gaozhong/'.$fileNameNew;
					}
					move_uploaded_file($fileTmpName, $fileDestination);
					//echo "<script language=javascript>alert('取题码：".$IDnumber."请复制或截图前述取题码!');location.href=('https:xiyaoeva.github.io/wanchengjiemian/');</script>";
					//header("Location: http://www.baidu.com");
					//header("Location: index.php?uploadsuccess");
				}else{
					echo "Your file is too big!";
				}
			}else{
				echo "There was an error uploading your file!";
			}
		}else{
			echo "You cannot upload files of this type!";
		}

		//处理描述文字
		if(isset($_POST['question'])) {
    		$data = $_POST['question']."\r\n";
    		$ret = file_put_contents($fileLevel.$IDnumber.'.txt', $data, FILE_APPEND | LOCK_EX);
    		if($ret === false) {
        		die('There was an error writing this file');
    		}
    		else {
        		echo "$ret bytes written to file";
    		}
		}else {
   			die('no post data to process');
		}
	}
	?>
    <input type=text value='<?php echo $IDnumber ?>' id = "numbers">
	<button class="btn" type="submit" name="clip" id="clip" data-clipboard-text='<?php echo $IDnumber ?>'>复制取题码</button>
	<script language=javascript> 
    var btn = document.getElementById('clip');
    var clipboard = new Clipboard(btn);
    clipboard.on('success', function(e) {
        console.log(e);
        successmsg();
    });
    clipboard.on('error', function(e) {
        console.log(e);
        failmsg();
    });
    
    function successmsg() {
  		alert("取题码"+document.getElementById("numbers").value+" 复制成功！请妥善保存！以防万一您也可以截图保存！");
  		location.href=('https:xiyaoeva.github.io/wanchengjiemian/');
	}
	function failmsg() {
		alert("取题码"+document.getElementById("numbers").value+" 复制失败！请手动复制或者截图保存！");
	}
 	</script>
</body>