/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	
	$('.datables').DataTable({
		"order": false,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
		}
	});
	
	$('#datable_1').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
		}
	});
    $('#datable_2').DataTable({ "lengthChange": false});
} );