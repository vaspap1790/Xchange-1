$("#file").change(function(e) {
    var file = e.originalEvent.srcElement.files[0];

    var img = $(".upload-img");
    var reader = new FileReader();
    reader.onloadend = function() {
        // img.src = reader.result;
        $(img).attr("src", reader.result);
    };
    reader.readAsDataURL(file);

    $(".no-image-text").css("display", "none");
    $(".upload-img").css("display", "block");

    $(".image-add-icon").css("display", "none");
    $(".image-edit-icon").css("display", "block");
    // $(".image-delete-icon").css("display", "block");
});

// $(".image-delete-icon").click(e => {
//   console.log($('#file'));
//   resetFile();
// });

// function resetFile(){
//   // $('#file')
//   //   .wrap("<form>")
//   //   .closest("form")
//   //   .get(0)
//   //   .reset();
//   // $("#file").unwrap();
//   $('#file').replaceWith($('#file').clone());
// }