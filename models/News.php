<?php

class News
{
	public static function getNewsItemByID($id)
	{
		$id = intval($id);

		if($id)
		{
			$host = 'localhost';
			$dbname = 'mvc_site';
			$user = 'root';
			$password = '';

			$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

			$result = $db->query('SELECT * FROM news WHERE id='.$id);

			$newsItem = $result->fetch();

			return $newsItem;
		}
	}

	public static function getNewsList()
	{
		$host = 'localhost';
		$dbname = 'mvc_site';
		$user = 'root';
		$password = '';

		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

		$newsList = array();

		$result = $db->query('SELECT id, title, data, short_content FROM news ORDER BY data DESC LIMIT 10');

		$i = 0;

		while($row = $result->fetch())
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['data'] = $row['data'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
		}

		return $newsList;
	}
}