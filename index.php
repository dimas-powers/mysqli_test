<html>
	<head>
		<title>тестовое задание</title>
		<style>
			form{border: 4px double black; width:40%;}
			.chek_text{display: flex; flex-direction: row;justify-content: flex-start;}
			.chek_text input {margin: auto 10px;}
			.info{display: none;}
		</style>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>
		function get_info() {
 	  		var msg = $('#form_send').serialize();
        		$.ajax({
					type: 'POST',
					url: '/search.php',
					data: msg,
          			success: function(data) {
						$('.info').css({"display":"block"});
						$('#form_send').css({"display":"none"});
						// $('#results').html(data);
						if (data != 'null') {
							var a = $.parseJSON(data);
							$.each(a, function(i, val) {
								$('.company').html(val.company);
								$('.name_customer').html(val.name_customer);
								$('.number').html(val.number);
								$('.date_sign').html(val.date_sign);
								$('.services_name').html(val.title_service);
							});
						} else {
							alert('User does not exist');
							$('.info').css({"display":"none"});
							$('#form_send').css({"display":"block"});
						}
					},
					error:  function(xhr, str){
						alert('Возникла ошибка: ' + xhr.responseCode);
					}
				});
    	}
		</script>
	</head>
	<body>
		<table class="info">
			<tr>
 				<td colspan=2><b>информация про клиента</b></td>
 			</tr>
 			<tr>
 				<td >название клиента</td>
				<td class="name_customer">[name_customer]</td>
 			</tr>
 			<tr>
 				<td >компания</td>
 				<td class="company">[company]</td>
 			</tr>
 			<tr>
 				<td colspan=2><b>информация про договор</b></td>
 			</tr>
			<tr>
 				<td >номер договора</td>
 				<td class="number">[number]</td>
 			</tr>
 			<tr>
 				<td >дата подписания</td>
 				<td class="date_sign">[date_sign]</td>
 			</tr>
 			<tr>
 				<td colspan=2><b>информация про сервисы</b></td>
 			</tr>
 			<tr>
 				<td class="services_name">[services_name]</td>
			</tr>
		</table>
		<form action="javascript:void(null);" method="post" id="form_send" onsubmit="get_info()">
			<div class="checkbox">
				<div class="chek_text">
					<input type="checkbox" id="checked_1" name="check1">
					<p>work</p>
				</div>
				<div class="chek_text">
					<input type="checkbox" id="checked_2" name="check2">
					<p>connecting</p>
				</div>
				<div class="chek_text">
					<input type="checkbox" id="checked_3" name="check3">
					<p>disconnected</p>
				</div>
			</div>
			<input id="search" type="text" name="search">
			<input value="Send" type="submit">
		</form>
		<div id="results"></div>
	</body>
</html>