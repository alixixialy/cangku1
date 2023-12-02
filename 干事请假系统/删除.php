<?php
include_once("connect.php");
$con = $GLOBALS['con'];
session_start();

class timedeleted
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function deletedtime()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: index.html');
        }

        if (isset($_POST['Submit'])) {
            $user_id = $_SESSION['id'];
            $time = mysqli_real_escape_string($this->con, $_POST['time']);

            $deletetimeSql = "SELECT * FROM tb_demo02 WHERE id = '$user_id' AND time = '$time'";
            $deletetimeResult = mysqli_query($this->con, $deletetimeSql);

            if (mysqli_num_rows($deletetimeResult) == 1) {
                $updatePasswordSql = "DELETE FROM tb_demo02 WHERE id = 'id' AND time=$time";

                if (mysqli_query($this->con, $deletetimeSql)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'time deleted successfully'
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Error deleting time: ' . mysqli_error($this->con)
                    ];
                }
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Current time is incorrect'
                ];
            }

            echo json_encode($response);
            exit;
        }
    }
}

$timedeleted = new timedeleted($con);
$timedeleted->deletedtime();
?>
