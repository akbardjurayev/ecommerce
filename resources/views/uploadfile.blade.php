<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Input Example</title>
</head>
<body>

    <h2>Upload a Photo:</h2>

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        <label for="photoInput">Choose a photo:</label>
        <input type="file" id="photoInput" name="photoInput" accept="image/*">
        <button type="submit">Upload</button>
    </form>

</body> 
</html>

