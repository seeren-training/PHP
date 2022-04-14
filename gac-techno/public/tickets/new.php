<?php $title = 'New Ticket' ?>

<?php include __DIR__ . '/../../includes/header.php' ?>

    <!-- Content -->
    <main class="d-flex flex-grow-1 flex-shrink-0 container pt-4 pb-4">

        <!-- New Ticket content -->
        <form class="row pt-4 pb-4 w-100">
            <h2 class="p-2">New Ticket</h2>

            <div>
                <select class="form-select mb-4">
                    <option value="basic">Basic</option>
                    <option value="normal">Normal</option>
                    <option value="risky">Risky</option>
                    <option value="issue">Issue</option>
                </select>
                <label for="exampleFormControlTextarea1" class="form-label">Ticket Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <p class="text-end">
                <button type="submit" class="btn btn-success">Create</button>
            </p>
        </form>

    </main>

<?php include __DIR__ . '/../../includes/footer.php' ?>