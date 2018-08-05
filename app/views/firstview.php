<html>
<head>
<title>FirstView</title>
</head>
<body>
<h1>This is First View</h1>
<form action="<?php baseUrl('Home/form/'); ?>"  method="post" enctype="multipart/form-data">
<input name='name' type="text" />
<input type="file" name='myfile' />
<button type="submit" name="submit">Submit</button>
</form>
<br/>
<a href="<?php baseUrl('Home/Link/1234'); ?>" >MyLink</a>
</body>
</html>