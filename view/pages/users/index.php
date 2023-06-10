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
<div>
    <div>
        <div class="d-flex flex-end ">
            <div class="me-auto"><span class=" text text-success">Utilisateurs</span></div>
            <div>
                <a class="btn btn-success btn-sm " href="<?= route('admin/users/create') ?>">
                    <i class="bi bi-person-plus"></i>
                </a>
            </div>
        </div>
        <div class="table-container  ">

            <table id="data-table" class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nom fr</th>
                        <th scope="col">nom ar</th>
                        <th scope="col">prenom fr</th>
                        <th scope="col">prenom ar</th>
                        <th scope="col">email</th>
                        <th scope="col">login</th>
                        <th scope="col">tele</th>
                        <th scope="col">role</th>
                        <th scope="col">active</th>
                        <th scope="col">actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>

                            <td scope="row">
                                <?= $user['id'] ?>
                            </td>
                            <td>
                                <?= $user['nom_fr'] ?>
                            </td>
                            <td>
                                <?= $user['nom_ar'] ?>
                            </td>
                            <td>
                                <?= $user['prenom_fr'] ?>
                            </td>
                            <td>
                                <?= $user['prenom_ar'] ?>
                            </td>
                            <td>
                                <?= $user['email'] ?>
                            </td>
                            <td>
                                <?= $user['username'] ?>
                            </td>
                            <td>
                                <?= $user['tele'] ?>
                            </td>
                            <td>
                                <?= $user['role'] ?>
                            </td>
                            <td style="text-align: center;">
                                <form action="<?= route("admin/users/set_is_active/{$user['id']}") ?>" method="post">
                                    <div class="form-switch">
                                        <input type="hidden" name="is_active" value="<?= $user['is_active'] ?>">
                                        <input style="cursor: pointer;" type="checkbox" name="is_active"
                                            class="form-check-input user_is_active"
                                            checked="<?= $user['is_active'] == 1 ?>">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form
                                        onsubmit="return confirm('Voulez-vous vraiment supprimer <?= $user['nom_fr'] . ' ' . $user['prenom_fr'] ?>?')"
                                        action="<?= route("admin/users/{$user['id']}") ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm bg-gradient"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="<?= route("/admin/users/{$user['id']}/edit") ?>">
                                        <button class="btn btn-success btn-sm bg-gradient">
                                            <i class="bi bi-pencil-square"></i>
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

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>
<script>
    // add event listener to enable users
    [...document.getElementsByClassName('user_is_active')].forEach(el => {
        el.onchange = ({ target }) => {
            target.previousElementSibling.value = target.checked ? 1 : 0
            target.parentElement.parentElement.submit()
        }
    });

    // alert of supprission


</script>