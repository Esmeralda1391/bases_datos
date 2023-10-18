<h1>Mostrar una tabla con el nombre completo del usuario, su email y teléfono, además del título del post con status 0</h1>
<br>
<table border='1'>
    <thead>
        <tr>
            <th>Nombre Completo del Usuario</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Título del Post</th>
            <th>Status</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['Nombre_Completo']; ?></td>
                <td><?= $post['website']; ?></td>
                <td><?= $post['phone']; ?></td>
                <td><?= $post['title']; ?></td>
                <td><?= $post['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        
        <tfoot>
            <tr>
                <th>Nombre Completo del Usuario</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Título del Post</th>
                <th>Status</th>
        </tr>
    </tfoot>
</table>



