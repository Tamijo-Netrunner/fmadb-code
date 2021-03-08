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

	<!--Sets up the main body/layout of the checklist-style results page-->
	<div class="checklist-wrapper">
		<table class="checklist" id="js-checklist">
			
			<!--Sets up the titles for the results columns-->
			<thead>
				<tr>
					<th class="em13"><a href="/advanced_search2.php?as=checklist&amp;dir=asc&amp;order=set&amp;">Set</a></th>
					<th class="em6"><abbr title="Collector Number">№</abbr></th>
					<th class="W30"><a href="/advanced_search2.php?as=checklist&amp;dir=desc&amp;order=name&amp;">Name <span class="arrow">▲</span></a></th>
					<th class="em12"><a href="/advanced_search2.php?as=checklist&amp;dir=asc&amp;order=cmc&amp;">Faction</a></th>
					<th>Type</th>
					<th class="em10"><a href="/advanced_search2.php?as=checklist&amp;dir=asc&amp;order=rarity&amp;"><abbr title="Rarity">R</abbr></a></th>
				</tr>
			</thead>
			
			<tbody>


<?php
	
		
		$result2 = mysqli_query($connection, $sql_statement2);
		while ($row = mysqli_fetch_assoc($result2))
		{
			//Sets up variables for the results
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
				<tr data-component="card-tooltip" title="<?php echo $cardName ?>" data-card-image-front="<?php echo $cardImagePath ?>" data-card-id="<?php echo $cardCode ?>">
					<td data-th="Set">
						<a tabindex="-1" href="/card.php?Card_code=<?php echo $cardCode ?>">
							<abbr title="<?php echo $row['Name']; ?>"><?php echo $row['Pack']; ?></abbr>
						</a>
					</td>
					<td data-th="Code">
						<a tabindex="-1" href="/card.php?Card_code=<?php echo $cardCode ?>"><?php echo $row['Code']; ?></a>
					</td>
					<td data-th="Name" class="ellipsis">
						<a lang="en" href="/card.php?Card_code=<?php echo $cardCode ?>"><?php echo $row['Name']; if ($row['Subname'] != ""){echo ", ".$row['Subname'];}?></a>
					</td>
					<td data-th="Faction">
						<a tabindex="-1" href="/card.php?Card_code=<?php echo $cardCode ?>"><?php echo $row['Faction']; ?></a>
					</td>
					<td data-th="Card Type">
						<a tabindex="-1" lang="en" href="/card.php?Card_code=<?php echo $cardCode ?>"><?php echo $row['Card_type']; ?></a>
					</td> 
					<td data-th="Rarity">
						<a tabindex="-1" href="/card.php?Card_code=<?php echo $cardCode ?>">
							<abbr title="<?php echo $row['Rarity']; ?>"><?php echo $row['Rarity']; ?></abbr>
						</a>
					</td> 
				</tr>        
<?php
	//Closes the while loop!
	}
?>
			</tbody>	
		</table>
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

</html>
	
<!--Card tooltip code [incorrect] -->
<!-- 
<div id="card-tooltip" aria-hidden="true" style="display: flex;" data-card-id="" class>
	<img id="card-tooltip-img-front" class="card" src="<?php echo $cardImagePath ?>.jpg">
</div>
-->