<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Product List</title>
</head>
<body> 
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Transportasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($transportasi as $row):?>
            <tr>
                <td><?= $row['id_transportasi'];?></td>
                <td><?= $row['transportasi'];?></td>
                <td>
                    <a href="/transportasi/edit/<?= $row['id_transportasi'];?>">Edit</a>
                    <a href="/transportasi/delete/<?= $row['id_transportasi'];?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>