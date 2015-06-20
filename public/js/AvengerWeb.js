/**
 * Created by avengerweb on 19.06.15.
 */

var AvengerWeb = {
    container: null,
    initialize: function() {
        this.container = $("#content");
        this.welcome();
        this.menu.initialize();
    },
    welcome: function() {
        this.container.addClass("welcome-animate");

        var title = this.container.find(".welcome .laravel-title");
        var myTitle = this.container.find(".welcome .avenger-web");
        var text = title.text().trim().split("");
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