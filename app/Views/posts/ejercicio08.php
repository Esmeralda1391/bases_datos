<style>
    table {
        text-align: center;
    }
</style>
<div style="margin: 0 auto; text-align:center; display:flex; flex-direction:column; width:90%;">
    <h2>Resumen con cantidades de posts escritos por categoria</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Número de posts</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($postsCategoria as $post): ?>
                <?php if ($post['categoria'] == $mayorCat[0]['categoria'] || $post['categoria'] == $menorCat[0]['categoria']) { ?>
                    <tr style="background-color: orange;">
                        <td>
                            <?php echo $post['categoria'] ?>
                        </td>
                        <td>
                            <?php echo $post['numero'] ?>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>
                            <?php echo $post['categoria'] ?>
                        </td>
                        <td>
                            <?php echo $post['numero'] ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach ?>
        </tbody>
    </table>

    <hr>

    <h2>Resumen con cantidades de posts escritos por autor</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Número de posts</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postsAutor as $post): ?>
                <?php if ($post['username'] == $mayorAut[0]['username'] || $post['username'] == $menorAut[0]['username']) { ?>
                    <tr style="background-color: orange;">
                        <td>
                            <?php echo $post['username'] ?>
                        </td>
                        <td>
                            <?php echo $post['numero'] ?>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>
                            <?php echo $post['username'] ?>
                        </td>
                        <td>
                            <?php echo $post['numero'] ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>