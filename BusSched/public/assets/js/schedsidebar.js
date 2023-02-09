const items = document.querySelectorAll(".item");

items.forEach(item => {
  item.addEventListener("click", function() {
    items.forEach(i => {
      i.classList.remove("selected");
    });
    this.classList.add("selected");
  });
});