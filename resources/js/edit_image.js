// let selected = false;

// // عناصر الإنشاء (Create)
// let image_upload_create = document.getElementById("image_upload_from_create");
// let image_update_create = document.getElementById("image_update_from_create");
// let img_url_create = document.getElementById("image_from_create");
// let delete_btn_create = document.getElementById("delete_image_from_create");
// let avatar_create = document.getElementById("avatar");

// // عناصر التحديث (Update)
// let image_upload_update = document.getElementById("image_upload_from_update");
// let image_update_update = document.getElementById("image_update_from_update");
// let img_url_update = document.getElementById("image_from_update");
// let delete_btn_update = document.getElementById("delete_image_from_update");
// let avatar_update = document.getElementById("avatar_update");

// // ✅ وظيفة التعامل مع تحميل الصور في كل من Create و Update
// function handleImageUpload(avatar, image_upload, image_update, img_url, delete_btn) {
//     if (avatar) {
//         avatar.addEventListener("change", function (e) {
//             let file = e.target.files[0];
//             console.log(file ? file.name : "No file selected");
//             checkFile(file, image_upload, image_update, img_url);
//         });
//     }

//     if (delete_btn) {
//         delete_btn.addEventListener("click", function () {
//             console.log("deleted");
//             avatar.value = ""; // إفراغ القيمة المخزنة
//             img_url.src = ""; // مسح الصورة

//             image_update.classList.add("hidden");
//             image_update.classList.remove("flex");

//             image_upload.classList.remove("hidden");
//             image_upload.classList.add("block");
//         });
//     }
// }

// // ✅ وظيفة فحص الصورة وإظهارها
// function checkFile(file, image_upload, image_update, img_url) {
//     if (file && file.type.startsWith('image/')) {
//         selected = true;
//         console.log(selected);
//         image_upload.classList.remove("block");
//         image_upload.classList.add("hidden");

//         image_update.classList.remove("hidden");
//         image_update.classList.add("flex");

//         let reader = new FileReader();
//         reader.onload = function (event) {
//             img_url.src = event.target.result;
//         };
//         reader.readAsDataURL(file);
//     } else {
//         selected = false;
//         console.log(selected);
//         image_upload.classList.remove("hidden");
//         image_upload.classList.add("block");

//         image_update.classList.remove("flex");
//         image_update.classList.add("hidden");

//         img_url.src = "";
//     }
// }

// // ✅ تفعيل الوظيفة على كلا النموذجين (Create & Update)
// handleImageUpload(avatar_create, image_upload_create, image_update_create, img_url_create, delete_btn_create);
// handleImageUpload(avatar_update, image_upload_update, image_update_update, img_url_update, delete_btn_update);

// // ✅ عند تحميل صفحة التحديث، تحقق من وجود صورة حالية
// window.addEventListener("load", function () {
//     if (img_url_update && img_url_update.src && img_url_update.src !== "") {
//         image_upload_update.classList.add("hidden");
//         image_update_update.classList.remove("hidden");
//         image_update_update.classList.add("flex");
//     }
// });
