
<?php
// სტუდენტის პასუხები და ლექტორის შეფასებები
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // არჩეული კითხვები
    $selected_questions = [
        'php' => $_POST['php_question'] ?? '',
        'html' => $_POST['html_question'] ?? '',
        'css' => $_POST['css_question'] ?? '',
        'cpp' => $_POST['cpp_question'] ?? '',
        'javascript' => $_POST['javascript_question'] ?? ''
    ];

    // სტუდენტის პასუხები
    $student_responses = [
        'php' => $_POST['php'] ?? '',
        'html' => $_POST['html'] ?? '',
        'css' => $_POST['css'] ?? '',
        'cpp' => $_POST['cpp'] ?? '',
        'javascript' => $_POST['javascript'] ?? ''
    ];

    // ლექტორის შეფასებები
    $lecturer_scores = [
        'php' => $_POST['php_score'] ?? 0,
        'html' => $_POST['html_score'] ?? 0,
        'css' => $_POST['css_score'] ?? 0,
        'cpp' => $_POST['cpp_score'] ?? 0,
        'javascript' => $_POST['javascript_score'] ?? 0
    ];

    // საშუალო ქულის გამოთვლა
    $average_score = array_sum($lecturer_scores) / count($lecturer_scores);

    // შედეგების ჩვენება
    echo "<h2>სტუდენტის პასუხები და ლექტორის შეფასებები</h2>";
    foreach ($student_responses as $subject => $response) {
        echo "<p><strong>კითხვა: {$selected_questions[$subject]}</strong><br>";
        echo "სტუდენტის პასუხი: $response<br>";
        echo "ლექტორის შეფასება: " . $lecturer_scores[$subject] . "</p>";
    }

    echo "<h3>საშუალო ქულა: $average_score</h3>";
}
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task-1</title>
    <style>
        /* სტილების ნაწილი */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: silver;
            border: 1px solid black;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid black;
            border-radius: 4px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: black;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: gray;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 style="text-align: center;">სტუდენტის შეფასების ფორმა</h2>
    <form method="POST">
        <table>
            <thead>
                <tr>
                    <th>კითხვა (არჩევა)</th>
                    <th>სტუდენტის პასუხი</th>
                    <th>ლექტორის შეფასება</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // კითხვა, რომელიც ამონაკლისია თითოეული სვეტისთვის
                $questions = [
                    'php' => ["რა არის PHP?", "PHP-ს გამოყენება"],
                    'html' => ["რა არის HTML?", "HTML-ის გამოყენება"],
                    'css' => ["რა არის CSS?", "CSS-ის გამოყენება"],
                    'cpp' => ["რა არის C++?", "C++-ის გამოყენება"],
                    'javascript' => ["რა არის JavaScript?", "JavaScript-ის გამოყენება"]
                ];

                foreach ($questions as $subject => $options) {
                    echo "<tr>";
                    echo "<td><select name='{$subject}_question'>";
                    foreach ($options as $option) {
                        echo "<option value='$option'>$option</option>";
                    }
                    echo "</select></td>";
                    echo "<td><input type='text' name='$subject'></td>";
                    echo "<td><input type='number' name='{$subject}_score' min='0' max='10'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- ქვედა სექცია -->
        <div class="bottom-section">
            <input type="submit" value="გაგზავნა">
            <input type="reset" value="Clear Form">
        </div>
    </form>
</div>

</body>
</html>
