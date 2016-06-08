<!DOCTYPE html>
        <html>
<head>
    <title>Form</title>
</head>
<body>
<form action="post_to_me" method="POST">
    {{ csrf_field() }}
<input type="text" name="name" placeholder="Enter your name">
<input type="submit" value="Submit">
</form>
</body>
</html>