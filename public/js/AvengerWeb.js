/**
 * Created by avengerweb on 19.06.15.
 */

var AvengerWeb = {
    container: null,
    initialize: function() {
        this.container = $("#content");
        this.welcome();
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

    }
};

$(document).ready(function() {
    AvengerWeb.initialize();
});