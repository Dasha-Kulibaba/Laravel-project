const file = document.getElementsByName("book_cover");
const preview = document.getElementById("book_cover");
file[0].addEventListener("change", function () {
    if (file[0].files[0]) {
        const reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        };
        reader.readAsDataURL(file[0].files[0]);
    }
});

const link = document.getElementsByName("book_link");

link[0].addEventListener("change", function () {
    let regex = /https:\/\/drive\.google\.com\/file\/d\/[a-zA-Z0-9_-]+\/view/;
    if (!regex.test(this.value)) {
        document.getElementById("link-error").textContent = "invalid link";
        document.querySelector(".grammar-create__button").disabled = "true";
    } else {
        document.getElementById("link-error").textContent = "";
        document
            .querySelector(".grammar-create__button")
            .removeAttribute("disabled");
    }
});
