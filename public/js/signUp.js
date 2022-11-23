$("#btn-sub").prop("disabled", true);

$("#password").on("focusout", function () {
    if ($(this).val() === "") {
        $("#password").removeClass("valid").addClass("invalid");
        $("#confirmPassword").removeClass("valid").addClass("invalid");
    } else {
        $("#password").removeClass("invalid").addClass("valid");
        if ($(this).val() != $("#confirmPassword").val()) {
            $("#confirmPassword").removeClass("valid").addClass("invalid");
            $("#btn-sub").prop("disabled", true);
        } else {
            $("#confirmPassword").removeClass("invalid").addClass("valid");
            $("#btn-sub").prop("disabled", false);
        }
    }
});
$("#confirmPassword").on("input", function () {
    if ($("#password").val() != $(this).val()) {
        $("#btn-sub").prop("disabled", true);

        $(this).removeClass("valid").addClass("invalid");
    } else {
        $(this).removeClass("invalid").addClass("valid");
        $("#btn-sub").prop("disabled", false);
    }
});
