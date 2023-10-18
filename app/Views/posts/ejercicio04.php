
<html>
<head>
    <title>Posts Creados en 2022</title>
</head>
<body>
    <h1>Posts Creados en 2022</h1>
    <table border="1"> 
        <thead>
            <tr>
                <th>Username</th> 
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Género</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                <td><?= $post['username'] ?></td>
                    <td><?= $post['nombre_completo'] ?></td>
                    <td><?= $post['website'] ?></td>
                    <td><?= ($post['gender'] === 'H') ? 'Hombre' : 'Mujer' ?></td>
                    <td><?= $post['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>


