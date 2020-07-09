<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery.min.js"></script>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<label for="levels">选择年级:</label>
  	<select id="levels" name="levels">
	    <option value="xx">小学</option>
	    <option value="cz">初中</option>
	    <option value="gz">高中</option>
  	</select>
  	<br />
	<input type="file" name="file">
	<br />
	<input name="question" type="text"/>
	<br />
	<button type="submit" name="submit" id="submit">提交</button>
</body>
</html>