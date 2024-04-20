$(document).ready(function () {
  $(".seconddelete").click(function () {
    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost:8080/api/cars-delete/" + id,
      type: "delete",
      success: function (response) {
        location.reload();
      },
    });
  });
  $("#createform").submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      data: $(this).serialize(),
      success: function (response) {
        location.reload();
      },
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var icons = document.querySelectorAll(".icon");
  icons.forEach(function (icon) {
    icon.addEventListener("click", function () {
      // Remove 'icon-active' class from all icons
      icons.forEach(function (icon) {
        icon.classList.remove("icon-active");
      });
      // Add 'icon-active' class to the clicked icon
      this.classList.add("icon-active");
    });
  });
});
