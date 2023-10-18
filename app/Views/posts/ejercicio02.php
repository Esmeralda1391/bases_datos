
<h1>Mostrar una tabla con el nombre del post y el nombre completo del autor de
la última categoría registrada en la base de datos.</h1>
<br>
<table border='1'>
    <thead>
        <tr>
            <th>Nombre del Post</th>
            <th>Nombre_Completo_Autor</th>
            
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['Nombre_Post']; ?></td>
                <td><?= $post['Nombre_Completo_Autor']; ?></td>
               
                
            </tr>
            <?php endforeach; ?>
        </tbody>
        
        <tfoot>
            <tr>
                <th>Nombre del Post</th>
                <th>Nombre_Completo_Autor</th>
                
        </tr>
    </tfoot>
</table>



