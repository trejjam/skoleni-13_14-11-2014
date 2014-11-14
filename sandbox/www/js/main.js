$(function(){

	$('body').on('change', 'select[data-source]', function(){
		var source = $(this).data('source');
		var slave = $(this).data('slave');
		var selected = $(this).val();

		$.getJSON(source, {val: selected}, function(payload) {
			var $sel = $('#' + slave);
			$sel.empty();
			for (var id in payload) {
				$('<option>').attr('value', id).text(payload[id]).appendTo($sel);
			}
		})
	});
});
