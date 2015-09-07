@extends("index")

@section("content")
@include("pages.welcome")
<div class="demo-blog__posts mdl-grid">
    <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
        <div class="mdl-card__media mdl-color-text--grey-50">
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
            <div class="minilogo"></div>
            <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
            </div>
            <div class="section-spacer"></div>
            <div class="meta__favorites">
                {{ $post->views }} <i class="material-icons" role="presentation">favorite</i>
                <span class="visuallyhidden">favorites</span>
            </div>
            {{--<div>--}}
                {{--<i class="material-icons" role="presentation">bookmark</i>--}}
                {{--<span class="visuallyhidden">bookmark</span>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<i class="material-icons" role="presentation">share</i>--}}
                {{--<span class="visuallyhidden">share</span>--}}
            {{--</div>--}}
        </div>
        <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
            {!! $post->content !!}
        </div>
        {{--<div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">--}}
            {{--<form>--}}
                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded" data-upgraded=",MaterialTextfield">--}}
                    {{--<textarea rows="1" class="mdl-textfield__input" id="comment"></textarea>--}}
                    {{--<label for="comment" class="mdl-textfield__label">Join the discussion</label>--}}
                {{--</div>--}}
                {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                    {{--<i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>--}}
                    {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
            {{--</form>--}}
            {{--<div class="comment mdl-color-text--grey-700">--}}
                {{--<header class="comment__header">--}}
                    {{--<img src="images/co1.jpg" class="comment__avatar">--}}
                    {{--<div class="comment__author">--}}
                        {{--<strong>James Splayd</strong>--}}
                        {{--<span>2 days ago</span>--}}
                    {{--</div>--}}
                {{--</header>--}}
                {{--<div class="comment__text">--}}
                    {{--In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit. Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.--}}
                {{--</div>--}}
                {{--<nav class="comment__actions">--}}
                    {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                        {{--<i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>--}}
                        {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                    {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                        {{--<i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>--}}
                        {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                    {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                        {{--<i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>--}}
                        {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                {{--</nav>--}}
                {{--<div class="comment__answers">--}}
                    {{--<div class="comment">--}}
                        {{--<header class="comment__header">--}}
                            {{--<img src="images/co2.jpg" class="comment__avatar">--}}
                            {{--<div class="comment__author">--}}
                                {{--<strong>John Dufry</strong>--}}
                                {{--<span>2 days ago</span>--}}
                            {{--</div>--}}
                        {{--</header>--}}
                        {{--<div class="comment__text">--}}
                            {{--Yep, agree!--}}
                        {{--</div>--}}
                        {{--<nav class="comment__actions">--}}
                            {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                                {{--<i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>--}}
                                {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                            {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                                {{--<i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>--}}
                                {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                            {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">--}}
                                {{--<i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>--}}
                                {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">--}}
        {{--<a href="index.html" class="demo-nav__button">--}}
            {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation" data-upgraded=",MaterialButton,MaterialRipple">--}}
                {{--<i class="material-icons">arrow_back</i>--}}
                {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
            {{--Newer--}}
        {{--</a>--}}
        {{--<div class="section-spacer"></div>--}}
        {{--<a href="index.html" class="demo-nav__button">--}}
            {{--Older--}}
            {{--<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation" data-upgraded=",MaterialButton,MaterialRipple">--}}
                {{--<i class="material-icons">arrow_forward</i>--}}
                {{--<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>--}}
        {{--</a>--}}
    {{--</nav>--}}
</div>
</div>
@endsection