$(function () {
    setInterval(function(){
        $('.basket .filter-properties-list').each(function(){
            if( !($(this).closest('.item-additional-information-container').length > 0) ){
                let parent = $(this).closest('.basket-item-container').find('.item-additional-information-container');
                if( parent.length > 0 ){
                    $(this).insertAfter(parent.find('.item-additional-information'));
                }
            }
        });
    }, 500);
});