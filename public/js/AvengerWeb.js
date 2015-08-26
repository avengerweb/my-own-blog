 /**
 * Created by avengerweb on 19.06.15.
 */

var AvengerWeb = {
    container: null,
    initialize: function() {
        this.container = $("#content");
        this.content = $(".content-container");
        this.menu.initialize();
        this.welcome();
	this.header = $("header");

        this.container.find(".container").ajaxNav({
            intTrigger: "a:not(.direct)",
            loaded: function() {
                AvengerWeb.reloadDates();
		if (AvengerWeb.header.hasClass("show-menu"))
			AvengerWeb.menu.toggleMenu();
            }
        });

        AvengerWeb.reloadDates();

        var csrftoken = $('meta[name=_token]').attr('content');
        $.ajaxSetup({
            beforeSend: function (xhr, settings) {
                if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                    xhr.setRequestHeader("X-XSRF-TOKEN", csrftoken)
                }
            }
        });
    },
    reloadDates: function() {
        $(".blog .date").each(function() {
            var t = $(this);
            t.html(moment(t.html()).calendar());
        });
    },
    welcome: function() {
        this.content.hide();
        this.container.addClass("welcome-animate");
        var welcome = this.container.find(".welcome");
        var title = welcome.find(".laravel-title");
        var myTitle = welcome.find(".avenger-web");
        var text = title.text().trim().split("");

        var menuLogo = AvengerWeb.menu.container.find(".logo");
        menuLogo.css("visibility", "hidden").hide();

        title.text("");
        for (var letter in text) {
           title.append("<span class='letter'>" + text[letter] + "</span>");
        }


        var letters = title.find(".letter");
        setTimeout(function() {
            var anim = 300;
            letters.each(function(){
                var l = $(this);
                setTimeout(function() {
                    l.addClass("to-bottom");
                }, anim);
                anim += 300;
            });

            setTimeout(function() {
                title.fadeOut(100);
                myTitle.fadeIn(500, function() {
                    setTimeout(function() {
                        welcome.find(".quote").hide(100, function() {
                            menuLogo.slideDown(600);
                            $(this).remove();
                            myTitle.find(".last-word").css({"font-size": 20, top: -6});
                            myTitle.animate({"font-size": "55px"}, 500);
                            welcome.css("z-index", "1001").animate({left:147, "margin-top": -179}, 600, function() {
                                $(this).hide();
                                menuLogo.css("visibility", "visible");
                                AvengerWeb.content.show();
                                $(".menu-button").removeClass("hidden");
                                AvengerWeb.container.removeClass("welcome-animate");
                            });
                        });
                    }, 1200);
                    setTimeout(function() {
                        AvengerWeb.menu.toggleMenu();
                        $(".blog").removeClass("hidden");
                    }, 500);
                    $(this).addClass("active");
                });
            }, anim + 100);

        }, 300);

    },
    menu: {
        container: null,
        btnOpen: null,
        btnClose: null,
        isOpen: false,
        isAnimating: false,
        morph: null,
        svg: null,
        path: null,
        initialPath: null,
        steps: null,
        stepsTotal: 0,

        initialize: function() {
            this.container = $("header");
            //this.btnOpen = $("#open-button");
            //this.btnClose = $("#close-button");
            this.morph = $("#morph-shape");
            this.svg = Snap( this.morph.find('svg').get(0) );


            this.path = this.svg.select( 'path' );
            this.initialPath = this.path.attr('d');
            this.steps = this.morph.data( 'morph-open' ).split(';');
            this.stepsTotal = this.steps.length;

            this.container.on('click', "#open-button, #close-button", function() {
                AvengerWeb.menu.toggleMenu();
            });
        },
        toggleMenu: function() {
            if( this.isAnimating )
                return false;

            this.isAnimating = true;

            if( this.isOpen ) {
                this.container.removeClass("show-menu");
                // animate path
                setTimeout( function() {
                    // reset path
                    AvengerWeb.menu.path.attr( 'd', AvengerWeb.menu.initialPath );
                    AvengerWeb.menu.isAnimating = false;
                }, 300 );
            }
            else {
                this.container.addClass("show-menu");
                // animate path
                var pos = 0,
                    nextStep = function( pos ) {
                        if( pos > AvengerWeb.menu.stepsTotal - 1 ) {
                            AvengerWeb.menu.isAnimating = false;
                            return;
                        }
                        AvengerWeb.menu.path.animate( { 'path' : AvengerWeb.menu.steps[pos] }, pos === 0 ? 400 : 500, pos === 0 ? mina.easein : mina.elastic, function() {
                            nextStep(pos);
                        });
                        pos++;
                    };

                nextStep(pos);
            }
            this.isOpen = !this.isOpen;
        }
    }
};

$(document).ready(function() {
    AvengerWeb.initialize();
});
