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

  $locations = get_nav_menu_locations(); // returns array: location => menu ID
  $menu_id = $locations['primary_navigation'] ?? null;
  if ($menu_id) {
    $menu = wp_get_nav_menu_items($menu_id);
  } else {
      $menu = [];
  }


  $menu_name_mobile = 'Mobile Menu'; // or your registered location
  $menu_items_mobile = wp_get_nav_menu_items($menu_name_mobile);
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
              @if ($menu)
                @foreach ($menu as $item)
                  <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                @endforeach
              @endif
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
        <div class="header__menu">
            <img class="header__menu__close" id="header-close-button" src="{{ asset('images/close.svg') }}" alt="">
            
            @if ($menu_items_mobile)
              @foreach ($menu_items_mobile as $item)
                @php
                    $icon_id = carbon_get_nav_menu_item_meta($item->ID, 'menu_icon');
                    $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'thumbnail') : null;
                @endphp

                 <a class="header__menu__item" href="{{ $item->url }}">
                    <div class="header__menu__item__icon">
                      @if ($icon_url)
                            <img src="{{ $icon_url }}" alt="">
                        @endif
                    </div>
                    <div class="header__menu__item__title"> {{ $item->title }}</div>
                </a>
              @endforeach
            @endif
        </div>
      </div>
    </div>
  </div>
  @if (is_page('Contact Us'))
    <div class="header__hero"> 
      <div class="container-fluid">
        <div class="row"> 
          <div class="header__hero"><img class="header__hero__image" src="{{ esc_url($header_image) }}" alt="Cucci Hero">
            <div class="header__hero__callnow">
              <div class="header__hero__callnow__logo">C</div>
              <div class="header__hero__callnow__description">We’d love to hear from you! Whether you’re planning your next getaway or have questions about our services, feel free to reach out to us:</div><a class="header__hero__callnow__action" href="#">
                <div class="header__hero__callnow__action__link">Call Now </div><img class="header__hero__callnow__action__icon" src="{{ asset('images/arrow-right-1.svg') }}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
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
  @endif
</header>
