<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execute Batch File</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <h1>Execute Batch File</h1>

    <?php
    if (isset($_POST['execute'])) {
        $exeFilePath = 'lunch.bat';

        // Run the batch file in the background
        $command = "start /MIN /B cmd /C \"$exeFilePath\"";
        exec($command, $output, $return_var);

        if ($return_var === 0) {
            // Log success message to the console
            $resultMessage = 'Executable file execution started successfully.';
            echo "<script>console.log('$resultMessage');</script>";
        } else {
            // Log error message to the console
            $errorMessage = 'Error executing the batch file.';
            echo "<script>console.error('$errorMessage');</script>";
        }
    }
    ?>

    <form id="executeForm" method="post">
        <button type="button" onclick="executeBatchFile()">Execute Batch File</button>
    </form>

    <script>
        function executeBatchFile() {
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: { execute: true }, // Send a parameter to indicate execution
                success: function(response) {
                    // Handle success if needed
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    console.error(error);
                }
            });
        }
    </script>

</body>
</html>
