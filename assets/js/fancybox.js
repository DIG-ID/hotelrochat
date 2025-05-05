import { Fancybox } from "@fancyapps/ui";

window.addEventListener("load", () => {
  if (document.querySelector(".page-template-page-photo-gallery")) {
    Fancybox.bind("[data-fancybox]", {
      Images: {
        Panzoom: {
          panMode: "mousemove",
          mouseMoveFactor: 1.1,
          mouseMoveFriction: 0.12,
        },
        zoom: true,
      },
      Toolbar: {
        display: {
          left: [],
          middle: [],
          right: ["close"],
        },
      },
      // Thumbs config is now unnecessary
    });
  }
});
