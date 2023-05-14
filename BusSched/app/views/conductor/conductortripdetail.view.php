<?php
if (!isset($_SESSION['USER'])) {
    redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php'; ?>

    <title>Trips</title>

    <link href="<?= ROOT ?>/assets/css/mobilestyle.css" rel="stylesheet">
</head>

<body>

<?php include '../app/views/components/navbarcon.php'; ?>


<div class="header orange-header">
    <h2>Trip Details</h2>
</div>

<main class="container1">
    <div class="p-3">
        Update Location<br>
        <div class="card-container w-100 pt-4">
            <?php for ($i = 0; $i < count($halts) - 1; $i++): ?>
                <div class="card pt-2" data-halt="<?= $halts[$i] ?>">
                    <?= $halts[$i] ?>
                </div>
            <?php endfor; ?>
            <div class="card end-trip-btn pt-2" data-halt="<?= $halts[$i] ?>">
                END TRIP
            </div>
        </div>
    </div>
    <div class="p-3 mb-0 col">
        Tickets : &nbsp;<i id="uncollected-chevron" class="uncollected fa-solid fa-chevron-up"></i> <br>
        <div id="uncollected-tickets" class="ticket-container w-100 p-1 row">
            <?php foreach ($tickets as $t): ?>
                <?php if ($t->status !== 'collected'): ?>

                    <div class="ticket-card p-1 m-1 mb-2 d-inline-block" data-tid="<?= $t->id ?>" data-src="<?=$t->source_halt?>"">
                        <b><span>Ticket ID: <?= $t->id ?></span></b>
                        <span><?= $t->source_halt ?> To <?= $t->dest_halt ?></span>
                        <span><?= $t->passenger ?></span><br>
                        <?php if ($t->seats_reserved): ?>
                            <span>Seats: <?= $t->seats_reserved ?></span><br>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <br>
        Collected Tickets &nbsp; <i id="collected-chevron" class="fa-solid fa-chevron-up"></i><br>
        <div id="collected-tickets" class="ticket-container w-100 p-1 row">
            <?php foreach ($tickets as $t): ?>
                <?php if ($t->status == 'collected'): ?>
                    <div class="ticket-card p-1 m-1 mb-2 d-inline-block" data-tid="<?= $t->id ?>" data-src="<?=$t->source_halt?>"">
                        <b><span>Ticket ID: <?= $t->id ?></span></b>
                        <span><?= $t->source_halt ?> To <?= $t->dest_halt ?></span>
                        <span><?= $t->passenger ?></span><br>
                        <?php if ($t->seats_reserved): ?>
                            <span>Seats: <?= $t->seats_reserved ?></span><br>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="p-3 mt-0">
        Add Breakdown: &nbsp;<i id="breakdown-chevron" class="fa-solid fa-chevron-down"></i><br>
        <div id="add-breakdown-div" class="d-none">
            <!--            TODO ADD FORM HERE-->
            <form>

            </form>
        </div>
    </div>
</main>
<br><br><br><br>
</body>
</html>
<style>
    .card, .ticket-card {
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 7rem;
        height: 2rem;
        overflow: hidden;
        position: relative;
        text-align: center;
        font-size: smaller;
        border: 1px solid white;
        background-color: white;
        color: blue;
        border-radius: 5px;
    }

    .ticket-card {
        height: 4rem;
        width: 6rem;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .card-container {
        overflow-x: auto;
        white-space: nowrap;
        height: 5rem;
        /*overflow-y: scroll;*/
    }

    .last-updated-halt {
        background-color: #af814c;
        color: white;
    }

    .passed-halt {
        background-color: #4CAF50;
        color: white;
    }

    .not-updated-halt {
        background-color: #af4cad;
        color: white;
    }

    .end-trip-btn {
        background-color: #3dc90d;
        color: white;
    }
</style>
<script>
    let cards = document.querySelectorAll('.card');
    const trip_id = <?=$trips->id?>;
    cards[20].scrollIntoView({behavior: 'smooth', block: 'center'});

    let last_updated_halt = "<?=$trips->last_updated_halt?>";
    let i = 0
    while (cards[i].dataset.halt != last_updated_halt) {
        cards[i].classList.add('passed-halt');
        i++;
    }
    if (cards[i])
        cards[i].classList.add('last-updated-halt');
    i++;
    if (cards[i])
        cards[i].scrollIntoView({behavior: 'smooth', block: 'center'});
    else
        cards[i - 1].scrollIntoView({behavior: 'smooth', block: 'center'});
    while (i < cards.length - 1) {
        cards[i].classList.add('not-updated-halt');
        i++;
    }
    hideCards()

    function updateLocation(e) {
        //check if this is last updated halt or passed halt else ask for confirmation if it's not the end trip. Then ask for ending confirmation
        if (e.target.classList.contains('last-updated-halt') || e.target.classList.contains('passed-halt')) {
            new Toast('fa fa-warning', '#ffc500', 'Invalid Action', 'Halt has already been passed', true, 2000)
            return;
        } else if (e.target.classList.contains('end-trip-btn')) {
            if (!confirm('Are you sure you want to end trip?')) {
                return;
            }
        } else {
            if (!confirm('Are you sure you want to update location to ' + e.target.dataset.halt + '?')) {
                return;
            }
        }
        e.target.classList.add('last-updated-halt');
        // for all cards up to this remove last-updated or  not passed and add passed-halt
        let i = 0;
        while (cards[i].dataset.halt != e.target.dataset.halt) {
            cards[i].classList.remove('last-updated-halt');
            cards[i].classList.remove('not-updated-halt');
            cards[i].classList.add('passed-halt');
            i++;
        }
        // for all cards after this remove last-updated or passed-halt and add not-updated-halt
        i++;
        while (i < cards.length - 1) {
            cards[i].classList.remove('last-updated-halt');
            cards[i].classList.remove('passed-halt');
            cards[i].classList.add('not-updated-halt');
            i++;
        }
        e.target.classList.remove('passed-halt');
        e.target.classList.remove('not-updated-halt');
        e.target.scrollIntoView({behavior: 'smooth', block: 'center'});
        hideCards();
        let location = e.target.dataset.halt;
        let trip_id = "<?=$trips->id?>";
        let url = `${ROOT}/conductortrips/api_update_location`;
        let options = {
            method: "POST",
            credentials: "same-origin",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/json;charset=utf-8",
            },
            body: JSON.stringify({
                trip_id: trip_id,
                location: location,
            }),
        };
        fetch(url, options)
            .then((response) => response.json())
            .catch((err) => {
                console.log(err);
            })
            .then((data) => {
                console.log(data);
                new Toast("fa-solid fa-check-circle", "#4CAF50", "Success", "Location Updated", false, 5000);
            });

        if (e.target.classList.contains('end-trip-btn')) {
            endTrip(trip_id);
        }
    }

    cards.forEach(card => {
        card.addEventListener('click', updateLocation);
    })

    function endTrip(end_ID) {
        let confirm = "Are you sure you want to end the trip?";
        if (!window.confirm(confirm)) {
            return;
        }
        let url = `${ROOT}/conductortrips/api_end_trip`;
        let options = {
            method: "POST",
            credentials: "same-origin",
            mode: "same-origin",
            headers: {
                "Content-Type": "application/json;charset=utf-8",
            },
            body: JSON.stringify({
                trip_id: end_ID,
            }),
        };


        fetch(url, options)
            .then((response) => response.json())
            .catch((err) => {
                console.log(err);
            })
            .then((data) => {
                console.log(data);
                new Toast("fa-solid fa-check-circle", "#4CAF50", "Success", "Trip Ended", false, 5000);
                setTimeout(() => {
                    window.location.href = `${ROOT}/conductortrips`;
                }, 2000);
            });
    }

    document.querySelector('#collected-chevron').addEventListener('click', (e) => {
        e.target.classList.toggle('fa-chevron-up');
        e.target.classList.toggle('fa-chevron-down');
        document.querySelector('#collected-tickets').classList.toggle('d-none');
    })

    document.querySelector('#uncollected-chevron').addEventListener('click', (e) => {
        e.target.classList.toggle('fa-chevron-up');
        e.target.classList.toggle('fa-chevron-down');
        document.querySelector('#uncollected-tickets').classList.toggle('d-none');
    })

    document.querySelector('#breakdown-chevron').addEventListener('click', (e) => {
        e.target.classList.toggle('fa-chevron-up');
        e.target.classList.toggle('fa-chevron-down');
        document.querySelector('#add-breakdown-div').classList.toggle('d-none');
    })

    function ticketCollected(id, status = "collected") {
        let url = `${ROOT}/conductortrips/api_ticket_collected`;
        data = {
            ticket_id: id,
            status: status
        }
        // new Toast("fa-solid fa-check-circle", "#4CAF50", "Success", "Ticket Collected", true, 1000);
    }

    document.querySelectorAll('.ticket-card').forEach(card => {
        card.addEventListener('click', (e) => {
            let card = e.target.closest('.ticket-card');
            // Move card from uncollected to collected or vice versa
            if (card.closest('#uncollected-tickets')) {
                // Add a delay before appending the card
                setTimeout(() => {
                    document.querySelector('#collected-tickets').appendChild(card);
                    ticketCollected(card.dataset.tid, 'collected');
                }, 300); // Delay of 300 milliseconds (adjust as needed)
            } else {
                // Add a delay before appending the card
                setTimeout(() => {
                    document.querySelector('#uncollected-tickets').appendChild(card);
                    ticketCollected(card.dataset.tid, 'booked');
                }, 300); // Delay of 300 milliseconds (adjust as needed)
            }

            // Add slow animation to the card movement
            card.style.transition = 'opacity 0.5s ease-in-out';
            card.style.opacity = 0;
            setTimeout(() => {
                card.style.transition = '';
                card.style.opacity = 1;
            }, 300); // Delay of 300 milliseconds (should match the delay above)
        });
    });

    function hideCards(){
        let haltlist = <?=json_encode($halts)?>;
        let currentHalt = document.querySelector('.last-updated-halt').getAttribute('data-halt')
    //     look through all the cards and their data-src if their halt is not reached yet, hide them
        let cards = document.querySelectorAll('.ticket-card');
        cards.forEach(card => {
            let halt = card.dataset.src;
            if(haltlist.indexOf(halt) > haltlist.indexOf(currentHalt)){
                card.classList.add('d-none');
            }else{
                card.classList.remove('d-none');
            }
        })
    }


</script>
