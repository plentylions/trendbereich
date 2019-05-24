$(function () {
    $('.basket .filter-properties-list').each(function(){
        let parent = $(this).closest('.basket-item-container').find('.item-additional-information-container .item-additional-information');
        if( parent.length > 0 ){
            $(this).appendTo(parent);
            $(this).show();
        }
    });
});