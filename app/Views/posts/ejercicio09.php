<style>
table {
text-align: center;
}
</style>
<div style="margin: 0 auto; text-align:center; display:flex; flex-direction:column; width:90%;">
    <h2>título, contenido y el nombre de la categoria de todos los usuarios cuyo perfil sea administrador.</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Categoria</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <?php echo $post['title'] ?>
                    </td>
                    <td>
                        <?php echo $post['content'] ?>
                    </td>
                    <td>
                        <?php echo $post['category'] ?>
                    </td>
                    <td>
                        <?php echo $post['profile'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>