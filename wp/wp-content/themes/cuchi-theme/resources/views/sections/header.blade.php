<!-- <header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header> -->

@php
  $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
  $header_image = get_theme_mod('header_image_upload');
@endphp

<header class="header">
  <div class="header__header">
    <div class="container">
      <div class="row">
        <div class="header__header__left col-xs-12 col-sm-12 col-md-3">
          <div class="header__header__left__logo">

            <a href="/"><img class="logo" src="{{ $logo[0] }}" alt="Cucci Logo"></a>
            <img class="more-icon" id="header-more-button" src="{{ asset('images/bars.svg') }}" alt="bars">
          </div>
        </div>
        <div class="header__header__right col-xs-12 col-sm-12 col-md-9">
          <div class="header__header__right__nav">
            <ul>
              <li><a href="/">Homepage</a></li>
              <li><a href="/activities.html">Activities</a></li>
              <li><a href="/about.html">About Us</a></li>
              <li><a href="/contact.html">Contact Us</a></li>
              <li><a href="/blog.html">Blog</a></li>
            </ul>
          </div>
          <div class="header__header__right__languages"> 
            <ul> 
              <li><img class="flag" src="{{ asset('images/icons8-american-flag-48.svg') }}" alt="English"></li>
              <li><img class="flag" src="{{ asset('images/icons8-vietnam-48.svg') }}" alt="Vietnam"></li>
            </ul>
          </div>
          <div class="header__header__right__booknow">
            <button class="btn btn--primary" onclick="window.open('/booking.html', '_self')">Book Now</button>
          </div>
        </div>
      </div>
      <div class="header__drawer" id="header-drawer">
        <div class="header__menu"><img class="header__menu__close" id="header-close-button" src="{{ asset('images/close.svg') }}" alt=""><a class="header__menu__item" href="/">
            <div class="header__menu__item__icon"><img src="{{ asset('images/menu-home.svg') }}" alt=""></div>
            <div class="header__menu__item__title">Home</div></a><a class="header__menu__item" href="/booking.html">
            <div class="header__menu__item__icon"><img src="{{ asset('images/menu-booking.svg') }}" alt=""></div>
            <div class="header__menu__item__title">Booking</div></a><a class="header__menu__item" href="/activities.html">
            <div class="header__menu__item__icon"><img src="{{ asset('images/menu-activities.svg') }}" alt=""></div>
            <div class="header__menu__item__title">Activities</div></a><a class="header__menu__item" href="/about.html">
            <div class="header__menu__item__icon"><img src="{{ asset('images/menu-about.svg') }}" alt=""></div>
            <div class="header__menu__item__title">About Us</div></a><a class="header__menu__item" href="/contact.html">
            <div class="header__menu__item__icon"><img src="{{ asset('images/menu-contact.svg') }}" alt=""></div>
            <div class="header__menu__item__title">Contact Us</div></a></div>
      </div>
    </div>
  </div>
  <div class="header__hero"> 
    <div class="container-fluid">
      <div class="row"> 
        <div class="header__hero"><img class="header__hero__image" src="{{ esc_url($header_image) }}" alt="Cucci Hero">
          <div class="header__hero__search"> 
            <div class="header__hero__search__filters">
              <div class="header__hero__search__filters__item">
                <div class="header__hero__search__filters__item__title">Check in Date</div>
                <div class="header__hero__search__filters__item__input"> 
                  <div class="div-datepicker">
                    <input class="datepicker" type="text"><img class="icon-updown" src="{{ asset('images/Dropdown.svg') }}" alt="Arrow Icon">
                  </div>
                </div>
              </div>
              <div class="header__hero__search__filters__item">
                <div class="header__hero__search__filters__item__title">Check out Date</div>
                <div class="header__hero__search__filters__item__input"> 
                  <div class="div-datepicker">
                    <input class="datepicker" type="text"><img class="icon-updown" src="{{ asset('images/Dropdown.svg') }}" alt="Arrow Icon">
                  </div>
                </div>
              </div>
              <div class="header__hero__search__filters__item">
                <div class="header__hero__search__filters__item__title">People</div>
                <div class="header__hero__search__filters__item__input"> 
                                        <select class="select" name="people">
                                          <option value="1" selected>1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                        </select>
                </div>
              </div>
            </div>
            <div class="header__hero__search__submit">Search</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
