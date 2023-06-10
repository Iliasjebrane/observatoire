<?php
//dd($population);
//$operations


?>

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

<div class="container-fluid p-0 ">


    <div class="row p-0 m-0">

        <div class=" d-flex flex-column">

            <h5>details</h5>

        </div>

        <div class="shadow justify-content-start bg-white rounded p-3 mb-2">
            <div class="about_me">
                <div class=" d-flex justify-content-center w-100"><span> population</span></div>
                <hr>
            </div>
            <div>
                <div class="d-flex gap-2">
                    <label>id:</label>
                    <p>
                        <?= $population["id"] ?? '_' ?>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <label>type:</label>
                    <p>
                        <?= $population["type"] ?? '_' ?>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <label>number:</label>
                    <p>
                        <?= $population["number"] ?? '_' ?>
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <label>date:</label>
                    <p>
                        <?= $population["date"] ?? '_' ?>
                    </p>
                </div>
            </div>
        </div>
        <div class=" bg-white m-0 p-3 shadow">

            <div class="d-flex flex-column">

                <div class=" d-flex justify-content-center w-100">
                    <span class="  mb-0">operations</span>
                </div>
                <hr>
                <div class="table-container row  mb-2">

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




                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
                <hr>

            </div>
        </div>



    </div>