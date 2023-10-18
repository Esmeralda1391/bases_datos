<?php

namespace App\Controllers;

class PostController extends BaseController
{

	public function ejercicio01() //Esmeralda
	{
		$db = \Config\Database::connect();
		$posts = $db->query('select c.category, p.id, p.title, u.username, p.created_at from categories as c 
		right join posts as p on p.category = c.id left join users as u on u.id = p.autor 
		where p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

		$data = [
			'posts' => $posts
		];

		return view('posts/ejercicio01', $data);
	}

	//02 Mostrar una tabla con el nombre del post y el nombre completo del autor de la última categoría registrada en la base de datos
	public function ejercicio02() //Esmeralda
	{
		$db = \Config\Database::connect();
		$posts = $db->query('SELECT p.title AS Nombre_Post, CONCAT(ui.name, "", ui.lastname) AS Nombre_Completo_Autor
		FROM posts AS p
		JOIN userinfo AS ui ON p.autor = ui.id
		JOIN (SELECT MAX(id) AS ultima_categoria FROM categories) AS ult_cat ON p.category = ult_cat.ultima_categoria
		')->getResultArray();

		$data = [
			'posts' => $posts
		];
		return view('posts/ejercicio02', $data);
	}

	//03 Mostrar una tabla con el nombre completo del usuario, su email y telefono ademas del titulo del post con status 0
	public function ejercicio03() //Esmeralda
	{

		$db = \Config\Database::connect();
		$posts = $db->query('select concat(ui.name,"",ui.lastname) as Nombre_Completo,ui.website,ui.phone, p.title,p.status from userinfo
		as ui join posts as p on p.autor = ui.id where p.status=0')->getResultArray();

		$data = [
			'posts' => $posts
		];
		return view('posts/ejercicio03', $data);
	}

	//04 Mostrar una tabla con el username, nombre completo del usuario, el email y una columna con el género (hombre/mujer) de todos los posts creados en el año 2022.
	public function ejercicio04() //Esmeralda
	{
		$db = \Config\Database::connect();
		$posts = $db->query('select u.username, concat (ui.name, " ", ui.lastname) as nombre_completo, ui.website, ui.gender,ui.created_at
	from posts AS p
	join users AS u ON p.autor = u.id
	join userinfo AS ui ON u.id = ui.id
	where p.created_at between "2022-01-01" AND "2022-12-31"')->getResultArray();

		$data = [
			'posts' => $posts
		];

		return view('posts/ejercicio04', $data);
	}

	public function ejercicio05() //Andrea
	{

		$db = \Config\Database::connect();
		$totalUsers = $db->query('select count(*) as "totalUsuarios" from users')->getResultArray();

		$totalPosts = $db->query('select count(*) as "totalPublicaciones" from posts')->getResultArray();

		$totalComments = $db->query('select count(*) as "totalComentarios" from comments')->getResultArray();

		$totalCategories = $db->query('select count(*) as "totalCategorias" from categories')->getResultArray();

		$data = [
			'totalUsers' => $totalUsers,
			'totalPosts' => $totalPosts,
			'totalComments' => $totalComments,
			'totalCategories' => $totalCategories
		];

		return view('posts/ejercicio05', $data);
	}

	public function ejercicio06() //Andrea
	{
		$db = \Config\Database::connect();

		$postsPorCategoria = $db->query('select p.*, c.category as ccategory, count(*) as ppc from categories as c join posts as p on p.category = c.id group by category order by category')->getResultArray();

		$postsPorAutor = $db->query('select p.*, c.category as ccategory, count(*) as ppa from categories as c join posts as p on p.category = c.id group by category order by category')->getResultArray();

		$data = [
			'postsPorCategoria' => $postsPorCategoria,
			'postsPorAutor' 	=> $postsPorAutor
		];

		return view('posts/ejercicio06', $data);
	}

	// 7. 
	public function ejercicio07() //Andrea
	{
		$db = \Config\Database::connect();

		$postsEscritosPorMujeres2022 = $db->query('select p.*, count(*) as pepm22, u.*, ui.* from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id where ui.gender = "f" and p.created_at between "2022/01/01" and "2022/12/31"')->getResultArray();

		$postsEscritosPorMujeres2023 = $db->query('select p.*, count(*) as pepm23, u.*, ui.* from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id where ui.gender = "f" and p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

		$postsEscritosPorHombres2022 = $db->query('select p.*, count(*) as peph22, u.*, ui.* from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id where ui.gender = "m" and p.created_at between "2022/01/01" and "2022/12/31"')->getResultArray();

		$postsEscritosPorHombres2023 = $db->query('select p.*, count(*) as peph23, u.*, ui.* from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id where ui.gender = "m" and p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

		$data = [
			'postsEscritosPorMujeres2022'	=> $postsEscritosPorMujeres2022,
			'postsEscritosPorMujeres2023'	=> $postsEscritosPorMujeres2023,
			'postsEscritosPorHombres2022'	=> $postsEscritosPorHombres2022,
			'postsEscritosPorHombres2023'	=> $postsEscritosPorHombres2023,
		];

		return view('posts/ejercicio07', $data);
	}
	
	// 8. Mostrar una tabla con un resumen de las cantidades de posts escritos por categoría y otro resumen de posts escritos por autor. Resaltar con un color distinto el valor más alto y el más bajo en ambos resumenes.
	public function ejercicio08() //Humberto
	{
		$db = \Config\Database::connect();
		$postsCategoria = $db->query('select c.category categoria, count(*) numero
		from posts p join categories c on p.category = c.id
		group by c.category order by numero desc;')->getResultArray();

		$MayorCat = $db->query('select c.category categoria, count(*) numero
		from posts p join categories c on p.category = c.id
		group by c.category order by numero desc limit 1;')->getResultArray();

		$MenorCat = $db->query('select c.category categoria, count(*) numero
		from posts p join categories c on p.category = c.id
		group by c.category order by numero asc limit 1;')->getResultArray();

		$postsAutor = $db->query('select u.username, count(*) numero
		from users u join posts p on u.id = p.autor
		group by u.username order by numero desc;')->getResultArray();

		$menorAut = $db->query('select u.username, count(*) numero
		from users u join posts p on u.id = p.autor
		group by u.username order by numero asc limit 1;')->getResultArray();

		$mayorAut = $db->query('select u.username, count(*) numero
		from users u join posts p on u.id = p.autor
		group by u.username order by numero desc
		limit 1;')->getResultArray();

		$data = [
			'postsCategoria' => $postsCategoria,
			'mayorCat' => $MayorCat,
			'menorCat' => $MenorCat,
			'postsAutor' => $postsAutor,
			'mayorAut' => $mayorAut,
			'menorAut' => $menorAut,
		];

		return view('posts/ejercicio08', $data);
	}

	// 9. En una tabla, mostrar el título del post, contenido del post y el nombre de la categoria de todos los usuarios cuyo perfil sea administrador.
	public function ejercicio09() //Humberto
	{
		$db = \Config\Database::connect();
		$posts = $db->query('select p.title, p.content, c.category, pr.profile
		from categories c
				 join
			 posts p on c.id = p.category
				 join users u on p.autor = u.id
				 join profiles pr on u.profile = pr.id
		where pr.profile = "Admin";')->getResultArray();

		$data = [
			'posts' => $posts
		];

		return view('posts/ejercicio09', $data);

	}

	// 10. En una tabla, mostrar el último post escrito por cada mujer menor de 30 años y el primer post escrito por cada hombre mayor de 16 años.
	public function ejercicio10() //Humberto
	{
		$db = \Config\Database::connect();
		$postM = $db->query('SELECT subq.title, subq.content, subq.autor, u.profile, ui.gender
		FROM (
		  SELECT p.autor, MAX(p.title) AS title, MAX(p.content) AS content, MAX(p.created_at) AS created_at
		  FROM posts AS p
		  WHERE EXISTS (
			SELECT 1
			FROM userinfo AS ui
			WHERE p.autor = ui.id AND ui.gender = "F"
			  AND YEAR(CURDATE()) - YEAR(ui.birthday) < 30
		  )
		  GROUP BY p.autor
		) AS subq
		JOIN users AS u ON subq.autor = u.id
		JOIN userinfo AS ui ON subq.autor = ui.id
		ORDER BY subq.created_at DESC;')->getResultArray();

		$postH = $db->query('SELECT subq.title, subq.content, subq.autor, u.profile, ui.gender
			FROM (
			  SELECT p.autor, MAX(p.title) AS title, MAX(p.content) AS content, MAX(p.created_at) AS created_at
			  FROM posts AS p
			  WHERE EXISTS (
				SELECT 1
				FROM userinfo AS ui
				WHERE p.autor = ui.id AND ui.gender = "M"
				  AND YEAR(CURDATE()) - YEAR(ui.birthday) > 16
			  )
			  GROUP BY p.autor
			) AS subq
			JOIN users AS u ON subq.autor = u.id
			JOIN userinfo AS ui ON subq.autor = ui.id
			ORDER BY subq.created_at ASC;')->getResultArray();

		$data = [
			'postsM' => $postM,
			'postsH' => $postH
		];

		return view('posts/ejercicio10', $data);

	}
}