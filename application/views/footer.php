




<script src="https://code.jquery.com/jquery-3.2.1.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<hr />
<footer class="text-center">
	<p>© <?php echo date('Y') ?> truecodex.com</p>
</footer>


<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<script>
	
	$(function() {
		
		/*--first time load--*/
		ajaxlist(page_url=false);
		
		/*-- Search keyword--*/
		$(document).on('click', "#searchBtn", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		
		/*-- Reset Search--*/
		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		
		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});
		
		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_key").val();
			
			var dataString = 'search_key=' + search_key;
			var base_url = '<?php echo site_url('products/index_ajax/') ?>';
			
			if(page_url == false) {
				var page_url = base_url;
			}
			
			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					console.log(response);
					$("#ajaxContent").html(response);
				}
			});
		}
	});
	</script>
  </body>
</html>
