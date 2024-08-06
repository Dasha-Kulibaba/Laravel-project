const email = document.querySelector(".login__email-input");

const check = /student/;

email.addEventListener("change", function () {
    if (check.test(email.value)) {
        document.getElementById("isSt").setAttribute("required", "");
    } else {
        document.getElementById("isSt").removeAttribute("required");
    }
});

document.getElementById("isSt").addEventListener("change", function () {
    if (this.checked) {
        document.querySelector(".studentgroup").classList.add("show");
    } else {
        document.querySelector(".studentgroup").classList.remove("show");
    }
});
