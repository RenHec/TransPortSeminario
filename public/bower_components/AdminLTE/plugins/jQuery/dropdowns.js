	$("#departament_id").change(function(event){
			$.get("/"+event.target.value,function(response,departamento){
				$("#municipality_id").empty();
				for(i=0; i<response.length; i++){
					$("#municipality_id").append("<option value='"+response[i].id+"'> "+response[i].name+" </option>");
				}
			});
	});

