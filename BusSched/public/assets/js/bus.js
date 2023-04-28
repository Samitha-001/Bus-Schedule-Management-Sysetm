const btn = document.getElementById("btn");

btn.addEventListener("click", () => {
  const form = document.getElementById("view_bus");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

btn.addEventListener("click", () => {
  const form = document.getElementById("view_route");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

btn.addEventListener("click", () => {
  const form = document.getElementById("view_fare");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

btn.addEventListener("click", () => {
  const form = document.getElementById("view_registernewbus");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});



btn.addEventListener("click", () => {
  const form = document.getElementById("view_breakdown");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

function cancel() {
  const form = document.getElementById("view_bus");
  form.style.display = "none";
}

function cancel() {
  const form = document.getElementById("view_fare");
  form.style.display = "none";
}

function cancel() {
  const form = document.getElementById("view_breakdown");
  form.style.display = "none";
}

function cancel() {
  const form = document.getElementById("view_route");
  form.style.display = "none";
}


btn.addEventListener("click", () => {
  const form = document.getElementById("delete_breakdown");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});
