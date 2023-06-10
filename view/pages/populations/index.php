<style>
    table td,
    table th {
        text-align: center !important;
        padding: 0px;
    }

    .table-container {

        overflow-x: auto;
    }

    .table-container div {
        padding: 0px;
        margin: 0px;
        margin-top: 3px;
    }
</style>

<div class="mt-2">
    <div class='d-block'>
        <div class="d-flex flex-end gap-1">
            <div class="me-auto"><span class=" text text-success">populations</span></div>

            <div class="me-2">
                <a class="btn btn-success btn-sm " href="<?= route('admin/populations/create') ?>"><i
                        class="bi bi-plus"></i></a>

            </div>
        </div>
        <div class="table-container">
 
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">type</th>
                        <th scope="col">number</th>
                        <th scope="col">date</th>
                        <th scope="col" >actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($populations as $population): ?>
                        <tr>

                            <th scope="row">
                                <?= $population['id'] ?>
                            </th>
                            <td>
                                <?= $population['type'] ?>
                            </td>
                            <td>
                                <?= $population['number'] ?>
                            </td>
                            <td>
                                <?= $population['date'] ?>
                            </td>
                            <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form onsubmit="return confirm('Voulez-vous vraiment supprimer ce population?')"
                                        action="<?= route("admin/populations/{$population['id']}") ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm bg-gradient"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="<?= route("/admin/populations/{$population['id']}/edit") ?>">
                                        <button class="btn btn-success btn-sm bg-gradient">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <a href="<?= route("admin/populations/{$population['id']}") ?>">
                                        <button class="btn btn-warning btn-sm bg-gradient">
                                            details
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    
        </div>

    </div>

</div>

<script>
    // // add event listener to enable populations
    // [...document.getElementsByClassName('user_is_active')].forEach(el => {
    //     el.onchange = ({ target }) => {
    //         target.previousElementSibling.value = target.checked ? 1 : 0
    //         target.parentElement.parentElement.submit()
    //     }
    // });

    // alert of supprission


</script>

<script>

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>