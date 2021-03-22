<?php require_once 'adminHeader.php';?>

<div class="container">
    <div class="row">
        <div class="col">

            <table>

            <form action="adminVerification.php" method="POST">

                <?php if(isset($_SESSION['message'])){
                    echo '<p class="message">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);

                ?>

                <thead>
                <tr>
                    <th>id</th>
                    <th>parent_id</th>
                    <th>name</th>
                    <th>Save/discard</th>

                </tr>
                </thead>

                <tbody>
                <?php foreach ($rsAdminCategories as $item): ?>
                <tr>

                    <td>
                        <label for="id"></label>
                        <input type="text" class="form-control" id="id" name="id" value="<?=$item['id']?>"
                    </td>
                    <td>
                        <label for="parent_id"></label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id" value="<?=$item['parent_id']?>">
                    </td>
                    <td>
                        <label for="name"></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$item['name']?>">
                    </td>

                    <td>
                        <a href="adminVerification.php?id=<?=$_GET['id']?>" class="form-control btn btn-success" id="update" name="update"></a><br>
                        <a href="adminVerification.php?id=<?=$_GET['id']?>" class="form-control btn btn-success" id="delete" name="delete"></a><br>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>



            </form>

            </table>
        </div>
    </div>
</div>

<?php require_once 'adminFooter.php'; ?>