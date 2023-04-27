<div class="flex items-center text-lg no-underline text-white pr-6">
    <a class="" href=" {{ \App\Models\SocialMediaWidget::getFacebook('top-nav') }}">
        <i class="fab fa-facebook"></i>
    </a>
    <a class="pl-6" href="{{ \App\Models\SocialMediaWidget::getTwitter('top-nav') }}">
        <i class="fab fa-instagram"></i>
    </a>
    <a class="pl-6" href="{{ \App\Models\SocialMediaWidget::getInstagram('top-nav') }}">
        <i class="fab fa-twitter"></i>
    </a>
    <a class="pl-6" href="{{ \App\Models\SocialMediaWidget::getLinkedin('top-nav') }}">
        <i class="fab fa-linkedin"></i>
    </a>
</div>
