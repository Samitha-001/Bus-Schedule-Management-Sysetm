const btn = document.getElementById('btn');

btn.addEventListener('click', () => {
  const form = document.getElementById('view_bus');

  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
});


btn.addEventListener('click', () => {
  const form = document.getElementById('view_route');

  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
});

btn.addEventListener('click', () => {
  const form = document.getElementById('view_fare');

  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
});