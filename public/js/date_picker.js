$(function(){


    var daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
	var monthNames = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];

    var date_picker = $('.date_picker');
	if (date_picker.length > 0) {
		date_picker.daterangepicker({
		    // singleDatePicker: true,
		    autoUpdateInput: false,
		    autoApply: true,
		    timePicker: true,
		    locale: {
		        format: 'YYYY-MM-DD HH:mm:ss',
		        applyLabel: "Aplicar",
		        cancelLabel: "Cancelar",
		        fromLabel: "De",
		        toLabel: "Até",
		        daysOfWeek: daysOfWeek,
		        monthNames: monthNames,
		    },
		    timePickerIncrement: 5,
		    timePicker24Hour: true,
		    buttonClasses: ['btn', 'btn-sm'],
		    cancelClass: 'btn-danger',
		    applyClass: 'btn-primary',
		});

		btnApply(date_picker);
		btnCancel(date_picker);
    }
    
    function btnApply(date)
	{
		date.on('apply.daterangepicker', function(ev, picker) {
			date.val(
				picker.startDate.format('YYYY-MM-DD HH:mm:ss')
				+' - '+
				picker.endDate.format('YYYY-MM-DD HH:mm:ss')
			);
		});
	}
	function btnCancel(date)
	{
		date.on('cancel.daterangepicker', function(ev, picker) {
		  date.val('');
		});
	}
    

});