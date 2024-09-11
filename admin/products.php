<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
}

include '../backend/settings.php';

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
                                    <h5 class="card-header">Products List</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Quantity</th>
                                                    <th>Cost</th>
                                                    <th>Price</th>
                                                    <th>Featured</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                                                    <td>Albert Cook</td>
                                                    <td>
                                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Lilian Fuller">
                                                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Sophia Wilkerson">
                                                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Christina Parker">
                                                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
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
                                                <tr>
                                                    <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                                                    <td>Barry Hunter</td>
                                                    <td>
                                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Lilian Fuller">
                                                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Sophia Wilkerson">
                                                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Christina Parker">
                                                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="badge bg-label-success me-1">Completed</span></td>
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
                                                <tr>
                                                    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                                                    <td>Trevor Baker</td>
                                                    <td>
                                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Lilian Fuller">
                                                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Sophia Wilkerson">
                                                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Christina Parker">
                                                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
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
                                                <tr>
                                                    <td>
                                                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                                                    </td>
                                                    <td>Jerry Milton</td>
                                                    <td>
                                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Lilian Fuller">
                                                                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Sophia Wilkerson">
                                                                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                            <li
                                                                data-bs-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-bs-placement="top"
                                                                class="avatar avatar-xs pull-up"
                                                                title="Christina Parker">
                                                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
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