(function() {

    var wWaves = $('.alert-waves'),
        wInput = wWaves.find('.waves-input'),
        wBtn = wWaves.find('.waves-btn'),
        wOvwerlay = $('.waves-overlay');

    var wTip = wWaves.find('.waves-tip');

    if (sessionStorage.getItem('addressWaves') === 'true' ) { 
        wWaves.hide();
        wOvwerlay.addClass('hide');
    }

    else {
        function handleEnterWaves() {

            if ( wInput.val() ) {
                sessionStorage.setItem('addressWaves', 'true');
                wTip.removeClass('show');
                wWaves.hide();
                wOvwerlay.addClass('hide');
            }

            else {
                wTip.addClass('show');
            }
        }

        wBtn.on('click', handleEnterWaves);
    }

})();
//# sourceMappingURL=wave-auth.js.map
