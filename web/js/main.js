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

    var tooltip = $('.tooltip');
    var tooltipButton = tooltip.find('.tooltip-call');
    var tooltipContent = tooltip.find('.tooltip-content');

    // Open/close tooltip
    function handleToggleTooltipContent(e) {
        var btn = $(this);
        var currentTipContent = btn.next();

        e.preventDefault();

        tooltipContent.not(currentTipContent).removeClass('show');

        ( currentTipContent.hasClass('show') )
                    ? currentTipContent.removeClass('show')
                    : currentTipContent.addClass('show');
    };

    tooltipButton.on('click', handleToggleTooltipContent);


    //Close tooltip click body
    $('body').on('click', function(e) {

        if ( !( $(e.target).parents().is(tooltip)) ) {
            tooltipButton.next().removeClass('show')
        }
    });

})();

//# sourceMappingURL=main.js.map
