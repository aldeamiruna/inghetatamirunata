<?php

		function count_categories($category_id, $conn) {
				$sql = "SELECT COUNT(category_id) AS categories FROM recipes WHERE category_id = " . $category_id . ";";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				return $row['categories'];
		}

		function print_categories() {
			$dbServerName = "localhost";
			$dbUserName = "root";
			$dbPassword = "";
			$dbName = "inghetatamirunata";

			$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

				$sqlCategories = "SELECT * FROM categories LIMIT 7;";
				$categories = $conn->query($sqlCategories);

				while($categoriesRow = $categories -> fetch_assoc()){
					$no_categories = count_categories($categoriesRow['category_id'], $conn);
					echo "<li><a href =\"recipes.php?category_id=" . $categoriesRow['category_id'] . " \"> " . $categoriesRow['category_name'] . "<span>( " . $no_categories . " )</span></a></li>";


				}
		}

?>
