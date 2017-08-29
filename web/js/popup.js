// Popups

(function(){
    var ppOpen = $('.open-popup'),
        popup = $('.popup'),
        ppOverlay = $('.popup-overlay'),
        ppBtnClose = $('.popup-close'),
        body = $('body');


    // Ширина полосы прокрутки
    var measureWidthScroll = function () {
        var scrollWidth, div;

        div = document.createElement('div');

        div.style.overflowY = 'scroll';
        div.style.width = '50px';
        div.style.height = '50px';
        div.style.visibility = 'hidden';

        document.body.appendChild(div);
        scrollWidth = div.offsetWidth - div.clientWidth;
        document.body.removeChild(div);

        return scrollWidth;
    }

    // Open popup
    function handleOpenPopup(e) {
        e.preventDefault();
        var ppOpenName = $(this).data('name');

        popup.each(function(index, el) {
            if ( $(el).data('name') === ppOpenName && !($(el).hasClass('visible')) ) {
                
                $(el).addClass('visible');
                $(el).parent().addClass('visible');
                body.addClass('no-scroll')
                        .css('margin-right', measureWidthScroll() + 'px');
            }
        })
    };

    // Close popup (overlay)
    function handleClosePopup(e) {
        var el= $(e.target);

        if ( el.is(this) && $(this).hasClass('visible') ) {
            $(this).removeClass('visible');
            $(this).find('.popup').removeClass('visible');
            body.removeClass('no-scroll').css('margin-right', '');
        }
    }

    // Close popup (btn close)
    function handleClosePopupOnBtn() {
        var firstParent = $(this).parent();
        var secondParent = $(this).closest(ppOverlay);

        if ( firstParent.hasClass('visible') && secondParent.hasClass('visible') ) {
            firstParent.removeClass('visible');
            secondParent.removeClass('visible');
            body.removeClass('no-scroll').css('margin-right', '');
        }
    }

    ppOpen.each(function() {
        $(this).on('click', handleOpenPopup);
    })

    ppOverlay.each(function() {
        $(this).on('click', handleClosePopup);
    })

    ppBtnClose.each(function() {
        $(this).on('click', handleClosePopupOnBtn);
    })

})();
//# sourceMappingURL=popup.js.map
