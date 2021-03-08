

<html>

<body>
<!-- Creates the main layout of the page -->
<div id="main" class="main" role="main">

	<!-- Search display and page controls -->
<!--
	<div data-component="search-controls" class="search-controls">
		<div class="search-controls-inner">
			<div class="search-controls-display-options">
				<label for="unique" class="vh">Show</label> 
				<select name="unique" id="unique" title="Change how cards are found" class="select-n">
					<option selected="selected" value="cards">Cards</option> 
					<option value="prints">All prints</option> 
					<option value="art">Unique art</option>
				</select> 
				<label for="as">as</label> 
				<select name="as" id="as" title="Change how cards are displayed" class="select-n">
					<option selected="selected" value="grid">Images</option> 
					<option value="checklist">Checklist</option> 
					<option value="text">Text Only</option> 
					<option value="full">Full</option>
				</select> 
				<label for="order">sorted by</label> 
				<select name="order" id="order" title="Change how cards are sorted" class="select-n">
					<option selected="selected" value="name">Name</option> 
					<option value="date">Release Date</option> 
					<option value="pack">Set/Number</option>
					<option value="rarity">Rarity</option> 
					<option value="faction">Faction</option> 
					<option value="cost">Cost</option> 
					<option value="strength">Strength</option> 
					<option value="wits">Wits</option> 
					<option value="alchemy">Alchemy</option> 
				</select> 
				<label title="Sort direction" for="dir">:</label> 
				<select name="dir" id="dir" title="Change sort direction, ascending or descending" class="select-n">
					<option value="">Auto</option> 
					<option value="asc">Asc</option> 
					<option value="desc">Desc</option>
				</select>
			</div> 
			<div class="search-controls-pagination">
				<span aria-hidden="true" class="button-n disabled icon-only">
					<svg width="30" height="30" viewBox="0 0 30 30" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 4.438l-1.375-1.438-12.625 12 12.563 12 1.437-1.406-11.094-10.594 11.094-10.562zm12 0l-1.375-1.438-12.625 12 12.563 12 1.437-1.406-11.094-10.594 11.094-10.562zM2 3h-1.66v24h1.66z"></path>
					</svg> 
					<b class="vh">First Page</b>
				</span> 
				<span aria-hidden="true" class="button-n disabled">
					<svg width="30" height="30" viewBox="0 0 30 30" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
						<path d="M20.625 3l-12.625 12 12.563 12 1.437-1.406-11.094-10.594 11.094-10.562z"></path>
					</svg>
					<b>Previous</b>
				</span> 
				<a data-track="{&quot;category&quot;:&quot;Search Controls&quot;,&quot;action&quot;:&quot;Paginate&quot;,&quot;label&quot;:&quot;Next&quot;}" href="/search?as=grid&amp;order=name&amp;page=2&amp;q=color%3DW&amp;unique=cards" class="button-n">
					<b>Next 60</b> 
					<svg width="30" height="30" viewBox="0 0 30 30" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.375 3l12.625 12-12.562 12-1.438-1.406 11.094-10.594-11.094-10.562z"></path>
					</svg>
				</a> 
				<a data-track="{&quot;category&quot;:&quot;Search Controls&quot;,&quot;action&quot;:&quot;Paginate&quot;,&quot;label&quot;:&quot;Last&quot;}" href="/search?as=grid&amp;order=name&amp;page=55&amp;q=color%3DW&amp;unique=cards" class="button-n icon-only">
					<svg width="30" height="30" viewBox="0 0 30 30" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 4.438l1.375-1.438 12.625 12-12.563 12-1.437-1.406 11.094-10.594-11.094-10.562zm-12 0l1.375-1.438 12.625 12-12.563 12-1.437-1.406 11.094-10.594-11.094-10.562zM28 3h1.66v24h-1.66z"></path>
					</svg> 
					<b class="vh">Last Page</b>
				</a>
			</div>
		</div>
	</div>
-->
	
<?php
?>	

	<!--Creates the search information box for number of results and prints the appropriate information-->
	<div class="search-info">
		<p>Your search returned <strong><?php echo mysqli_affected_rows($connection);?> cards</strong></p>
	</div>

	<!--Checks the display type and calls the results output for that format-->

<?php
	include $as.".php";

}

//Sets up the exception if the connection to the database fails for any reason
//else {echo "Error: ".$sql_statement."<br>".mysqli_error($connection);}

//If there are no results for any reason, displays a message stating so
else {
?>
	<div class="search-info">
		<p>Your search returned 0 results.</p>
	</div>
</div>

<?php
}
?>

</body>

<?php
		//Sets the bottom bar
		include "footer.html";
//		include "left_tray.html";
		
?>


</html>