<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="styles.css">
	<title>提问</title>
	<script src="jquery.min.js"></script>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<br />
	<center><h2>问题提交</h2></center>
	<br />
	<label for="levels">选择年级:</label><br />
  	<select id="levels" name="levels">
	    <option value="xx">小学</option>
	    <option value="cz">初中</option>
	    <option value="gz">高中</option>
  	</select>
  	<br />
  	<br />
	<label>上传题目: </label><br />
	<input type="file" name="file">
	<br />
	<br />
	<label>问题描述:</label>
	<div class="title_box">
	    <div class="title_left"></div>
		<textarea rows="5" name="question" type="text"/ id="question" placeholder="可选填"></textarea>
		<div class="title_right"></div>
	</div>
	<br />
	<br />
	<center><button type="submit" name="submit" id="submit">提交</button></center>
</body>
</html>