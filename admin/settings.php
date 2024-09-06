<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
}

include '../backend/db.php';

if (!empty($_POST['site_title']) && !empty($_POST['system_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['footer_text']) && !empty($_POST['facebook']) && !empty($_POST['instagram'])) {
    $site_title = $_POST['site_title'];
    $system_name = $_POST['system_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $footer_text = $_POST['footer_text'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];

    $query = $conn->prepare("UPDATE settings SET site_title = ?, system_name = ?, email = ?, phone = ?, `address` = ?, footer_text = ?, facebook = ?, instagram = ? WHERE id = 1");
    $query->bind_param('ssssssss', $site_title, $system_name, $email, $phone, $address, $footer_text, $facebook, $instagram);
    $query->execute();
    
    if ($query->affected_rows) {
        $_SESSION["message"] = "Settings Updated Succesfully...";
        $_SESSION["message_type"] = "success";
    } else {
        $_SESSION["message"] = "Failed to update Settings...";
        $_SESSION["message_type"] = "danger";
    }
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
                                <div class="card mb-4">
                                    <h5 class="card-header">Settings</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img
                                                src="../assets/img/logo/<?php echo $settings['logo']; ?>"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                width="100px"
                                                id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload new logo</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input
                                                        type="file"
                                                        id="upload"
                                                        class="account-file-input"
                                                        hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>
                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="settings.php">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="site_title" class="form-label">Site Title</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="site_title"
                                                        name="site_title"
                                                        value="<?php echo $settings['site_title']; ?>"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="system_name" class="form-label">System Name</label>
                                                    <input class="form-control" type="text" name="system_name" id="system_name" value="<?php echo $settings['system_name']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="email"
                                                        name="email"
                                                        value="<?php echo $settings['email']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="phone"
                                                        name="phone"
                                                        value="<?php echo $settings['phone']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        placeholder="Address"
                                                        value="<?php echo $settings['address']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="facebook" class="form-label">Facebook</label>
                                                    <input class="form-control" type="text" id="facebook" name="facebook" value="<?php echo $settings['facebook']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="instagram" class="form-label">Instagram</label>
                                                    <input class="form-control" type="text" id="instagram" name="instagram" value="<?php echo $settings['instagram']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label" for="footer_text">Footer Text</label>
                                                    <textarea name="footer_text" class="form-control" id="footer_text"><?php echo $settings['footer_text']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
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