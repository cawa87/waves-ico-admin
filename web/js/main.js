'use strict';


// Dropdown

;(function() {

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

;(function() {

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


// Edit Waves address (page address)

;(function() {

    var wAction = $('.waves-action'),
        wView = wAction.find('.waves-address'),
        wForm = wAction.find('.waves-address-form'),
        wInput = wForm.find('.waves-input');

    // Buttons
    var btnEdit = $('.panel-address .btn-edit');
    var btnDone = $('.panel-address .btn-done');

    // Trans
    var transEdit = ( $('.select-lang').text().trim() === 'English' )
                                        ? 'Edit'
                                        : 'Изменить';

    var transCancel = ( $('.select-lang').text().trim() === 'English' ) 
                                        ? 'Cancel'
                                        : 'Отмена';


    function handleShowEditInput() {
        wAction.toggleClass('process');

        wView.toggle();
        wForm.toggle().find('.input').focus().select();

        ( wAction.hasClass('process') )
                ? $(this).text(transCancel)
                : $(this).text(transEdit);

        ( wAction.hasClass('process') )
                ? btnDone.show()
                : btnDone.hide();
    };


    function handleEditAddresWaves() {
        var url = Routing.generate('attach_user_address');
        var formSerialize = wForm.find('form').serialize();

        $.post(url, formSerialize, function(response) {

            wAction.removeClass('process');
            btnEdit.text(transEdit);
            btnDone.hide();
            wView.text( wForm.find('.input').val() );
            wForm.hide();
            wView.show();


        }, 'JSON');
    };

    btnEdit.on('click', handleShowEditInput);
    btnDone.on('click', handleEditAddresWaves);

})();


// Settings page

;(function() {

    var panelSettings = $('.panel-settings');
    // var linkEdit = panelSettings.find('.link-edit');
    // var linkCancel = panelSettings.find('.link-cancel');
    var btnEdit = panelSettings.find('.btn-edit');

    $('.link-edit').on('click', function(e) {
        e.preventDefault();
        panelSettings.find('.setline-pass').hide();
        panelSettings.find('.setline-edit-pass').show();
    })

    $('.link-cancel').on('click', function(e) {
        e.preventDefault();
        panelSettings.find('.setline-pass').show();
        panelSettings.find('.setline-edit-pass').hide();
    })

})();

//# sourceMappingURL=main.js.map
