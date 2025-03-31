// ============================================= Accordion =============================================
function toggleAccordion(
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
    firstContent.setAttribute("aria-hidden", false);
    firstControl.setAttribute("aria-expanded", true);
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
            e.setAttribute("aria-hidden", true);
          });
        document
          .querySelectorAll(`${classNameAccordionControl}`)
          .forEach((el) => {
            el.setAttribute("aria-expanded", false);
          });
      } else {
        document
          .querySelectorAll(`${classNameAccordionContent}`)
          .forEach((e) => {
            e.style.maxHeight = null;
            e.setAttribute("aria-hidden", true);
            content.setAttribute("aria-hidden", false);
            content.style.maxHeight = `${content.scrollHeight}px`;
          });
        self?.classList.toggle("isActive");
        document
          .querySelectorAll(`${classNameAccordionControl}`)
          ?.forEach((el) => {
            el.setAttribute("aria-expanded", false);
            control.setAttribute("aria-expanded", true);
          });
      }
    });
  });
}

toggleAccordion(
  ".career-accordion",
  ".career-accordion-control",
  ".career-accordion-content",
);
