// ADD USER POP-UP
const formAddUser = document.getElementById("form-add-user");
const addUserBtn = document.getElementById("add-user");
const cancelAddUserBtn = document.getElementById("cancel-add-user-btn");

addUserBtn.addEventListener("click", function () {
    popupBg.style.display = "flex";
    formAddUser.style.display = "flex";
});

cancelAddUserBtn.addEventListener("click", function () {
    popupBg.style.display = "none";
    formAddUser.style.display = "none";
});

formAddUser.addEventListener("click", function (e) {
    e.stopPropagation();
});
