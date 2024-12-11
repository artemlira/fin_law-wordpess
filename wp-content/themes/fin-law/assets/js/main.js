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
}).mount(window.splide.Extensions);
