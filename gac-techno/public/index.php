<?php $title = 'Ticket Manager' ?>

<?php include __DIR__ . '/../includes/header.php' ?>

    <!-- Content -->
    <main class="d-flex flex-grow-1 flex-shrink-0 container pt-4 pb-4">

        <!-- Main content -->
        <div class="row pt-4 pb-4 justify-content-center align-items-center w-100">
            <h1 class="col col-8">Manage Team Tickets</h1>
            <p class=" col col-4">
                <a class="btn btn-primary m-2" href="/tickets">Ticket List</a>
                <a class="btn btn-success m-2" href="/tickets/new.php">New</a>
            </p>
        </div>

    </main>

<?php include __DIR__ . '/../includes/footer.php' ?>