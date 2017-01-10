@if (!\Request::ajax())
<div class="welcome">
    <div class="title laravel-title">
        Laravel 5
    </div>
    <div class="title avenger-web">
        <div class="welcome-logo">
            Avenger<span class="last-word">Web</span>
        </div>
    </div>
    <div class="quote">{{ \Illuminate\Foundation\Inspiring::quote() }}</div>
</div>
@endif