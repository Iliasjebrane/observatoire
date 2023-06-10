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
            <div class="me-auto"><span class=" text text-success">Roles</span></div>
           
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
                        <th scope="col">nom fr</th>
                        <th scope="col">nom ar</th>
                        <th scope="col">description fr</th>
                        <th scope="col">description ar</th>
                        <th scope="col">code</th>
                   

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?>
                        <tr>

                            <th scope="row">
                                <?= $role['id'] ?>
                            </th>
                            <td>
                                <?= $role['name_fr'] ?>
                            </td>
                            <td>
                                <?= $role['name_ar'] ?>
                            </td>
                            <td>
                                <?= $role['description_fr'] ?>
                            </td>
                            <td>
                                <?= $role['description_ar'] ?>
                            </td>
                            <td>
                                <?= $role['code'] ?>
                            </td>
                           
                        
                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- pagination -->
           
        </div>

    </div>

</div>

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

<script>

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>