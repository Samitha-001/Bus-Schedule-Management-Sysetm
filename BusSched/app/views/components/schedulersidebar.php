<div class="wrapper-sched">
        <div class="sidebar-sched">
            <li class="item"><a href="<?= ROOT ?>/admins" style="color:#9298AF;"><b>Dashboard</b></a></li>
            <li class="item"><a href="<?= ROOT ?>/schedulerprofile" style="color:#9298AF;"><b>Profile</b></a></li>
            <li class="item"><a href="<?= ROOT ?>/schedules" style="color:#9298AF;"><b>Schedules</b></a></li>
            <li class="item"><a href="<?= ROOT ?>/schedbuses" style="color:#9298AF;"><b>Buses</b></a></li>
            <li class="item"><a href="<?= ROOT ?>/schedbreakdowns" style="color:#9298AF;"><b>Breakdowns</b></a></li>
            <li class="item"><a href="<?= ROOT ?>/schedfares" style="color:#9298AF;"><b>Bus Fares</b></a></li>
            
        </div>
    </div>


<script>
    const ROLE = 'scheduler'
    const USERNAME = '<?= $_SESSION['USER']->username ?>'

    //Breakdown notifications
    let funcBreakdown = (d) => {
        new Toast('fa fa-bus', 'rgba(255,0,0,0.78)', 'Bus Breakdown', d.message, true, 3000)
    }
    new Socket().receive_data("breakdown", funcBreakdown, ROLE, USERNAME)

</script>