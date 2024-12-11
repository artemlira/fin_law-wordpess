// ========================== slider =================================
new Splide(".main-team-slider", {
  perMove: 2,
  pagination: false,
  arrows: true,
  ariaHidden: false,
  // type: "loop",
  classes: {
    arrows: "splide__arrows main-team-slider-splide__arrows",
    arrow: "splide__arrow main-team-slider-splide__arrow",
  },
  breakpoints: {
    1024: {
      perMove: 1,
    },
    600: {
      focus: "center",
    },
    400: {
      perPage: 2,
      // focus: 0,
    },
  },
}).mount(window.splide.Extensions);
