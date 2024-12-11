// ========================== slider =================================
const splide = new Splide(".financial-advisory-splide", {
  perMove: 1,
  perPage: 3,
  type: "loop",
  autoplay: true,
  drag: "free",
  gap: "20px",
  pagination: false,
  arrows: true,
  ariaHidden: false,
  classes: {
    arrows: "splide__arrows financial-advisory-splide__arrows",
    arrow: "splide__arrow financial-advisory-splide__arrow",
  },
  breakpoints: {
    1024: {
      perMove: 1,
      perPage: 2,
    },
    768: {
      perMove: 1,
      perPage: 1,
      pagination: false,
      arrows: false,
    },
  },
});
const bar = document.querySelector(".my-slider-progress-bar");

// Updates the bar width whenever the carousel moves:
splide.on("mounted move", function () {
  let end = splide.Components.Controller.getEnd() + 1;
  let rate = Math.min((splide.index + 1) / end, 1);
  bar.style.width = String(100 * rate) + "%";
});

splide.mount();
