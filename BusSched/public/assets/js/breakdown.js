const btn = document.getElementById("btn");
const btn2 = document.getElementById("btn2");
const btn3 = document.getElementById("btn3");

let noBreakdown = document.getElementById("no-breakdowns-td");
if (noBreakdown) {
    btn.disabled = false;
    
} else {   
  btn.disabled = true; 
}


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

btn2.addEventListener("click", () => {
  const form = document.getElementById("view_my_breakdowns");

  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});

btn3.addEventListener("click", () => {
  const form = document.getElementById("view_history");

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

