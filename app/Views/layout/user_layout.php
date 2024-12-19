<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <?= $this->renderSection('head') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <?= $this->include('components/header') ?>

    <!-- Content Section -->
    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('components/footer') ?>
</body>

</html>