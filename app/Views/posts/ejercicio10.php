<style>
    table {
        text-align: center;
    }
</style>
<div style="margin: 0 auto; text-align:center; display:flex; flex-direction:column; width:90%;">
    <h2>Último post de mujeres menores de 30 años</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Autor</th>
                <th>Profile</th>
                <th>Sexo</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($postsM as $post): ?>
                <tr>
                    <td>
                        <?php echo $post['title'] ?>
                    </td>
                    <td>
                        <?php echo $post['content'] ?>
                    </td>
                    <td>
                        <?php echo $post['autor'] ?>
                    </td>
                    <td>
                        <?php echo $post['profile'] ?>
                    </td>
                    <td>
                        <?php echo $post['gender'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <hr>
    <h2>Primer post de hombres mayores de 16 años</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Autor</th>
                <th>Profile</th>
                <th>Sexo</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($postsH as $post): ?>
                <tr>
                    <td>
                        <?php echo $post['title'] ?>
                    </td>
                    <td>
                        <?php echo $post['content'] ?>
                    </td>
                    <td>
                        <?php echo $post['autor'] ?>
                    </td>
                    <td>
                        <?php echo $post['profile'] ?>
                    </td>
                    <td>
                        <?php echo $post['gender'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>