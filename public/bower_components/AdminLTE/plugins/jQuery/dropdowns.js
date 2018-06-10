	$("#departament_id").change(function(event){
			$.get("/"+event.target.value,function(response,departamento){
				$("#municipality_id").empty();
				for(i=0; i<response.length; i++){
					$("#municipality_id").append("<option value='"+response[i].id+"'> "+response[i].name+" </option>");
				}
			});
	});

	$("#organitation_id").change(function(event){
			$.get("/employee/"+event.target.value,function(response,departamento){
				$("#employee_id").empty();
				for(i=0; i<response.length; i++){
					$("#employee_id").append("<option value='"+response[i].id+"'> "+response[i].first_name+" "+response[i].second_name+" "+response[i].first_last_name+" "+response[i].second_last_name+" </option>");
				}
			});
	});

	$("#organitation_id").change(function(event){
			$.get("/rol/"+event.target.value,function(response,departamento){
				$("#rol_id").empty();
				for(i=0; i<response.length; i++){
					$("#rol_id").append("<option value='"+response[i].id+"'> "+response[i].name+" </option>");
				}
			});
	});	

	$("#category_id").change(function(event){
			$.get("/machinary/"+event.target.value,function(response,departamento){
				$("#machinery_id").empty();
				for(i=0; i<response.length; i++){
					$("#machinery_id").append("<option value='"+response[i].id+"'> "+response[i].name+" </option>");
				}
			});
	});				
