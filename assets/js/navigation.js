// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
    //wait until images, links, fonts, stylesheets, and js is loaded
    window.addEventListener("load", () => {

        // Initialize the mobile menu button
        const trigger = document.getElementById("trigger-overlay");
        const menu = document.getElementById("menu-overlay");
        const closeBtn = document.getElementById("close-overlay");

        trigger.addEventListener("click", function () {
            menu.classList.toggle("hidden");
            menu.classList.toggle("flex");
        });

        closeBtn.addEventListener("click", function () {
            menu.classList.add("hidden");
            menu.classList.remove("flex");
        });

        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                menu.classList.add("hidden");
                menu.classList.remove("flex");
            }
        });
        
  }, false);
});