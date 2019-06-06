$(function () {
    setInterval(function(){
        $('.basket .filter-properties-list').each(function(){
            if( !($(this).closest('.meta-container').length > 0) ){
                let parent = $(this).closest('.basket-item-container').find('.meta-container');
                if( parent.length > 0 ){
                    $(this).insertAfter(parent.find('> div > div:last-child'));
                }
            }
        });
    }, 500);
});