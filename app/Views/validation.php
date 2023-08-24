<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Form Validation</h2>
        <p>In this example, we use <code>.was-validated</code> to indicate what's missing before submitting the form:</p>
        <div class="card">
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form method="post">
                <?= csrf_field() ?>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $post["email"]; ?>">
                            <?php if ($validation->getError('email')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('email'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Enter password" name="password" value="<?= $post['password']; ?>">
                            <?php if ($validation->getError('password')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('password'); ?>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit Form</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>