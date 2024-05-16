<?php 

    class main {

        public function recebeNick($nickname) {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_POST['nick'])){
                    $nickname = $_POST['nick'];
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

                if(isset($_GET['nick'])){
                    $nickname = $_GET['nick'];
                }

            }

            return $nickname;

        }

    }

?>
