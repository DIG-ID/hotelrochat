import { gsap } from "gsap";
// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("load", () => {
        const trigger = document.getElementById("trigger-overlay");
        const menu = document.getElementById("menu-overlay");
        const closeBtn = document.getElementById("close-overlay");
        const overlayMenu = document.getElementById("overlay-menu");

        // OPEN
        trigger.addEventListener("click", function () {
            overlayMenu.classList.add("opacity-0", "pointer-events-none"); // make sure it's hidden first
            menu.classList.remove("hidden");
            menu.classList.add("flex", "open"); 

            gsap.fromTo(menu, 
            { scaleX: 0 }, 
            {
                scaleX: 1,
                duration: 0.4,
                ease: "power2.out",
                transformOrigin: "center center",
                onComplete: () => {
                overlayMenu.classList.remove("opacity-0", "pointer-events-none");
                }
            }
            );
        });

        // CLOSE
        function closeOverlay() {
            overlayMenu.classList.add("opacity-0", "pointer-events-none"); // hide menu items immediately

            gsap.to(menu, {
            scaleX: 0,
            duration: 0.3,
            ease: "power2.in",
            transformOrigin: "center center",
            onComplete: () => {
                menu.classList.remove("flex", "open");
                menu.classList.add("hidden");
            }
            });
        }

        closeBtn.addEventListener("click", closeOverlay);

        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
            closeOverlay();
            }
        });
    });
});
  
  