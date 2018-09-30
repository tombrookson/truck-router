App = {
	init: function(){
		$('.setup-submit').click(function(e){
			$('.setup-submit').addClass('disabled');
			e.preventDefault();
			App.Depots.createAmount($('.depot-count').val());
		});

		$(".select-depots").select2();


		$('.find-distance').submit(function(e){
			$('.find-submit').addClass('disabled');
			e.preventDefault();
			$('.shortestPath').html();
			App.Depots.findShortPath(
				$('.select-depots[name="from"]').val(),
				$('.select-depots[name="to"]').val()
			);
		});
	}
};

App.Depots = {
	createAmount: function(amount){
		$.ajax({
			url: '/create-depots.php?amount='+amount,
			success: function(){
				App.Links.createAll();
			}
		});
	},

	findShortPath: function(from, to){
		$.ajax({
			url: '/find-distance.php?from='+from+'&to='+to,
			success: function(e){
				console.log(e);
				$('.shortestPath').html(e);
				$('.find-submit').removeClass('disabled');
			}
		});
	}
};

App.Links = {
	createAll: function(){
		$.ajax({
			url: '/create-links.php',
			success: function(){
				$('.setup-submit').removeClass('disabled');
				document.location = '/';
			}
		});
	}
};