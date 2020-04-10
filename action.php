<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <fieldset>
        <legend>Giải phương trình bậc 2</legend>
        <label>Nhập a: </label>
        <input type="text" name="num1"><br>
        <label>Nhập b:</label>
        <input type="text" name="num2"><br>
        <label>Nhập c:</label>
        <input type="text" name="num3"><br>
        <input type="submit" name="submit" value="Kết quả">
        <span>
            <?php
            if (isset($_POST['submit'])) {
                try {
                    include 'QuadraticEquation.php';
                    $a = $_POST['num1'];
                    $b = $_POST['num2'];
                    $c = $_POST['num3'];
                    $quadraticEquation = new QuadraticEquation($a, $b, $c);
                    $delta = $quadraticEquation->getDiscriminant();
                    if ($a==0&&$b==0&&$c==0){
                        throw new Exception("Phương trình có vô số nghiệm!");
                    }
                    if ($delta > 0) {
                        echo "Nghiệm x1=" . $quadraticEquation->getRoot1();
                        echo "Nghiệm x2=" . $quadraticEquation->getRoot2();
                    }
                    if ($delta == 0) {
                        echo "Nghiệm x1=x2=" . $quadraticEquation->getRoot1();
                    }
                    if ($delta < 0) {
                        throw new Exception("Phương trình vô nghiệm! ");
                    }
                } catch (Exception $e) {
                    echo $e -> getMessage();
                }
            }
            ?>
        </span>
    </fieldset>
</form>

</body>
</html>