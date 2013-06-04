$(document).ready(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div'
    });

    $('.nested-sortable-control-form').on('submit',function(e){
		var hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
		$('.nested-sortable-control-form input[type="hidden"]').val(JSON.stringify(hiered));
    });

});