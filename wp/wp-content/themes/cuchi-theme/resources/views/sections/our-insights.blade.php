@php
  $title = get_theme_mod('our_insights_title', 'Explore insights');
  $stickyText = get_theme_mod('our_insights_sticky_text', 'Disconnect to Reconnect');
@endphp

<section class="our-insights">
  <h3 class="our-insights__title">{{ $title }}</h3>
  <div class="our-insights__list cucci-slick-3">
    <a class="our-insights__item" href="#"> 
      <div class="our-insights__item__image">
        <img src="../img/our-insight-1.jpg" alt="">
      </div>
      <div class="our-insights__item__description">
        Pedal Through Paradise: Scenic Bicycle Tours in Cuchi
      </div>
    </a>
    <!-- <a class="our-insights__item" href="#"> 
      <div class="our-insights__item__image"><img src="../img/our-insight-2.jpg" alt=""></div>
      <div class="our-insights__item__description">Pedal Through Paradise: Scenic Bicycle Tours in Cuchi</div></a><a class="our-insights__item" href="#"> 
      <div class="our-insights__item__image"><img src="../img/our-insight-3.jpg" alt=""></div>
      <div class="our-insights__item__description">Pedal Through Paradise: Scenic Bicycle Tours in Cuchi</div></a> -->
  </div>
  <div class="our-insights__navigation">
    <img class="our-insights__navigation__prev cucci-slick-3-prev" src="{{ asset('images/arrow-prev.svg') }}" alt="">
    <img class="our-insights__navigation__next cucci-slick-3-next" src="{{ asset('images/arrow-next.svg') }}" alt="">
  </div>
  <div class="our-insights__sticky-footer">{{ $stickyText }}</div><img class="our-insights__go-to-top" src="{{ asset('images/arrow-top.svg') }}" alt="" onclick="window.scrollTo(0,0)">
</section>
