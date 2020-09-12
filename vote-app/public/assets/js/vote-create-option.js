document.querySelector('.add-option').addEventListener("click", () => {
        const length = document.querySelectorAll(".vote-option").length + 1;
        const optionGroup = document.createElement("div");
        optionGroup.setAttribute("class", "position-relative form-group");
        optionGroup.innerHTML = `
                <label for="option_${length}">Option</label>
                <input class="vote-option col-9 form-control" id="option_${length}" name="optionList[]" placeholder="Option">
                <span class="position-absolute remove-option btn btn-danger" style="bottom: 0; right: 0">x</span>`;
        document.querySelector(".vote-option-group")
            .appendChild(optionGroup)
            .querySelector('.remove-option').addEventListener("click", () =>
            optionGroup.parentNode.removeChild(optionGroup)
        );
    }
);
