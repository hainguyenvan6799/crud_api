<?php 
	$url = "http://localhost:88/CongNgheMoi/API/api_test.php/user/getAllUser";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	$result = (json_decode($response));

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<table border="1px solid black;">
 		<tr>
 			<th>Ho</th>
 			<th>Ten</th>
 			<th>Lop</th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>
 		<?php foreach($result as $r){ ?>
 			<tr>
 				<td><?php echo $r->ho; ?></td>
 				<td><?php echo $r->ten; ?></td>
 				<td><?php echo $r->lop; ?></td>
 				<td><button class="edit-button" button-edit-id="<?php echo $r->id; ?>">Edit</button></td>
 				<td><button class="delete-button" button-delete-id="<?php echo $r->id; ?>">Delete</button></td>
 			</tr>
 		<?php } ?>
 	</table>

 	<div id="result">

 	</div>
 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('.edit-button').on('click', function(){
 			var id = $(this).attr("button-edit-id");
 			var ho = prompt("Nhap ho");
 			var ten = prompt("Nhap ten");
 			var lop = prompt("Nhap lop");
 			
 	 			$.ajax({
 				url: "updateData.php",
 				method:"POST",
 				data: {id:id, ho:ho, ten:ten, lop:lop },
 				success: function(data){
 					$('#result').html(data);
 				}
 			});
 		});

 		$('.delete-button').on('click', function(){
 			var id = $(this).attr('button-delete-id');

 			$.ajax({
 				url: "deleteData.php",
 				method: "POST",
 				data: {id:id},
 				success: function(data){
 					$('#result').html(data);
 				}
 			});
 		});
 	});
 </script>
 </html>