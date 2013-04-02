$(document).ready(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div'
    });

    $('#frm-nestedSortableControl-form').on('submit',function(e){
		var hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
		$('#frm-nestedSortableControl-form input[type="hidden"]').val(JSON.stringify(hiered));
    });

});