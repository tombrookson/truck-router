<?php
    require $_SERVER["DOCUMENT_ROOT"] . "/Lib/startup.php";

	use TruckRouter\DataModels\Depot;
	use TruckRouter\DataModels\Link;
?>
<!DOCTYPE html>
<html>
<?php include "includes/header.php"; ?>
<body>
    <nav class="header">
        <div class="wrapper">
            <div class="app-name">TruckRouter</div>
			<?php if(Depot::count()): ?>
				<a class="app-button-default app-reset" href="/reset.php">Reset App</a>
			<?php endif; ?>
            <div class="clear"></div>
        </div>
    </nav>

	<div class="main">
		<h1>Welcome</h1>
		<?php if(!Depot::count()): ?>
			<p class="info">
				Enter the amount of depots in the network
			</p>
			<form method="get" class="setup-app" action="/">
				<input type="number" min="0" class="depot-count" name="amount" value="100" />
				<input type="submit" class="app-button-default setup-submit" value="Submit" />
				<div class="clear"></div>
			</form>
		<?php else: ?>
			<p class="info">
				Select two depots to find the distance between them
			</p>
			<form method="get" class="find-distance" action="/find-distance.php">
				<select name="from" class="select-depots">
					<option value="">Select From...</option>
					<?php foreach(Depot::all() as $depot): ?>
						<option value="<?=$depot['id']?>"><?=$depot['name']?></option>
					<?php endforeach; ?>
				</select>
				<select name="to" class="select-depots">
					<option value="">Select To...</option>
					<?php foreach(Depot::all() as $depot): ?>
						<option value="<?=$depot['id']?>"><?=$depot['name']?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" class="app-button-default find-submit" value="Submit" />
				<div class="clear"></div>
				<div class="shortestPathTitle">Best Route:</div>
				<div class="shortestPath"></div>
				<div class="clear"></div>
			</form>
		<?php endif; ?>
	</div>

	<div class="footer">
		<div class="wrapper">
			<div class="entity-count">
				<div class="depot-count">
					<span class="count-label">Depots:</span> <?php echo Depot::count() ?: 0; ?>
				</div>
				<div class="link-count">
					<span class="count-label">Links:</span> <?php echo Link::count() ?: 0; ?>
				</div>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function(){
		App.init();
	});
</script>
</body>
</html>