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
            <div class="me-auto"><span class=" text text-success">Rapports</span></div>

            <div class="me-2">
                <a class="btn btn-success btn-sm " href="<?= route('admin/rapports/create') ?>"><i
                        class="bi bi-plus"></i></a>

            </div>
        </div>
        <div class="table-container">

            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">intitule</th>
                        <th scope="col">annee</th>
                        <th scope="col">piece jointe</th>
                        <th scope="col">description</th>
                        <th scope="col">actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rapports as $rapport): ?>
                        <tr>

                            <th scope="row">
                                <?= $rapport['id'] ?>
                            </th>
                            <td class="text-center text-truncate m-auto" style=" max-width:250px">
                                <?= $rapport['intitule'] ?>
                            </td>
                            <td>
                                <?= $rapport['annee'] ?>
                            </td>
                            <td>
                                <i role="button" class="bi bi-eye-fill text-success fs-5"
                                    onclick="showPieceJointe('<?= storage($rapport['piece_jointe']) ?>')"></i>

                            </td>
                            <td class="text-center text-truncate m-auto" style=" max-width:250px">
                                <?= $rapport['description'] ?>
                            </td>
                            <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form onsubmit="return confirm('Voulez-vous vraiment supprimer ce rapport ?')"
                                        action="<?= route("admin/rapports/{$rapport['id']}") ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm bg-gradient"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="<?= route("/admin/rapports/{$rapport['id']}/edit") ?>">
                                        <button class="btn btn-success btn-sm bg-gradient">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <a href="<?= route("admin/rapports/{$rapport['id']}") ?>">
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

<style>
    .show-piecejointe {
        z-index: 99;
        background-color: #00000077;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        justify-content: center;
        align-items: center;
    }

    .show-piecejointe>div {
        height: fit-content;
        max-height: 90%;
    }

    .show-piecejointe img {
        object-fit: contain;
        overflow: hidden;
    }
</style>
<div class="show-piecejointe d-none" id="show-piecejointe">
    <div class="w-100 mx-auto p-2 d-flex bg-dark flex-column gap-2 justify-content-center align-items-center"
        style="max-width:1000px;">
        <div class="mb-1 d-flex justify-content-end gap-1 w-100 ">
            <a class="btn btn-sm btn-outline-light" href="" download><i class="bi bi-arrow-down-circle"></i></a>
            <button class="btn btn-sm btn-outline-light" onclick="hidePieceJointe()"><i
                    class="bi bi-x-circle"></i></button>
        </div>
        <img class="w-100 rounded" alt="">
    </div>
</div>

<script>
    function showPieceJointe(url) {
        const e = document.getElementById('show-piecejointe');
        const img = document.querySelector('#show-piecejointe img');
        const down = document.querySelector('#show-piecejointe a');

        if (e.classList.contains('d-none')) {
            img.src = url
            down.href = url
            e.classList.remove("d-none");
            e.classList.add("d-flex");
        }
    }
    function hidePieceJointe() {
        const e = document.getElementById('show-piecejointe');
        if (e.classList.contains('d-flex')) {
            e.classList.remove("d-flex");
            e.classList.add("d-none");
        }
    }
</script>

<script>

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>