<div class="section-header ">
    <a href="<?= ROOT?>/adminusers" class="first selected">All Users</a>
    <a href="?role=passenger">Passengers</a>
    <a href="?role=owner">Owners</a>
    <a href="?role=driver">Drivers</a>
    <a href="?role=conductor">Conductors</a>
    <a href="?role=scheduler">Schedulers</a>
</div>

<!-- script to change class based on the href -->
<script>
    const links = document.querySelectorAll('.section-header a');

    links.forEach(link => {
    if (link.href === window.location.href) {
        link.classList.add('selected');
    } else {
        link.classList.remove('selected');
    }
    });
</script>