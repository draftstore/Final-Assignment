<?php

// Function to calculate total marks, average marks, and grade
function calculateResult($marks,$subject_name) {
    $total_mark = 0;
    $hasFailed = false;
    $failedSubjects = [];

    // Check each subject for failure
    foreach ($marks as $index => $mark) {
        if ($mark < 33) {
            $hasFailed = true;
            $failedSubjects[] = $subject_name[$index];
        }
        $total_mark += $mark;
    }

    if ($hasFailed) {
        echo "The student has failed in the following subjects:\n";
        foreach ($failedSubjects as $subject) {
            echo "- $subject\n";
        }
        return; // End the function if the student has failed
    }


    // Calculate average marks
    $average = $total_mark / count($marks);

    // Determine the grade based on the average using switch-case
    switch (true) {
        case ($average >= 80 && $average <= 100):
            $grade = 'A+';
            break;
        case ($average >= 70 && $average < 79):
            $grade = 'A';
            break;
        case ($average >= 60 && $average < 69):
            $grade = 'A-';
            break;
        case ($average >= 50 && $average < 59):
            $grade = 'B';
            break;
        case ($average >= 40 && $average < 49):
            $grade = 'C';
            break;
        case ($average >= 33 && $average < 40):
            $grade = 'D';
            break;
        default:
            $grade = 'F';
            break;
    }

    // Output total marks, average marks, and grade
    echo "Total Marks: $total_mark\n";
    echo "Average Marks: $average\n";
    echo "Grade: $grade\n";
}


// Function to validate and input marks for each subject
function getValidMarks($subjects_name) {
    while (true) {
        $mark = readline("Enter marks for $subjects_name (0-100): ");
        if ($mark >= 0 && $mark <= 100) {
            return $mark;
        }
        else if(!is_numeric($mark))
        {
            echo "You have inputed a string.Please enter a valid number and run the code again.\n";
            exit();
        }
        else
        {
            echo "Invalid input. Please enter a number between 0 and 100.\n";
        }
    }
}

// Input marks for five subjects
$subject_name = ['Physics', 'Chemistry', 'Math', 'English', 'Biology'];
$marks = [];

foreach ($subject_name as $subject) {
    $marks[] = getValidMarks($subject);
}

// Calculate and display the result
calculateResult($marks,$subject_name);

?>
