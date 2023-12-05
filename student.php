<?php
//LUIZ FEHLBERG 20347
class Student {
    private $name;
    private $number;
    private $email;
    private $program;
    private $subjectList = [];

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setProgram($program) {
        $this->program = $program;
    }

    public function setSubjectList($subjectList) {
        $this->subjectList = $subjectList;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getProgram() {
        return $this->program;
    }

    public function getSubjectList() {
        return $this->subjectList;
    }

    // Function to calculate status based on grade
    public function calculateStatus($grade) {
        return ($grade < 9.5) ? 'Disapproved' : 'Approved';
    }

    // Function to print student subjects
    public function printStudentSubjects() {
        echo '<table border="1">
                <tr>
                    <th>Subject Name</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>';

        foreach ($this->subjectList as $subject) {
            echo '<tr>';
            echo '<td>' . $subject['subjectName'] . '</td>';
            echo '<td>' . $subject['grade'] . '</td>';
            echo '<td>' . $this->calculateStatus($subject['grade']) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    // Function to calculate subject grades average
    public function subjectGradesAverage() {
        $totalGrades = 0;
        $numSubjects = count($this->subjectList);

        foreach ($this->subjectList as $subject) {
            $totalGrades += $subject['grade'];
        }

        return ($numSubjects > 0) ? $totalGrades / $numSubjects : 0;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = new Student();
    $student->setName($_POST["name"]);
    $student->setNumber($_POST["number"]);
    $student->setEmail($_POST["email"]);
    $student->setProgram($_POST["program"]);
    $student->setSubjectList($_POST["subjectList"]);

    // Display student information and subjects
    echo '<h2>Student Information</h2>';
    echo '<p>Name: ' . $student->getName() . '</p>';
    echo '<p>Number: ' . $student->getNumber() . '</p>';
    echo '<p>Email: ' . $student->getEmail() . '</p>';
    echo '<p>Program: ' . $student->getProgram() . '</p>';

    echo '<h2>Subjects</h2>';
    $student->printStudentSubjects();

    // Display subject grades average
    echo '<h2>Subject Grades Average</h2>';
    echo '<p>' . $student->subjectGradesAverage() . '</p>';
}

?>


