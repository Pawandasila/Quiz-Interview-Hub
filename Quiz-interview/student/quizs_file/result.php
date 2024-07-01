<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    $encrypted_final_ans = isset($_GET['id']) ? $_GET['id'] : '';
    $total_questions = isset($_GET['total']) ? intval($_GET['total']) : 0;

    
    function decrypt($text)
    {
        return base64_decode($text);
    }

    $final_ans = intval(decrypt($encrypted_final_ans));

    
    $final_ans = min($final_ans, $total_questions);
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <h1 class="card-title mb-4">Quiz Results</h1>
                        <div class="display-1 mb-4 text-primary fw-bold"><?php echo $final_ans; ?></div>
                        <h2 class="mb-4">Correct Answers</h2>
                        <p class="lead">Great job on completing the quiz!</p>
                        <div class="progress mb-4" style="height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($final_ans / 10) * 100; ?>%;" aria-valuenow="<?php echo $final_ans; ?>" aria-valuemin="0" aria-valuemax="10">
                                <?php echo $final_ans; ?> / 10
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg">Review Answers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>