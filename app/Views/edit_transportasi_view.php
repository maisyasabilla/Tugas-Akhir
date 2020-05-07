<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <form action="/transportasi/update" method="post">
        <input type="text" name="transportasi_name" value="<?= $transportasi->transportasi;?>">
        <input type="hidden" name="transportasi_id" value="<?= $transportasi->id_transportasi;?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>