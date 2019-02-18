jQuery(function ($) {
    new WOW().init();
    $('.main-navigation').onePageNav({currentClass: 'active'});
    $('#counter').bind('inview', function (event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({Counter: 0}).animate({Counter: $this.text()}, {
                    duration: 2000, easing: 'swing', step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).unbind('inview');
        }
    });
    (function () {
        var bodyEl = document.body, content = document.querySelector('.contents'), openbtn = document.getElementById('open-button'), closebtn = document.getElementById('close-button'), isOpen = false;

        function init() {
            initEvents();
        }

        function initEvents() {
            openbtn.addEventListener('click', toggleMenu);
            if (closebtn) {
                closebtn.addEventListener('click', toggleMenu);
            }
            content.addEventListener('click', function (ev) {
                var target = ev.target;
                if (isOpen && target !== openbtn) {
                    toggleMenu();
                }
            });
        }

        function toggleMenu() {
            if (isOpen) {
                classie.remove(bodyEl, 'show-menu');
            }
            else {
                classie.add(bodyEl, 'show-menu');
            }
            isOpen = !isOpen;
        }

        init();
    })();
});