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
            <div class="me-auto"><span class=" text text-success">Operations</span></div>


        </div>
        <div class="table-container">

            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">user id</th>
                        <th scope="col">user nom complet</th>
                        <th scope="col">table</th>
                        <th scope="col">row_id</th>
                        <th scope="col">action</th>
                        <th scope="col">description</th>
                        <th scope="col">created at</th>


                        <!-- <th scope="col">actions</th> -->

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($operations as $operation): ?>
                        <tr>

                            <th scope="row">
                                <?= $operation['id'] ?>
                            </th>
                            <td>
                                <?= $operation['user_id'] ?>
                            </td>
                            <td>
                                <?= $operation['user_nom_complet'] ?>
                            </td>
                            <td>
                                <?= $operation['table_name'] ?>
                            </td>
                            <td>
                                <?= $operation['row_id'] ?>
                            </td>
                            <td>
                                <?= $operation['action'] ?>
                            </td>
                            <td>
                                <?= $operation['description'] ?>
                            </td>
                            <td>
                                <?= $operation['created_at'] ?>
                            </td>



                            <!-- <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer ce operation?')"
                                        action="<?php /* route("admin/operations/{$operation['id']}") */ ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm bg-gradient"><i
                                                class="bi bi-trash"></i></button>
                                    </form>

                                </div>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>

<script>

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>