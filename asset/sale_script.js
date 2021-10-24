function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	 
	var cell0 = row.insertCell(0);
	var element0 = document.createElement("input");
	element0.type = "checkbox";
	element0.name="chkbox[]";
	cell0.appendChild(element0);
	
	var cell1 = row.insertCell(1);
	var element1 = document.createElement("input");
	element1.type = "text";
	element1.name = "exname[]";
	//element1.value = pname;
	//element1.setAttribute("readOnly", true);		
	element1.className = "form-control";	
	cell1.appendChild(element1);
	
	var cell2 = row.insertCell(2);
	var element2 = document.createElement("input");
	element2.type = "text";
	element2.name = "fmarks[]";
	//element2.value = pcode;	
	//element2.setAttribute("readOnly", true);
	element2.className = "form-control";
	//cell2.style.width = '50px';
	cell2.appendChild(element2);
	
	var cell4 = row.insertCell(3);
	var element4 = document.createElement("input");
	element4.type = "text";
	element4.name = "pmarks[]";

/*element4.onkeyup = function () {
		var thisval = this.value;
		var esprice = element6.value;
		var evat = element7.value;
		var ecom = element8.value;
		var totalvp = thisval*esprice;
		var totalFormate = parseFloat(totalvp).toFixed(2);
		element9.value = totalFormate;
		var tqty = $("input[name='pqty[]']").map(function(){	return $(this).val();}).get();
		var tamount = $("input[name='ptotal[]']").map(function(){	return $(this).val();}).get();
		totalval(tqty,tamount);
		
	};
	element4.onblur = function () {
		this.readOnly=true;
		this.className = 'extdinput';
	};*/
		
	element4.className = "form-control";
	cell4.style.width = '50px';
	cell4.appendChild(element4);
	
}

function deleteRow(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			
			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			
			
			}
		}
		catch(e) {
			alert(e);
		}
}
