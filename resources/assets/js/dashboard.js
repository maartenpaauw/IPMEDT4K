require('./bootstrap');

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

/***********************************************
 *        Menu Settings
 ***********************************************/
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

/***********************************************
 *        SideMenu Settings
 ***********************************************/
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
 *        ParsleyMessages
 ***********************************************/
$(function () {

    Parsley.addMessages('nl', {
        defaultMessage: "Deze waarde lijkt onjuist.",
        type: {
            email:        "Dit lijkt geen geldig e-mail adres te zijn.",
            url:          "Dit lijkt geen geldige URL te zijn.",
            number:       "Deze waarde moet een nummer zijn.",
            integer:      "Deze waarde moet een nummer zijn.",
            digits:       "Deze waarde moet numeriek zijn.",
            alphanum:     "Deze waarde moet alfanumeriek zijn."
        },
        notblank:       "Deze waarde mag niet leeg zijn.",
        required:       "Dit veld is verplicht.",
        pattern:        "Deze waarde is onjuist.",
        min:            "Deze waarde mag niet lager zijn dan %s.",
        max:            "Deze waarde mag niet groter zijn dan %s.",
        range:          "Deze waarde moet tussen %s en %s liggen.",
        minlength:      "Deze tekst is te kort. Deze moet uit minimaal %s karakters bestaan.",
        maxlength:      "Deze waarde is te lang. Deze mag maximaal %s karakters lang zijn.",
        length:         "Deze waarde moet tussen %s en %s karakters lang zijn.",
        equalto:        "Deze waardes moeten identiek zijn."
    });

    Parsley.setLocale('nl');
});


/***********************************************
 *        Delete Patient
 ***********************************************/
$(function () {
    $('.delete-from-history').on('click', function () {
       var $that = $(this),
           id = $that.attr('data-model-id');
       swal({
           title: "Weet u zeker dat u de patiënt wilt verwijderen?",
           text: "Deze stap kan niet ongedaan gemaakt worden!",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#5cb85c",
           confirmButtonText: "Verwijderen",
           closeOnConfirm: false,
           closeOnCancel: false
       },
       function (isConfirm) {
           if(isConfirm) {
               swal("Verwijderd!", "De patiënt is verwijderd", "success");
               $("#destroy-history-" + id).submit();
           } else {
               swal("Gecancelled!", "De patiënt is niet verwijderd", "error");
           }
       });
   });
});

/***********************************************
 *        DOM Functions
 ***********************************************/

$(function () {
    $(document).ready(function()
        {
            $("#patientsTable").tablesorter(
                {
                    dateFormat: 'pt',
                    sortList: [[0,0]]
                }
            );

            $("#historyTable").tablesorter(
                {
                    dateFormat: 'pt',
                    sortList: [[0,0]]
                }
            );

            $(".date").each(function (index, dateElem) {
                var $dateElement = $(dateElem);
                var formatted = moment($dateElement.text(), 'YYYY-MM-DD HH-mm-ss').format('DD-MM-YYYY - HH:mm:ss');
                $dateElement.text(formatted);
            });

            checkStatusSelector(".triage_radio_1", 3);
            checkStatusSelector(".triage_radio_2", 2);
            checkStatusSelector(".triage_radio_3", 2);
            checkStatusSelector(".triage_radio_4", 2);
            checkStatusSelector(".triage_radio_5", 2);

            toggleButton("#hideIncheck", ".patient-create");
            toggleButton("#hideSearch", ".patient-search");
            toggleButton("#hideSearchHistory", ".patient-search");
            toggleButton("#hidePatients", ".table");
            toggleButton("#hideHistory", "#historyTable");

            filterTable("#patientsTable tr.tableResults", "#searchPatient");
            filterTable("#historyTable tr.tableResults", "#searchPatient");

            setTimeout(function(){
                $('body').addClass('loaded');
                $('h1').css('color','#222222');
            }, 3000);
        }
    );
});


/***********************************************
 *        Status Selector
 ***********************************************/
function checkStatusSelector(idClick, valRadio){
    $(idClick).on('click', function () {
        $("#status_id").val(valRadio);
    });
}


/***********************************************
 *        Toggle function for buttons
 ***********************************************/
function toggleButton(id, classhider) {
    $(id).click(function() {
        $(classhider).toggle();
        $(this).text(function(i, text){
            return text === "Verberg" ? "Toon" : "Verberg";
        })
    });
}

/***********************************************
 *        FilterTable function
 ***********************************************/
function filterTable(tableIdAndRow, keyupInput) {
    var $rows = $(tableIdAndRow);

    $(keyupInput).keyup(function() {

        var val = "^(?=.*\\b" + $.trim($(this).val()).split(/\s+/).join("\\b)(?=.*\\b") + ").*$",
            reg = RegExp(val, "i"),
            text;

        $rows.show().filter(function() {
            text = $(this).text().replace(/\s+/g, " ");
            return !reg.test(text);
        }).hide();
    });
}



/***********************************************
 *        NProgress Settings
 ***********************************************/

// start load bar
NProgress.start();

// end loading bar
NProgress.done();
