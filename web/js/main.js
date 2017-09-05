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


// Timeline

;(function() {
    var ALL_DAY = 25; // всего дней
    var day = 1; // старт
    var $count = $('.left-day');
    var count = parseInt($count.text()); //temp
    var arr = []; // массив для объекта каждого временного блока

    // Временная шкала
    var bonusItem = $('.bonus-item .part-scale');

    // Конструктор объектов ItemBonus
    var ItemBonus = function(item, start, end) {
      this.item = item;
      this.dayStart = start;
      this.dayEnd = end;
    }

    // Создаем экземпляры и помещаем в массив
    for(var i = 0; i < bonusItem.length; i++) {
        arr.push(new ItemBonus($(bonusItem[i]), 1, $(bonusItem[i]).data('day')))
    }

    // Увеличение временной шкалы
    function getTimeLine(obj, day) {
          var qqq = (day - obj.dayStart) + obj.dayEnd;
          obj.item.css('width', ( qqq / obj.dayEnd )  * 100 + '%');
    }

    function fillWidth(array, index, obj) {
        for(var i = 0; i < index; i++) {
            array[i].item.css('width', '100%');
        }
    }

    // Поиск нужного временного блока
    function countingTime(day) {

        if ( day >= 1 && day <= 2 ) {
            arr[0].dayStart = 2;
            getTimeLine(arr[0], day);
        }

        if ( day >= 3 && day <= 5 ) {
            fillWidth(arr, 1, arr[1]);
            arr[1].dayStart = 5;
            getTimeLine(arr[1], day);
        }

        if ( day >= 6 && day <= 8 ) {
            fillWidth(arr, 2, arr[2]);
            arr[2].dayStart = 8;
            getTimeLine(arr[2], day);
        }

        if ( day >= 9 && day <= 12 ) {
            fillWidth(arr, 3, arr[3]);
            arr[3].dayStart = 12;
            getTimeLine(arr[3], day);
        }

        if ( day >= 13 && day <= 17 ) {
            fillWidth(arr, 4, arr[4]);
            arr[4].dayStart = 17;
            getTimeLine(arr[4], day);
        }

        if ( day >= 18 && day <= 25 ) {
            fillWidth(arr, 5, arr[5]);
            arr[5].dayStart = 25;
            getTimeLine(arr[5], day);
        }
    }


    // Event
    $count.on('click', function() {
      day = (ALL_DAY + 1) - count;
      countingTime(day);
    });

    $count.trigger('click');

})();

//# sourceMappingURL=main.js.map
