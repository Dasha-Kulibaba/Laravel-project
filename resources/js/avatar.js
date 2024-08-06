const forma = document.querySelector(".profile__avatar");

const file = document.querySelector(".teacher__avatar-label input");
const preview = document.getElementById("previewAvatar");

file.addEventListener("change", function () {
    if (file.files[0]) {
        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        };
        reader.readAsDataURL(file.files[0]);
        forma.submit();
    }
});
