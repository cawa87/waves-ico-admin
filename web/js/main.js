'use strict';


// Dropdown

(function() {

    var dropdownBlock = $('.dropdown-block');
    var dropdownButton = dropdownBlock.find('[data-toggle="dropdown"]');
    var dropdownMenu = dropdownBlock.find('[data-toggle="dropdown-menu"]');

    // Open/close dropdown
    function handleToggleDropdown(e) {
        var btn = $(this);
        var currentDropMenu = btn.next();

        e.preventDefault();

        dropdownMenu.not(currentDropMenu).removeClass('active');

        ( currentDropMenu.hasClass('active') )
                    ? currentDropMenu.removeClass('active')
                    : currentDropMenu.addClass('active');
    };

    dropdownButton.on('click', handleToggleDropdown);

    // Close dropdown click body
    $('body').on('click', function(e) {

        if ( !( $(e.target).parents().is(dropdownBlock)) ) {
            dropdownButton.next().removeClass('active')
        }
    });

})();



// Tooltip

(function() {

    var tipAction = $('.tip-bonus'),
        tipDesc = $('.tip-bonus-desc');

    // Show/Hide tip
    tipAction.on('click', function() {
        tipDesc.toggleClass('show');
    });

    // Close tip click body
    $('body').on('click', function(e) {

        if ( !( $(e.target).is(tipDesc) )  && !( $(e.target).is(tipAction) )) {
            tipDesc.removeClass('show');
        }
    });


})();

//# sourceMappingURL=main.js.map
