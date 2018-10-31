<?php

include_once ROOT.'\models\News.php';

	class NewsController
	{

		public function actionIndex()
		{
			$newsList = array();

			$newsList = News::getNewsList();

			echo '<pre>';
			print_r($newsList);
			echo '</pre>';
		}

		public function actionView($arguments)
		{
			$newsList = News::getNewsItemByID($id);

			echo '<pre>';
			print_r($newsList);
			echo '</pre>';	
		}
	}