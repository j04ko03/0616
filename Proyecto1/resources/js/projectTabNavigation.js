// NAVIGATION BETWEEN TABS
const btnContainer = document.querySelector("#tab-container");
const tabsBtn = document.querySelectorAll(".tabs-btn");
const tabsContent = document.querySelectorAll(".tabs-content");

btnContainer.addEventListener("click", function (e) {
    const clicked = e.target.closest(".tabs-btn");
    if (!clicked) return;
    tabsBtn.forEach((btn) => btn.classList.remove("btn-active"));
    clicked.classList.add("btn-active");

    tabsContent.forEach((tab) => tab.classList.remove("content-active"));
    document
        .querySelector(`.content-section-${clicked.dataset.tab}`)
        .classList.add("content-active");
});
