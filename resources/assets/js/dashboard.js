var config = window.config = {};

config.ResponsiveBootstrapToolkitVisibilityDivs = {
    'xs': $('<div class="device-xs 				  hidden-sm-up"></div>'),
    'sm': $('<div class="device-sm hidden-xs-down hidden-md-up"></div>'),
    'md': $('<div class="device-md hidden-sm-down hidden-lg-up"></div>'),
    'lg': $('<div class="device-lg hidden-md-down hidden-xl-up"></div>'),
    'xl': $('<div class="device-xl hidden-lg-down			  "></div>')
};

/***********************************************
 *        Animation Settings
 ***********************************************/
function animate(options) {
    var animationName = "animated " + options.name;
    var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
    $(options.selector)
        .addClass(animationName)
        .one(animationEnd,
            function(){
                $(this).removeClass(animationName);
            }
        );
}

$(function() {
    var $itemActions = $(".item-actions-dropdown");

    $(document).on('click',function(e) {
        if (!$(e.target).closest('.item-actions-dropdown').length) {
            $itemActions.removeClass('active');
        }
    });

    $('.item-actions-toggle-btn').on('click',function(e){
        e.preventDefault();

        var $thisActionList = $(this).closest('.item-actions-dropdown');

        $itemActions.not($thisActionList).removeClass('active');

        $thisActionList.toggleClass('active');
    });
});

/***********************************************
 *        NProgress Settings
 ***********************************************/
var npSettings = {
    easing: 'ease',
    speed: 500
};

NProgress.configure(npSettings);
$(function() {
    setSameHeights();

    var resizeTimer;

    $(window).resize(function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(setSameHeights, 150);
    });
});


function setSameHeights($container) {

    $container = $container || $('.sameheight-container');

    var viewport = ResponsiveBootstrapToolkit.current();

    $container.each(function() {

        var $items = $(this).find(".sameheight-item");

        // Get max height of items in container
        var maxHeight = 0;

        $items.each(function() {
            $(this).css({height: 'auto'});
            maxHeight = Math.max(maxHeight, $(this).innerHeight());
        });


        // Set heights of items
        $items.each(function() {
            // Ignored viewports for item
            var excludedStr = $(this).data('exclude') || '';
            var excluded = excludedStr.split(',');

            // Set height of element if it's not excluded on
            if (excluded.indexOf(viewport) === -1) {
                $(this).innerHeight(maxHeight);
            }
        });
    });
}


$(function () {

    $('#sidebar-menu, #customize-menu').metisMenu({
        activeClass: 'open'
    });


    $('#sidebar-collapse-btn').on('click', function(event){
        event.preventDefault();

        $("#app").toggleClass("sidebar-open");
    });

    $("#sidebar-overlay").on('click', function() {
        $("#app").removeClass("sidebar-open");
    });

});
$(function() {
    $('.nav-profile > li > a').on('click', function() {
        var $el = $(this).next();

        animate({
            name: 'flipInX',
            selector: $el
        });
    });
});


$(function() {

    $("body").addClass("loaded");

});


/***********************************************
 *        NProgress Settings
 ***********************************************/

// start load bar
NProgress.start();

// end loading bar
NProgress.done();