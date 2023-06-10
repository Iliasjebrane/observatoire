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
            <div class="me-auto"><span class=" text text-success">Articles</span></div>
            <div class="me-2">
                <a class="btn btn-success btn-sm " href="<?= route('admin/articles/create') ?>"><i
                        class="bi bi-plus"></i></a>

            </div>
        </div>
        <div class="table-container">
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->pull('success') ?>
                </div>
            <?php endif; ?>
            <table id="data-table"  class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title ar</th>
                        <th scope="col">title fr</th>
                        <th scope="col">description ar</th>
                        <th scope="col">description fr</th>
                        <th scope="col">image</th>

                        <th scope="col">actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>

                            <th scope="row">
                                <?= $article['id'] ?>
                            </th>
                            <td>
                                <?= $article['title_ar'] ?>
                            </td>
                            <td>
                                <?= $article['title_fr'] ?>
                            </td>
                            <td>
                                <?= $article['description_ar'] ?>
                            </td>
                            <td>
                                <?= $article['description_fr'] ?>
                            </td>
                            <td>
                                <i role="button" onclick="showPieceJointe('<?= storage($article['image']) ?>')"
                                    class="bi bi-eye-fill text-success fs-5"></i>
                            </td>

                            <td>
                                <div class='text-center d-flex gap-1 justify-content-center'>
                                    <form onsubmit="return confirm('Voulez-vous vraiment supprimer ce article?')"
                                        action="<?= route("admin/articles/{$article['id']}") ?>" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger btn-sm bg-gradient"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="<?= route("/admin/articles/{$article['id']}/edit") ?>">
                                        <button class="btn btn-success btn-sm bg-gradient">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <a href="<?= route("admin/articles/{$article['id']}") ?>">
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
<!-- --------------------------------------------------- -->


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

<script>

    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>