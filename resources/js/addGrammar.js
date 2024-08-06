const addSome = document.querySelector(".grammar-create__add");
const typeMenu = document.querySelector(".grammar-create__type");
const type = document.querySelectorAll(".grammar-create__type li");
const form = document.querySelector(".grammar-create__form");
const button = document.querySelector(".grammar-create__button");

let count = 0;
let ruleCount = 0;
let div = [];
let input = [];
let inputType = [];
let option = [];
let types = ["text", "image", "audio", "rule", "exercise"];
let label = [];
let audio = [];
let someimg = [];
let del = [];
let rules = [];
let examples = [];
let exercises = [];

addSome.addEventListener("click", function () {
    typeMenu.classList.add("show");
});

if (inputType.length == 0) button.setAttribute("disabled", "");

for (let i = 0; i < type.length; i++) {
    type[i].addEventListener("click", function () {
        div[count] = document.createElement("div");
        div[count].setAttribute("class", "grammar-create__block");
        inputType[count] = document.createElement("select");
        inputType[count].name = "gt_type[]";
        for (let j = 0; j < types.length; j++) {
            option[j] = document.createElement("option");
            option[j].textContent = types[j];
            option[j].value = types[j];
            inputType[count].append(option[j]);
        }
        div[count].append(inputType[count]);

        switch (type[i].textContent) {
            case "text":
                input[count] = document.createElement("textarea");
                input[count].setAttribute("placeholder", "text");
                input[count].name = "gt_content" + count;
                input[count].setAttribute("required", "");
                option[0].setAttribute("selected", "");
                div[count].prepend(input[count]);
                button.before(div[count]);
                break;
            case "image":
                input[count] = document.createElement("input");
                input[count].setAttribute("type", "file");
                input[count].hidden = true;
                input[count].name = "gt_content" + count;
                input[count].setAttribute("required", "");
                label[count] = document.createElement("label");
                label[count].classList.add("grammar-create__image");
                label[count].append(input[count]);
                someimg[count] = document.createElement("img");
                someimg[count].src = "#";
                someimg[count].alt = "Click to upload an image";
                someimg[count].id = "previewImage" + count;
                label[count].append(someimg[count]);
                option[1].setAttribute("selected", "");
                div[count].prepend(label[count]);
                button.before(div[count]);
                const file = input[count];
                const preview = someimg[count];
                file.addEventListener("change", function () {
                    if (file.files[0]) {
                        const reader = new FileReader();
                        reader.onloadend = function () {
                            preview.src = reader.result;
                        };
                        reader.readAsDataURL(file.files[0]);
                    }
                });
                break;
            case "audio":
                input[count] = document.createElement("input");
                input[count].setAttribute("type", "file");
                input[count].hidden = true;
                input[count].name = "gt_content" + count;
                input[count].setAttribute("required", "");
                label[count] = document.createElement("label");
                label[count].classList.add("grammar-create__image");
                label[count].classList.add("grammar-create__audio");
                label[count].append(input[count]);
                audio[count] = document.createElement("audio");
                audio[count].src = "#";
                audio[count].id = "previewAudio" + count;
                label[count].append(audio[count]);
                someimg[count] = document.createElement("img");
                someimg[count].src = "#";
                someimg[count].alt = "Click to upload an audio";
                label[count].append(someimg[count]);
                option[2].setAttribute("selected", "");
                div[count].prepend(label[count]);
                button.before(div[count]);
                let audiofile = input[count];
                let audiopreview = audio[count];
                let imgtext = someimg[count];
                audiofile.addEventListener("change", function () {
                    if (audiofile.files[0]) {
                        const reader = new FileReader();
                        reader.onloadend = function () {
                            audiopreview.src = reader.result;
                            audiopreview.controls = true;
                            imgtext.remove();
                        };
                        reader.readAsDataURL(audiofile.files[0]);
                    }
                });
                break;
            case "rule":
                rules[count] = document.createElement("div");
                rules[count].classList.add("grammar-create__rules");
                input[count] = document.createElement("input");
                input[count].type = "text";
                input[count].name = "rule_text" + count;
                input[count].placeholder = "rule";
                input[count].setAttribute("required", "");
                rules[count].append(input[count]);
                examples[count] = document.createElement("div");
                examples[count].classList.add("rule__examples");
                let inputExample = document.createElement("textarea");
                inputExample.rows = 2;
                inputExample.name = "rule_example" + count;
                inputExample.placeholder = "example";
                inputExample.setAttribute("required", "");
                examples[count].append(inputExample);
                rules[count].append(examples[count]);
                option[3].setAttribute("selected", "");
                div[count].prepend(rules[count]);
                button.before(div[count]);
                break;
            case "exercise":
                exercises[count] = document.createElement("div");
                exercises[count].classList.add("grammar-create__exercise");
                input[count] = document.createElement("input");
                input[count].name = "ex_task" + count;
                input[count].placeholder = "task";
                input[count].setAttribute("required", "");
                div[count].prepend(exercises[count]);
                exercises[count].append(input[count]);
                let divVar = document.createElement("div");
                divVar.classList.add("grammar-create__exercise__variants");
                for (let o = 0; o < 3; o++) {
                    let inp = document.createElement("input");
                    inp.type = "radio";
                    inp.name = "ex_answer" + count;
                    inp.value = o;
                    inp.setAttribute("required", "");
                    divVar.append(inp);
                    let inputVar = document.createElement("input");
                    inputVar.type = "text";
                    inputVar.name = "ex_var" + count + "_" + (o + 1);
                    inputVar.placeholder = "variant " + (o + 1);
                    divVar.append(inputVar);
                }
                exercises[count].append(divVar);
                option[4].setAttribute("selected", "");
                div[count].prepend(exercises[count]);
                button.before(div[count]);
                break;
        }
        let block = document.querySelectorAll(".grammar-create__block");
        button.removeAttribute("disabled");
        del[count] = document.createElement("p");
        del[count].classList.add("grammar-create__delete");
        del[count].textContent = "x";
        div[count].append(del[count]);
        typeMenu.classList.remove("show");
        count++;
        for (let d = 0; d < count; d++) {
            del[d].addEventListener("click", function () {
                this.parentNode.remove();
                block = document.querySelectorAll(".grammar-create__block");
                if (block.length == 0) {
                    button.setAttribute("disabled", "");
                }
            });
            inputType[d].addEventListener("change", function () {
                console.log(this.value);
                let upd,
                    updlabel,
                    updimg,
                    uptdaudio,
                    updrules,
                    updexamples,
                    updexer;
                switch (this.value) {
                    case "text":
                        this.previousElementSibling.remove();
                        upd = document.createElement("textarea");
                        upd.setAttribute("placeholder", "text");
                        upd.name = "gt_content" + d;
                        upd.setAttribute("required", "");
                        this.before(upd);
                        break;
                    case "image":
                        this.previousElementSibling.remove();
                        upd = document.createElement("input");
                        upd.setAttribute("type", "file");
                        upd.hidden = true;
                        upd.name = "gt_content" + d;
                        upd.setAttribute("required", "");
                        updlabel = document.createElement("label");
                        updlabel.classList.add("grammar-create__image");
                        updlabel.append(upd);
                        updimg = document.createElement("img");
                        updimg.src = "#";
                        updimg.alt = "Click to upload an image";
                        updimg.id = "previewImage" + d;
                        updlabel.append(updimg);
                        this.before(updlabel);
                        const file = upd;
                        const preview = updimg;
                        file.addEventListener("change", function () {
                            if (file.files[0]) {
                                const reader = new FileReader();
                                reader.onloadend = function () {
                                    preview.src = reader.result;
                                };
                                reader.readAsDataURL(file.files[0]);
                            }
                        });
                        break;
                    case "audio":
                        this.previousElementSibling.remove();
                        upd = document.createElement("input");
                        upd.setAttribute("type", "file");
                        upd.hidden = true;
                        upd.name = "gt_content" + d;
                        upd.setAttribute("required", "");
                        updlabel = document.createElement("label");
                        updlabel.classList.add("grammar-create__image");
                        updlabel.classList.add("grammar-create__audio");
                        updlabel.append(upd);
                        uptdaudio = document.createElement("audio");
                        uptdaudio.src = "#";
                        uptdaudio.id = "previewAudio" + d;
                        updlabel.append(uptdaudio);
                        updimg = document.createElement("img");
                        updimg.src = "#";
                        updimg.alt = "Click to upload an audio";
                        updlabel.append(updimg);
                        this.before(updlabel);
                        let audiofile = upd;
                        let audiopreview = uptdaudio;
                        let imgtext = updimg;
                        audiofile.addEventListener("change", function () {
                            if (audiofile.files[0]) {
                                const reader = new FileReader();
                                reader.onloadend = function () {
                                    audiopreview.src = reader.result;
                                    audiopreview.controls = true;
                                    imgtext.remove();
                                };
                                reader.readAsDataURL(audiofile.files[0]);
                            }
                        });
                        break;
                    case "rule":
                        this.previousElementSibling.remove();
                        updrules = document.createElement("div");
                        updrules.classList.add("grammar-create__rules");
                        upd = document.createElement("input");
                        upd.type = "text";
                        upd.name = "rule_text" + d;
                        upd.placeholder = "rule";
                        upd.setAttribute("required", "");
                        updrules.append(upd);
                        updexamples = document.createElement("div");
                        updexamples.classList.add("rule__examples");
                        let inputExample = document.createElement("textarea");
                        inputExample.rows = 2;
                        inputExample.name = "rule_example" + d;
                        inputExample.placeholder = "example";
                        inputExample.setAttribute("required", "");
                        updexamples.append(inputExample);
                        updrules.append(updexamples);
                        this.before(updrules);
                        break;
                    case "exercise":
                        this.previousElementSibling.remove();
                        updexer = document.createElement("div");
                        updexer.classList.add("grammar-create__exercise");
                        upd = document.createElement("input");
                        upd.name = "ex_task" + d;
                        upd.placeholder = "task";
                        upd.setAttribute("required", "");
                        updexer.append(upd);
                        this.before(updexer);
                        let divVar = document.createElement("div");
                        divVar.classList.add(
                            "grammar-create__exercise__variants"
                        );
                        for (let o = 0; o < 3; o++) {
                            let inp = document.createElement("input");
                            inp.type = "radio";
                            inp.name = "ex_answer" + d + "[]";
                            inp.setAttribute("required", "");
                            divVar.append(inp);
                            let inputVar = document.createElement("input");
                            inputVar.type = "text";
                            inputVar.name = "ex_var" + d + "_" + (o + 1);
                            inputVar.placeholder = "variant " + (o + 1);
                            inputVar.setAttribute("required", "");
                            divVar.append(inputVar);
                        }
                        updexer.append(divVar);
                        this.before(updexer);
                        break;
                }
            });
        }
    });
}

form.addEventListener("submit", function (e) {
    if (
        document.querySelector(
            '.grammar-create__exercise__variants input[type="radio"]:checked'
        )
    ) {
        let rad = document.querySelectorAll(
            '.grammar-create__exercise__variants input[type="radio"]:checked'
        );
        for (let r = 0; r < rad.length; r++) {
            rad[r].value = rad[r].nextSibling.value;
        }
    }
});
