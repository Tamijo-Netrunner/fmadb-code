<html>

<head>
	<?php

	//Setup header bar and css layout
	include "head.html";
	include "Skip_links.html";
	include "header.html";


?>

</head>

<body>
<!-- Creates the main layout of the page -->
<div id="main" class="main" role="main">

<?php include "searchControls.php"; ?>

	<!--Creates the search information box for number of results and prints the appropriate information-->
	<div class="search-info">
		<p style="text-align:left">Your search returned <strong><?php echo mysqli_affected_rows($connection);?> cards</strong></p>		
	</div>

	<!--Sets up the main body/layout of the image-style results page-->
	<div class="card-grid">
		<div class="card-grid-inner">
			<?php

				//Sets up variables for the results
				$result2 = mysqli_query($connection, $sql_statement2);
				while ($row = mysqli_fetch_assoc($result2))
				{
					$cardCode = $row['Card_code'];
					$cardPack = $row['Pack'];
					$cardNumber = $row['Code'];
					$cardName = $row['Name'];
					$cardFaction = $row['Faction'];
					$cardType = $row['Card_type'];
					$cardRarity = $row['Rarity'];
					$cardImagePath = "https://f000.backblazeb2.com/file/FullmetalAlchemist-Database/FMA".$cardNumber.".jpg";
			?>
			<!--Displays those results-->
			<div class ="card-grid-item" data-card-id="<?php echo $cardCode ?>">
				<a class="card-grid-item-card" href="/card.php?Card_code=<?php echo $cardCode ?>">
					<span class="card-grid-item-invisible-label" aria-hidden="true"><?php echo $cardName ?></span>
					<div class="card-grid-item-front">
						<img class="card war border-black" alt="<?php echo $cardName ?>" title="<?php echo $cardName ?>" src="<?php echo $cardImagePath ?>">
					</div>
				</a>
			</div>

			<?php
				//Closes the while loop!
				}
			?>
		</div>
	</div>
	<div data-component="search-controls" class="search-controls">
		<div class="search-controls-inner">
			<div class="search-controls-display-options">
				<label for="as">Show as</label>
				<select name="as" id="as" title="Change how cards are displayed" class="select-n">
					<option value="imageSearch">Images</option>
					<option value="checklistSearch">Checklist</option>
				</select>
			</div>
			<div class="search-controls-pagination">
				<?php echo $paginationDisplay; ?>
			</div>
		</div>
	</div>
</div>


</body>

<?php
		//Sets the bottom bar
		include "footer.html";
		include "left_tray.html";
?>

</html>