const tag_box = document.getElementById("edit_tags_box");
const tag_box_input = document.getElementById("edit_tags_input");
const tags_validation = document.getElementById("edit_tags_validation");
const tag_form = document.getElementById("edit_tag_form");
const tag_remove_btn = document.getElementById("edit_removeAll_tags");
const edit_tag_item = document.querySelectorAll(".edit_tag_item");
const remove_tag_btn = document.querySelectorAll(".remove_btn");

let tags_count = 0;
const total = 3;

if (edit_tag_item) {
    tags_count = edit_tag_item.length;
    showValid();
}

if (tag_box_input) {
    // عند الضغط على زر Enter
    tag_box_input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();

            const tagValue = tag_box_input.value.trim();

            if (tagValue === "") return;

            //prevent repeats
            const existingTags = [...tag_box.getElementsByTagName("li")];
            if (existingTags.some((tag) => tag.textContent === tagValue)) {
                tags_validation.textContent = "Tag already exists!";
                tags_validation.classList.add("text-yellow-500");
                return;
            }

            if (tags_count < total) {
                addTag(tagValue);
                tags_count++;
                tag_box_input.value = "";
                showValid();
            } else {
                tags_validation.textContent = `Maximum of ${total} tags reached!`;
                tags_validation.classList.add("text-red-500");
            }
        }
    });
}

if (tag_remove_btn) {
    //when use click on remove all button
    console.log(tag_remove_btn);

    tag_remove_btn.addEventListener("click", removeAll);
}

if (remove_tag_btn) {
    remove_tag_btn.forEach((btn) => {
        btn.addEventListener("click", () => removeTag(btn.parentElement));
    });
}

//function to add tag

function addTag(tagText) {
    const item = document.createElement("li");
    item.className =
        "edit_tag_item mx-[4px] my-[3px] rounded-xl flex justify-between items-center gap-1 bg-white/10 hover:bg-white/25 transition-colors duration-300 px-[1.4rem] py-[0.2rem]";

    const span = document.createElement("span");
    span.textContent = tagText;

    const icon = document.createElement("i");
    icon.className =
        "ri-close-line text-white h-[20px] w-[20px] cursor-pointer text-sm bg-red-400 flex justify-center items-center rounded-xl";
    icon.addEventListener("click", () => removeTag(item));

    item.appendChild(span);
    item.appendChild(icon);

    tag_box.insertBefore(item, tag_box.firstChild);
}

// function to remove item

function removeTag(item) {
    console.log(item);

    item.remove();
    tags_count--;
    showValid();
    tags_validation.classList.remove("text-red-500");
}

//function to update message
function showValid() {
    if(tags_validation){

        tags_validation.textContent = `Tags count: ${tags_count} / ${total}`;
        tags_validation.classList.remove("text-yellow-500", "text-red-500");
    }
}

if (tag_form) {
    // Handle form submission
    tag_form.addEventListener("submit", (e) => {
        e.preventDefault();

        const tags = document.querySelectorAll(".edit_tag_item");
        console.log(tags);

        const tags_array = [];

        tags.forEach((tag) => {
            let span = tag.querySelector("span");

            if (span) {
                tags_array.push({
                    id: span.dataset.id,
                    name: span.textContent.trim(),
                });
            }
        });

        // Convert the tags to a comma-separated string or JSON
        tag_box_input.value = JSON.stringify(tags_array); // or tags.join(',');

        // Submit the form manually
        tag_form.submit();
    });
}

//function to remove all tags

function removeAll() {
    edit_tag_item.forEach((element) => element.remove());
    tags_count = 0;
    showValid();
    tags_validation.classList.remove("text-red-500");
}
