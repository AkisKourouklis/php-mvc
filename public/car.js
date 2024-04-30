$(document).ready(function () {
  $("#urdateform").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      data: $(this).serialize(),
      success: function (response) {
        window.location.href = "/carlist";
      },
    });
  });
});
