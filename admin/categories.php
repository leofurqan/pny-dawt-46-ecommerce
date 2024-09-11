<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
}

include '../backend/settings.php';

if (!empty($_POST['category_name']) && !empty($_POST['category_description'])) {
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];
    $category_status = isset($_POST['status']) && $_POST['status'] == "1" ? 1 : 0;

    $query = $conn->prepare("INSERT INTO categories(`name`, `description`, `status`) VALUES (?,?,?)");
    $query->bind_param('sss', $category_name, $category_description, $category_status);
    $query->execute();

    if ($query->affected_rows) {
        $_SESSION["message"] = "Category added Succesfully...";
        $_SESSION["message_type"] = "success";
    } else {
        $_SESSION["message"] = "Failed to add categ...";
        $_SESSION["message_type"] = "danger";
    }
}

$categories = array();

$query = $conn->prepare("SELECT * FROM categories");
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'navigation.php'; ?>

            <div class="layout-page">
                <?php include 'header.php'; ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php if (isset($_SESSION["message"])) { ?>
                            <div class="row">
                                <div class="alert alert-<?php echo $_SESSION["message_type"]; ?> alert-dismissible" role="alert" bis_skin_checked="1">
                                    <?php echo $_SESSION["message"]; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php unset($_SESSION["message"]);
                        } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-2">
                                            <h5 class="card-header">Categories List</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#categoryModal">
                                                Add Category
                                            </button>

                                            <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
                                                <form action="categories.php" method="POST">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
                                                                <button
                                                                    type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="nameBasic" class="form-label">Name</label>
                                                                        <input type="text" id="nameBasic" name="category_name" class="form-control" placeholder="Enter Name" />
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2">
                                                                    <div class="col mb-3">
                                                                        <label for="description" class="form-label">Description</label>
                                                                        <textarea id="description" rows="5" name="category_description" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row g-2">
                                                                    <div class="form-check form-switch mb-2" bis_skin_checked="1">
                                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="status" value="1">
                                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Active / Inactive</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php
                                                $count = 1;
                                                foreach ($categories as $category) { ?>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $count; ?></strong></td>
                                                        <td><?php echo $category["name"]; ?></td>
                                                        <td>
                                                            <?php echo $category["description"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $category["status"] ? '<span class="badge bg-label-success me-1">Active</span>' : '<span class="badge bg-label-danger me-1">Inactive</span>'; ?>
                                                            </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php $count++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/perfect-scrollbar.js"></script>

    <script src="assets/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>