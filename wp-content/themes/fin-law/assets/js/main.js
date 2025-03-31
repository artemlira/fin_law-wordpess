document.addEventListener("DOMContentLoaded", function (event) {
  const siteBody = document.querySelector("body");

  // ======================= toggle main submenu ========================

  function toggleMainMenu(
    classNameAccorion,
    classNameAccordionControl,
    classNameAccordionContent,
  ) {
    const accordions = document.querySelectorAll(`${classNameAccorion}`);
    const wrapper = document.querySelector(".services-menu-list");
    if (accordions.length > 0) {
      const firstAccordion = accordions[0];
      const firstContent = firstAccordion.querySelector(
        `${classNameAccordionContent}`,
      );
      const firstControl = firstAccordion.querySelector(
        `${classNameAccordionControl}`,
      );

      firstAccordion.classList.add("isActive");
      firstContent.style.maxHeight = `${firstContent.scrollHeight}px`;
      wrapper.style.minHeight = `${firstContent.scrollHeight}px`;
      // firstContent.setAttribute("aria-hidden", false);
      // firstControl.setAttribute("aria-expanded", true);
    }

    // Добавляем один общий обработчик для корневого элемента
    wrapper?.addEventListener("mouseover", (e) => {
      // Проверяем, находимся ли мы внутри accordion-content
      const isInAccordionContent = e.target.closest(
        `${classNameAccordionContent}`,
      );
      if (isInAccordionContent) return;

      const targetAccordion = e.target.closest(`${classNameAccorion}`);

      if (!targetAccordion) return;

      // Проверяем, не является ли текущий элемент уже активным
      if (targetAccordion.classList.contains("isActive")) {
        return;
      }

      // Закрываем все второстепенные меню и убираем активные классы
      accordions.forEach((el) => {
        el.classList.remove("isActive");
        const content = el.querySelector(`${classNameAccordionContent}`);
        const control = el.querySelector(`${classNameAccordionControl}`);

        if (content) {
          content.style.maxHeight = null;
          // content.setAttribute("aria-hidden", true);
        }

        // if (control) {
        //   control.setAttribute("aria-expanded", false);
        // }
      });

      // Открываем текущее второстепенное меню
      const control = targetAccordion.querySelector(
        `${classNameAccordionControl}`,
      );
      const content = targetAccordion.querySelector(
        `${classNameAccordionContent}`,
      );

      targetAccordion.classList.add("isActive");
      // content.setAttribute("aria-hidden", false);
      content.style.maxHeight = `${content.scrollHeight}px`;
      wrapper.style.minHeight = `${content.scrollHeight}px`;
      // control.setAttribute("aria-expanded", true);
    });

    // Предотвращаем закрытие меню при движении внутри него
    wrapper?.addEventListener("mouseenter", (e) => {
      e.stopPropagation();
    });
  }

  toggleMainMenu(
    ".services-menu-item",
    ".services-menu-link",
    ".services-submenu-list",
  );

  // ======================= toggle mobile main submenu ========================
  function toggleMobileMainMenu(
    classNameAccorion,
    classNameAccordionControl,
    classNameAccordionContent,
  ) {
    const accordions = document.querySelectorAll(`${classNameAccorion}`);

    if (accordions.length > 0) {
      const firstAccordion = accordions[0];
      const firstContent = firstAccordion.querySelector(
        `${classNameAccordionContent}`,
      );
      const firstControl = firstAccordion.querySelector(
        `${classNameAccordionControl}`,
      );

      firstAccordion.classList.add("isActive");
      firstContent.style.maxHeight = `${firstContent.scrollHeight}px`;
      // firstContent.setAttribute("aria-hidden", false);
      // firstControl.setAttribute("aria-expanded", true);
    }

    accordions?.forEach((item) => {
      item?.addEventListener("click", (e) => {
        document?.querySelectorAll(`${classNameAccorion}`).forEach((el) => {
          el?.classList.remove("isActive");
        });
        const self = e?.currentTarget;
        const control = item?.querySelector(`${classNameAccordionControl}`);
        const content = item?.querySelector(`${classNameAccordionContent}`);
        if (content.style.maxHeight) {
          document
            .querySelectorAll(`${classNameAccordionContent}`)
            .forEach((e) => {
              e.style.maxHeight = null;
              // e.setAttribute("aria-hidden", true);
            });
          document.querySelectorAll(`${classNameAccordionControl}`);
          // .forEach((el) => {
          //   el.setAttribute("aria-expanded", false);
          // });
        } else {
          document
            .querySelectorAll(`${classNameAccordionContent}`)
            .forEach((e) => {
              e.style.maxHeight = null;
              // e.setAttribute("aria-hidden", true);
              // content.setAttribute("aria-hidden", false);
              content.style.maxHeight = `${content.scrollHeight}px`;
            });
          self?.classList.toggle("isActive");
          // document
          //   .querySelectorAll(`${classNameAccordionControl}`)
          //   ?.forEach((el) => {
          //     el.setAttribute("aria-expanded", false);
          //     control.setAttribute("aria-expanded", true);
          //   });
        }
      });
    });
  }

  toggleMobileMainMenu(
    ".mobile-services-menu-item",
    ".mobile-services-menu-link",
    ".mobile-services-submenu-list",
  );

  // =============================== open service menu =================================
  const headerButton = siteBody.querySelector(".services-menu-button");
  const servicesMenu = siteBody.querySelector(".main-navigation");
  headerButton.addEventListener("click", () => {
    servicesMenu.classList.toggle("isOpen");
    siteBody.classList.toggle("locked");
  });
  // ============================================= Mobile burger menu =============================================
  const burger = siteBody.querySelector(".burger-menu-button");
  const menu = siteBody.querySelector(".mobile-main-navigation");
  const items = siteBody.querySelectorAll(".menu-item a");
  const header = siteBody.querySelector(".site-header");
  // const headerSearch = siteBody.querySelector(".header-search-input");

  burger?.addEventListener("click", () => {
    burger?.classList.toggle("isActive");
    siteBody?.classList.toggle("locked");
    menu?.classList.toggle("isActive");
    header?.classList.toggle("isActive");
  });

  items?.forEach((item) => {
    item?.addEventListener("click", () => {
      menu?.classList.remove("isActive");
      burger?.classList.remove("isActive");
      header?.classList.remove("isActive");
      siteBody?.classList.remove("locked");
    });
  });

  // navbar breakpoint
  window?.addEventListener("resize", () => {
    if (window.innerWidth > 997.98) {
      menu?.classList.remove("isActive");
      burger?.classList.remove("isActive");
      header?.classList.remove("isActive");
      siteBody?.classList.remove("locked");
    }
  });

  // ========================== slider =================================
  new Splide(".footer-slider", {
    // perPage: 4,
    pagination: false,
    arrows: true,
    grid: {
      cols: 4,
      rows: 1,
      gap: {
        row: "32px",
        col: "32px",
      },
    },
    classes: {
      arrows: "splide__arrows footer-splide__arrows",
      arrow: "splide__arrow footer-splide__arrow",
    },
    breakpoints: {
      998: {
        // perPage: 1,
        grid: {
          rows: 2,
          cols: 1,
          gap: {
            row: "32px",
            col: "32px",
          },
        },
      },
    },
  })?.mount(window.splide.Extensions);

  const singlePostSlider = siteBody.querySelector(".single-post-news-wrapper");
  if (singlePostSlider) {
    new Splide(singlePostSlider, {
      perPage: 1,
      pagination: false,
      autoplay: true,
      padding: 20,
      gap: 24,
      arrows: true,
      type: "loop",
      mediaQuery: "min",
      classes: {
        arrows: "splide__arrows single-post-news-splide__arrows",
        arrow: "splide__arrow single-post-news-splide__arrow",
      },
      breakpoints: {
        768: {
          destroy: true,
        },
      },
    })?.mount();
  }

  const cryptoAssetsSlider = siteBody.querySelector(
    ".crypto_services-content-wrapper",
  );
  if (cryptoAssetsSlider) {
    new Splide(cryptoAssetsSlider, {
      perPage: 3,
      perMove: 1,
      pagination: false,
      // padding: 20,
      gap: 20,
      arrows: true,
      classes: {
        arrows: "splide__arrows crypto_services-splide__arrows",
        arrow: "splide__arrow crypto_services-splide__arrow",
      },
      breakpoints: {
        1024: {
          perPage: 2,
        },
        640: {
          perPage: 1,
        },
      },
    })?.mount();
  }

  // ================================= GSAP Animations =====================================
  let tween = gsap.to(".main-financial-advisory-title-wrapper", {
    xPercent: -100,
    repeat: -1,
    duration: 5,
    ease: "linear",
  });

  // gsap.registerPlugin(ScrollTrigger);
  //
  // let allowScroll = true; // sometimes we want to ignore scroll-related stuff, like when an Observer-based section is transitioning.
  // let scrollTimeout = gsap.delayedCall(1, () => (allowScroll = true)).pause(); // controls how long we should wait after an Observer-based animation is initiated before we allow another scroll-related action
  // let currentIndex = 0;
  // let swipePanels = gsap.utils.toArray(".panel");
  //
  // // set z-index levels for the swipe panels
  // gsap.set(swipePanels, { zIndex: (i) => swipePanels.length - i });
  //
  // // create an observer and disable it to start
  // let intentObserver = ScrollTrigger.observe({
  //   type: "wheel,touch",
  //   onUp: () => allowScroll && gotoPanel(currentIndex - 1, false),
  //   onDown: () => allowScroll && gotoPanel(currentIndex + 1, true),
  //   tolerance: 10,
  //   preventDefault: true,
  //   onEnable(self) {
  //     allowScroll = false;
  //     scrollTimeout.restart(true);
  //     // when enabling, we should save the scroll position and freeze it. This fixes momentum-scroll on Macs, for example.
  //     let savedScroll = self.scrollY();
  //     self._restoreScroll = () => self.scrollY(savedScroll); // if the native scroll repositions, force it back to where it should be
  //     document.addEventListener("scroll", self._restoreScroll, {
  //       passive: false,
  //     });
  //   },
  //   onDisable: (self) =>
  //     document.removeEventListener("scroll", self._restoreScroll),
  // });
  // intentObserver.disable();
  //
  // // handle the panel swipe animations
  // function gotoPanel(index, isScrollingDown) {
  //   // return to normal scroll if we're at the end or back up to the start
  //   if (
  //     (index === swipePanels.length && isScrollingDown) ||
  //     (index === -1 && !isScrollingDown)
  //   ) {
  //     intentObserver.disable(); // resume native scroll
  //     return;
  //   }
  //   allowScroll = false;
  //   scrollTimeout.restart(true);
  //
  //   let target = isScrollingDown
  //     ? swipePanels[currentIndex]
  //     : swipePanels[index];
  //   gsap.to(target, {
  //     yPercent: isScrollingDown ? -100 : 0,
  //     duration: 0.75,
  //   });
  //
  //   currentIndex = index;
  // }
  //
  // // pin swipe section and initiate observer
  // ScrollTrigger.create({
  //   trigger: ".swipe-section .wp-block-group__inner-container",
  //   pin: true,
  //   start: "top top",
  //   end: "+=200", // just needs to be enough to not risk vibration where a user's fast-scroll shoots way past the end
  //   onEnter: (self) => {
  //     if (intentObserver.isEnabled) {
  //       return;
  //     } // in case the native scroll jumped past the end and then we force it back to where it should be.
  //     self.scroll(self.start + 1); // jump to just one pixel past the start of this section so we can hold there.
  //     intentObserver.enable(); // STOP native scrolling
  //   },
  //   onEnterBack: (self) => {
  //     if (intentObserver.isEnabled) {
  //       return;
  //     } // in case the native scroll jumped backward past the start and then we force it back to where it should be.
  //     self.scroll(self.end - 1); // jump to one pixel before the end of this section so we can hold there.
  //     intentObserver.enable(); // STOP native scrolling
  //   },
  // });
});
