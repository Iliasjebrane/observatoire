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
            <div class="me-auto"><span class=" text text-success">Connexions</span></div>
        </div>
        <div class="table-container">
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->pull('success') ?>
                </div>
            <?php endif; ?>
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">user id</th>
                        <th scope="col">nom_complet</th>
                        <th scope="col">role</th>
                        <th scope="col"> description</th>
                        <th scope="col">created at</th>


                        <!-- <th scope="col">actions</th> -->

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($connexions as $connexion): ?>
                        <tr>

                            <th scope="row">
                                <?= $connexion['id'] ?>
                            </th>
                            <td>
                                <?= $connexion['user_id'] ?>
                            </td>
                            <td>
                                <?= $connexion['nom_complet'] ?>
                            </td>
                            <td>
                                <?= $connexion['role'] ?>
                            </td>
                            <td>
                                <?= $connexion['description'] ?>
                            </td>
                            <td>
                                <?= $connexion['created_at'] ?>
                            </td>



                            <!-- <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer <?php /* $connexion['nom_complet']*/?>?')"
                                        action="<?php /*route("admin/connexions/{$connexion['id']}") */?>" method="post">
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