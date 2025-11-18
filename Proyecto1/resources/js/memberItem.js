const btnOptions = document.querySelectorAll(".button-member");
const member = document.querySelectorAll(".member");
const popupOptionsUser = document.querySelectorAll(".popup-edit-user");

btnOptions.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const memberClicked = e.currentTarget.closest(".member");

        const popupUser = Array.from(popupOptionsUser).filter((user) => {
            return user.dataset.id === memberClicked.dataset.id;
        })[0];

        popupUser.classList.toggle("display");

        e.stopPropagation();
    });
});

document.addEventListener("click", function () {
    popupOptionsUser.forEach((popup) => popup.classList.remove("display"));
});

popupOptionsUser.forEach((popup) => {
    popup.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});
